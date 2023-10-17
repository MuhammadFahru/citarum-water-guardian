@extends('layouts.master')
@section('title', 'Content')

@section('content')
    <div
        class="d-sm-flex align-items-center justify-content-between mb-4"
    >
        <h1 class="h3 mb-0 text-gray-800">Data Content</h1>
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manajemen</li>
                <li class="breadcrumb-item active" aria-current="page">Content</li>
            </ol>
        </nav>
    </div>
@endsection
