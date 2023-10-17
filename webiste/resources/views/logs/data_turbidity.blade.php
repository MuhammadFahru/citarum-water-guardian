@extends('layouts.master')
@section('title', 'Logs - Data Turbidity')

@section('content')
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Data Turbidity</h1>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Logs</li>
                <li class="breadcrumb-item active" aria-current="page">Data Turbidity</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-black mb-0 mt-2">Data Logs Turbidity</h4>
                <a href="" class="btn btn-success"><i class="fas fa-file-excel mr-2"></i> Export Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Value</th>
                        <th>Satuan</th>
                    </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Value</th>
                        <th>Satuan</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable({
                "searching": false,
                "ordering": false,
                "responsive": false,
                "fixedHeader": true,
                "paging": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('logs.data.ajax') }}",
                    "type": "POST",
                    "data": function(d) {
                        d._token = "{{ csrf_token() }}"
                    },
                },
                "columns": [
                    {"data": "DT_RowIndex", "name": "DT_RowIndex", "className": "text-center"},
                    {
                        "data": "created_at",
                        "name": "created_at",
                        "className": "text-center",
                        render: function(data) {
                            return moment(data).format('DD MMMM YYYY HH:mm:ss');
                        }
                    },
                    {"data": "data_turbidity", "name": "data_turbidity", "className": "text-center",},
                    {
                        "data": null,
                        "className": "text-center",
                        render: function(data) {
                            return "PPM";
                        }
                    },
                ]
            });
        });
    </script>
@endpush
