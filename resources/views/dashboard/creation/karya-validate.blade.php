@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Karya Validate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Karya Validate</li>

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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Divisi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($data as $unver)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $unver->id }}</td>
                                                <td>{{ $unver->title }}</td>
                                                <td>{{ $unver->description }}</td>
                                                <td>
                                                    @if ($unver && $unver->image_path)
                                                        <div class="form-group">
                                                            <img src="{{ asset('storage/' . $unver->image_path) }}"
                                                                alt="test" width="200px" height="auto"
                                                                style="object-fit: cover; border-radius: 8px;" />
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $unver->divisi }}</td>
                                                <td>{{ $unver->status }}</td>
                                                <td>
                                                    <form action="{{ route('karya.validated', $unver->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success">Verifikasi
                                                            Karya</button>
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
