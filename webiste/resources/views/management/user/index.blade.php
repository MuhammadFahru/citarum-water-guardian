@extends('layouts.master')
@section('title', 'User')

@section('content')
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen</li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-black mb-0 mt-2">Data User</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
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
        $('#dataTable').DataTable();
    </script>
@endpush
