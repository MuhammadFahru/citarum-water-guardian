@extends('layouts.master')
@section('title', 'Feedback')

@section('content')
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Feedback</h1>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen</li>
                <li class="breadcrumb-item active" aria-current="page">Feedback</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-black mb-0 mt-2">Feedback</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                    <tr>
                        <th width="80">No</th>
                        <th width="100">Aksi</th>
                        <th width="200">Name</th>
                        <th width="170">Email</th>
                        <th>Subject</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#detailModel{{ $item->id }}">
                                        <i class="far fa-eye"></i>
                                    </button>
                                    <div class="modal fade" id="detailModel{{ $item->id }}" tabindex="-1" aria-labelledby="detailModel{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModel{{ $item->id }}Label">Detail Feedback</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <h5 class="text-black">Nama</h5>
                                                        <p>{{ $item->name }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5 class="text-black">Email</h5>
                                                        <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5 class="text-black">Subject</h5>
                                                        <p>{{ $item->subject }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5 class="text-black">Message</h5>
                                                        <p>{{ $item->message }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5 class="text-black">Waktu</h5>
                                                        <p>{{ Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger" onclick="delete_onclick({{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="text-start">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-start">{{ $item->subject }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form method="post" id="delete_form">
        @method('DELETE')
        @csrf
    </form>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable({
                "searching": false,
                "ordering": false,
            });
        });
    </script>

    <script>
        function delete_onclick(id) {
            Swal.fire({
                title: 'Hapus Feedback?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#F70000',
                cancelButtonColor: '#009EF7',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    let form = document.getElementById('delete_form')
                    form.action = '{{ url("manajemen/feedback/delete") }}/'+id
                    form.submit()
                }
            })
        }
    </script>

@endpush
