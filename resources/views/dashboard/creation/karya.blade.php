@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Landing Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Landing Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('failed'))
            <div class="alert alert-danger">{{ session('failed') }}</div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('karya.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Judul</label>
                                        <input type="text" class="form-control" id="section" name="title"
                                            placeholder="judul">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section" placeholder="deskripsi"
                                            name="description">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto Karya</label>
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

                                    <div class="form-group dropdown">
                                        <label for="jabatan">Anggota</label>
                                        <select class="form-control" id="role" name="user_ids[]" multiple>
                                            @foreach ($user as $u)
                                                @if ($u->role != 'Admin')
                                                    <option value="{{ $u->id }}">{{ $u->name }} |
                                                        {{ $u->nim }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Tekan Ctrl (atau Cmd di Mac) untuk pilih lebih dari satu
                                            anggota</small>
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
