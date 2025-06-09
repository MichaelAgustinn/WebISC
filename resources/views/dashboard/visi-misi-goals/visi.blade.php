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
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->

                        <!-- form visi -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Visi Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form
                                action="{{ !empty($visi) ? route('landingpage.update', $visi->id) : route('landingpage.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($visi))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" id="section" name="section"
                                            value="visi" readonly>
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Judul</label>
                                        <input type="text" class="form-control" id="section" name="judul"
                                            placeholder="Judul" name="judul"
                                            value="{{ !empty($visi->judul) ? $visi->judul : '' }}">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section"
                                            placeholder="Deskripsi here.." name="content"
                                            value="{{ !empty($visi->content) ? $visi->content : '' }}">
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
                                    @if ($visi && $visi->foto)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $visi->foto) }}" alt="test" width="300"
                                                height="300" style="object-fit: cover; border-radius: 8px;" />
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- form visi end --}}

                        {{-- form misi --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Misi Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form
                                action="{{ !empty($misi) ? route('landingpage.update', $misi->id) : route('landingpage.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($misi))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" id="section" name="section"
                                            value="misi" readonly>
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Judul</label>
                                        <input type="text" class="form-control" id="section" name="judul"
                                            placeholder="Judul" name="judul"
                                            value="{{ !empty($misi->judul) ? $misi->judul : '' }}">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section"
                                            placeholder="Deskripsi here.." name="content"
                                            value="{{ !empty($misi->content) ? $misi->content : '' }}">
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
                                    @if ($misi && $misi->foto)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $misi->foto) }}" alt="test"
                                                width="300" height="300"
                                                style="object-fit: cover; border-radius: 8px;" />
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- form misi end --}}

                        {{-- form tujuan --}}
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tujuan Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form
                                action="{{ !empty($tujuan) ? route('landingpage.update', $tujuan->id) : route('landingpage.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($tujuan))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" id="section" name="section"
                                            value="tujuan" readonly>
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Judul</label>
                                        <input type="text" class="form-control" id="section" name="judul"
                                            placeholder="Judul" name="judul"
                                            value="{{ !empty($tujuan->judul) ? $tujuan->judul : '' }}">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section"
                                            placeholder="Deskripsi here.." name="content"
                                            value="{{ !empty($tujuan->content) ? $tujuan->content : '' }}">
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
                                    @if ($tujuan && $tujuan->foto)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $tujuan->foto) }}" alt="test"
                                                width="300" height="300"
                                                style="object-fit: cover; border-radius: 8px;" />
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- form tujuan end --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
