@extends('layouts.master')

@section('title')
    {{ __('title.supplier') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="active">{{ __('title.supplier') }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('supplier.store') }}')" class="btn btn-success btn-flat"><i class="fa fa-plus-circle"></i> {{ __('btn.add') }}</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered table-hover">
                    <thead>
                        <th width="5%">#</th>
                        <th>{{ __('content.name') }}</th>
                        <th>{{ __('content.phone') }}</th>
                        <th>{{ __('content.address') }}</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('supplier.form')
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
                url: '{{ route('supplier.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama'},
                {data: 'telepon'},
                {data: 'alamat'},
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
                                <p>{{ __('messages.noSupplierFound') }}</p>
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
                        alert('{{ __("messages.errorSave") }}');
                        return;
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('{{ __("btn.addSupplier") }}');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('{{ __("btn.editSupplier") }}');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama);
                $('#modal-form [name=telepon]').val(response.telepon);
                $('#modal-form [name=alamat]').val(response.alamat);
            })
            .fail((errors) => {
                alert('{{ __("messages.errorFetchData") }}');
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