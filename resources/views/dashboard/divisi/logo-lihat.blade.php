@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Logo Divisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Logo Divisi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Logo Divisi</h3>
                            </div>
                            <!-- ./card-header -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @elseif(session('deleted'))
                                <div class="alert alert-danger">{{ session('deleted') }}</div>
                            @endif
                            <div class="card-body">
                                <a href="{{ route('logo.create') }}" class="btn btn-sm btn-success">Tambah Logo</a>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Divisi</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logos as $logo)
                                            <tr>
                                                <td>{{ $logo->name }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $logo->image) }}" alt="Logo"
                                                        style="width: 100px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('logo.edit', $logo->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('logo.delete', $logo->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
