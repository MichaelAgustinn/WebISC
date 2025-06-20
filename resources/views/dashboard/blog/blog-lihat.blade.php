@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">All Blogs</li>
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
                                <h3 class="card-title">All Blogs Table</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($data as $blog)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $blog->id }}</td>
                                                <td>{{ $blog->name }}</td>
                                                <td>
                                                    <img src="{{ asset($blog->first_image) }}" style="max-width: 100px">
                                                </td>
                                                <td> {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 50) }}
                                                </td>
                                                <td>
                                                    <a class="btn btnsm btn-warning"
                                                        href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                                    <a class="btn btnsm btn-danger"
                                                        href="{{ route('blog.delete', $blog->id) }}">Hapus</a>
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
