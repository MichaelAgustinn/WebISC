@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Karya</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Karya</li>
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
                                <h3 class="card-title">Karya Section</h3>
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
                                            placeholder="judul" value="{{ $creation->title }}">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section" placeholder="deskripsi"
                                            name="description" value="{{ $creation->description }}">
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
                                    @if ($creation && $creation->image_path)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $creation->image_path) }}" alt="test"
                                                width="200px" height="auto"
                                                style="object-fit: cover; border-radius: 8px;" />
                                        </div>
                                    @endif

                                    <div class="form-group dropdown">
                                        <label for="jabatan">Anggota</label>
                                        <select class="form-control" id="role" name="user_ids[]" multiple>
                                            @foreach ($users as $u)
                                                <option value="{{ $u->id }}"
                                                    {{ in_array($u->id, $selectedUserIds) ? 'selected' : '' }}>
                                                    {{ $u->name }} | {{ $u->profile->nim }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Tekan Ctrl (atau Cmd di Mac) untuk pilih lebih dari satu
                                            anggota</small>
                                    </div>

                                    <div class="form-group dropdown">
                                        <label for="jabatan">Divisi</label>
                                        <select class="form-control" id="role" name="divisi">
                                            <option value="None" {{ $creation->divisi == 'None' ? 'selected' : '' }}>None
                                            </option>
                                            <option value="Mobile" {{ $creation->divisi == 'Mobile' ? 'selected' : '' }}>
                                                Mobile</option>
                                            <option value="Website" {{ $creation->divisi == 'Website' ? 'selected' : '' }}>
                                                Website</option>
                                            <option value="SistemCerdas"
                                                {{ $creation->divisi == 'Sistem Cerdas' ? 'selected' : '' }}>Sistem Cerdas
                                            </option>
                                            <option value="IoT"
                                                {{ $creation->divisi == 'Internet Of Things' ? 'selected' : '' }}>Internet
                                                Of Things</option>
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
