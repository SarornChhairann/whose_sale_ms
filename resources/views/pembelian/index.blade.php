@extends('layouts.master')

@section('title')
    {{ __('title.purchase') }}
@endsection

@section('breadcrumb')
    @parent
    <li class="active">{{ __('title.purchase') }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm()" class="btn btn-success btn-flat"><i class="fa fa-plus-circle"></i> {{ __('btn.add') }}</button>
                @empty(! session('id_pembelian'))
                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info btn-xs btn-flat"><i class="fa fa-pencil"></i>{{ __('btn.edit') }}</a>
                @endempty
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered table-pembelian table-hover">
                    <thead>
                        <th width="5%">#</th>
                        <th>{{ __('content.date') }}</th>
                        <th>{{ __('content.supplier') }}</th>
                        <th>{{ __('content.totalItem') }}</th>
                        <th>{{ __('content.totalPrice') }}</th>
                        <th>{{ __('content.discount') }}</th>
                        <th>{{ __('content.totalPay') }}</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- visit "codeastro" for more projects! -->
@includeIf('pembelian.supplier')
@includeIf('pembelian.detail')
@endsection

@push('scripts')
<script>
    let table, table1;

    $(function () {
        table = $('.table-pembelian').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
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
                                <p>{{ __('messages.noPurchaseFound') }}</p>
                            </div>
                        </td>
                    </tr>
                `;

                if (filteredRecords === 0) {
                    tbody.html(noDataHtml);
                }
            }
        });

        $('.table-supplier').DataTable();
        table1 = $('.table-detail').DataTable({
            processing: true,
            bSort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'kode_produk'},
                {data: 'nama_produk'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
            ],
        })
    });

    function addForm() {
        $('#modal-supplier').modal('show');
    }
    

    function showDetail(url) {
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
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
                    alert('{{ __("messages.deleteFailed") }}');
                    return;
                });
        }
    }
</script>
<style>
    .no-data-cell {
        text-align: center;
        vertical-align: middle;
        height: 300px; /* Match Lottie height */
    }

    .no-data-container {
        display: inline-block;
    }

    .no-data-container p {
        margin-top: 10px;
    }
</style>
@endpush