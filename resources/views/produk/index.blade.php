@extends('layouts.master')

@section('title')
    {{ __('title.product') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="active">{{ __('title.product') }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="btn-group">
                    <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success  btn-flat"><i class="fa fa-plus-circle"></i> {{ __('btn.add') }}</button>
                    <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger  btn-flat"><i class="fa fa-trash"></i> {{ __('btn.delete') }}</button>
                    <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-warning  btn-flat"><i class="fa fa-barcode"></i>{{ __('btn.barcode') }}</button>
                </div>
            </div>
            <div class="box-body table-responsive" style="position: relative; min-height: 400px;">
                <div class="box-body table-responsive">
                    <form action="" method="post" class="form-produk">
                        @csrf
                        <table class="table table-stiped table-bordered table-hover">
                            <thead>
                                <th width="5%">
                                    <input type="checkbox" name="select_all" id="select_all">
                                </th>
                                <th width="5%">#</th>
                                <th>{{ __('content.code') }}</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.category') }}</th>
                                <th>{{ __('content.brand') }}</th>
                                <th>{{ __('content.purchase_price') }}</th>
                                <th>{{ __('content.sale_price') }}</th>
                                <th>{{ __('content.discount') }}</th>
                                <th>{{ __('content.stock') }}</th>
                                <th width="15%"><i class="fa fa-cog"></i></th>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@includeIf('produk.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('produk.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'nama_kategori'},
                {data: 'merk'},
                {data: 'harga_beli'},
                {data: 'harga_jual'},
                {data: 'diskon'},
                {data: 'stok'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            language: {
                info: '{{ __("pagination.showing", ["start" => "_START_", "end" => "_END_", "total" => "_TOTAL_"]) }}',
                infoEmpty: '{{ __("pagination.info_empty") }}',
                emptyTable: '{{ __("pagination.empty_table") }}',
                lengthMenu: '{{ __("pagination.length_menu") }}',
                loadingRecords: '{{ __("pagination.loading") }}',
                processing: '{{ __("pagination.processing") }}',
                search: '{{ __("pagination.search") }}',
                zeroRecords: '{{ __("pagination.zero_records") }}',
                paginate: {
                    previous: '{{ __("pagination.previous") }}',
                    next: '{{ __("pagination.next") }}'
                }
            },

            drawCallback: function (settings) {
                let json = settings.json;
                let filteredRecords = json.recordsFiltered;
                console.log('Filtered Records:', filteredRecords);
                let tbody = $('.table tbody');
                let noDataHtml = `
                    <tr class="no-data-row">
                        <td colspan="11" class="no-data-cell">
                            <div class="no-data-container">
                                <lottie-player
                                    src="{{ asset('animation/not-found.json') }}"
                                    background="transparent"
                                    speed="1"
                                    style="width: 120px; height: 120px; margin: 0 auto;"
                                    loop
                                    autoplay
                                ></lottie-player>
                                <p>{{ __('messages.no_product_found') }}</p>
                            </div>
                        </td>
                    </tr>
                `;

                if (filteredRecords === 0) {
                    tbody.html(noDataHtml);
                }
            }
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('{{ __("messages.error_save") }}');
                        return;
                    });
            }
        });

        $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('{{ __("btn.addProduct") }}');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('{{ __("btn.editProduct") }}');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=harga_beli]').val(response.harga_beli);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=diskon]').val(response.diskon);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((errors) => {
                alert('{{ __("messages.error_fetch_data") }}');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('{{ __("messages.deleteConfirmation") }}')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('{{ __("messages.errorDelete") }}');
                    return;
                });
        }
    }

    function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            if (confirm('{{ __("messages.confirmDeleteSelected") }}')) {
                $.post(url, $('.form-produk').serialize())
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('{{ __("messages.error_delete") }}');
                        return;
                    });
            }
        } else {
            alert('{{ __("messages.selectDataToDelete") }}');
            return;
        }
    }

    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            alert('{{ __("messages.selectDataToPrint") }}');
            return;
        } else if ($('input:checked').length < 3) {
            alert('{{ __("messages.selectAtLeast3DataToPrint") }}');
            return;
        } else {
            $('.form-produk')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }
</script>
<style>
    .no-data-cell {
        text-align: center;
        vertical-align: middle;
        height: 200px; /* Match Lottie height */
    }

    .no-data-container {
        display: inline-block;
    }

    .no-data-container p {
        margin-top: 10px;
    }
</style>
@endpush