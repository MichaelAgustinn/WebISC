@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('storeMember') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Nama</label>
                                        <input type="text" class="form-control" id="section" placeholder="nama user"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Email</label>
                                        <input type="email" class="form-control" id="content"
                                            placeholder="user@example.com" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Password</label>
                                        <input type="password" class="form-control" id="content" placeholder="password"
                                            name="password">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="none">None</option>
                                            <option value="anggota">Anggota</option>
                                            <option value="pengurus">Pengurus</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="section">Nim</label>
                                        <input type="text" class="form-control" id="section" placeholder="D0******"
                                            name="nim">
                                    </div>
                                    <div class="form-group">
                                        <label for="section">Angkatan</label>
                                        <input type="number" class="form-control" id="section" placeholder="angkatan"
                                            name="angkatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="section">Jabatan</label>
                                        <input type="text" class="form-control" id="section" placeholder="Jabatan"
                                            name="jabatan">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="jabatan">Divisi</label>
                                        <select class="form-control" id="role" name="divisi">
                                            <option value="None">None</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Website">Website</option>
                                            <option value="Internet Of Things">Sistem Cerdas</option>
                                            <option value="Internet Of Things">Internet Of Things</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    id="gambar-landing-page" name="image">
                                                <label class="custom-file-label" for="gambar-landingpage">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
