@extends('layoutDashboard.master')

<style>
    .content-wrapper {
        min-height: auto !important;
        height: auto !important;
    }
</style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <a href="" class="photo-profile">
                                        <img class="profile-user-img img-fluid img-circle "
                                            src="{{ asset(Auth::user()->profile->foto ? 'storage/' . Auth::user()->profile->foto : 'storage/photo_profil/default.jpg') }}"
                                            alt="User profile pictures">
                                    </a>
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">
                                    {{ !empty(Auth::user()->profile->nim) ? 'NIM: ' . Auth::user()->profile->nim : 'NIM:' }}
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right"> {{ $data->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Angkatan</b> <a class="float-right">{{ $data->profile->angkatan }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Divisi</b> <a class="float-right">{{ $data->profile->divisi }}</a>
                                    </li>
                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        {{-- <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div>
                                <div class="card-body">
                                    @if (Auth::user()->role !== 'None')
                                        <a href="{{ route('karya.lihat') }}" class="btn btn-success">Tambah Karya</a>
                                        <a href="" class="btn btn-primary">Lihat Semua Karya</a>
                                    @endif
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @elseif (session('failed'))
                                    <div class="alert alert-danger">{{ session('failed') }}</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        @foreach ($creations as $creation)
                                            <div class="post clearfix">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{ asset(Auth::user()->profile->foto ? 'storage/' . Auth::user()->profile->foto : 'storage/photo_profil/default.jpg') }}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </span>
                                                    <span
                                                        class="description">{{ $creation->created_at->format('H:i, l, d F Y') }}</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="card-body">
                                                    <p>
                                                        {{ $creation->title }}
                                                    </p>
                                                    <img src="{{ asset('storage/' . $creation->image_path) }}"
                                                        style="max-width: 300px" alt="">

                                                </div>
                                                <a href="{{ route('karya.edit', $creation->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ route('karya.delete', $creation->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        @endforeach

                                        <!-- /.post -->
                                    </div>
                                    <div class="d-flex justify-content-center ">
                                        {{ $creations->links() }}
                                    </div>


                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal"
                                            action="{{ route('user.update', ['id' => Auth::user()->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="name"
                                                        placeholder="name" value="{{ $data->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail"
                                                        placeholder="Email" name="email" value="{{ $data->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">NIM</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="NIM" name="profile[nim]"
                                                        value="{{ $data->profile->nim }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Angkatan</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputName2"
                                                        placeholder="angkatan" name="profile[angkatan]"
                                                        value="{{ $data->profile->angkatan }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                                                <div class="col-sm-10">
                                                    <select name="profile[divisi]" id="divisi" class="form-control">
                                                        <option value="None"
                                                            {{ $data->profile->divisi == 'None' ? 'selected' : '' }}>Select
                                                        </option>
                                                        <option value="Website"
                                                            {{ $data->profile->divisi == 'Website' ? 'selected' : '' }}>
                                                            Website
                                                        </option>
                                                        <option value="Mobile"
                                                            {{ $data->profile->divisi == 'Mobile' ? 'selected' : '' }}>
                                                            Mobile
                                                        </option>
                                                        <option value="UI/UX"
                                                            {{ $data->profile->divisi == 'UI/UX' ? 'selected' : '' }}>UI/UX
                                                        </option>
                                                        <option value="Sistem Cerdas"
                                                            {{ $data->profile->divisi == 'Sistem Cerdas' ? 'selected' : '' }}>
                                                            Sistem Cerdas</option>
                                                        <option value="Internet Of Things"
                                                            {{ $data->profile->divisi == 'Internet Of Things' ? 'selected' : '' }}>
                                                            Internet Of Things</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo Profile</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" class="custom-file-input"
                                                            id="gambar-landing-page" name="profile[image]">
                                                        <label class="custom-file-label" for="gambar-landingpage">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!empty($data->profile->foto))
                                                <div class="form-group photo-profile">
                                                    {{-- <img src="{{ asset('storage/photo_profil/default.jpg') }}" alt="test"
                                                    width="300" height="300"
                                                    class="profile-user-img img-fluid img-circle"
                                                    style="object-fit: cover;" /> --}}
                                                    <img src="{{ asset('storage/' . $data->profile->foto) }}"
                                                        alt="test" width="300" height="300"
                                                        class="profile-user-img img-fluid img-circle"
                                                        style="object-fit: cover;" />
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>
