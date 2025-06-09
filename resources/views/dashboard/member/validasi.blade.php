@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Member Validate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Member Validate</li>
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
                                <h3 class="card-title">Validating Table</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Nim</th>
                                            <th>Angkatan</th>
                                            <th>Jabatan</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($unverUser as $unver)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $unver->id }}</td>
                                                <td>{{ $unver->name }}</td>
                                                <td>{{ $unver->email }}</td>
                                                <td>{{ $unver->nim }}</td>
                                                <td>{{ $unver->angkatan }}</td>
                                                <td>{{ $unver->jabatan }}</td>
                                                <td>
                                                    <img src="{{ $unver->foto ? 'storage/' . $unver->foto : 'storage/photo_profil/default.jpg' }}"
                                                        width="100" height="100" style="object-fit: cover;"
                                                        alt="foto profil">
                                                </td>
                                                <td>{{ $unver->role }}</td>
                                                <td>
                                                    <form action="{{ route('validated', $unver->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success">Verifikasi
                                                            Anggota</button>
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
