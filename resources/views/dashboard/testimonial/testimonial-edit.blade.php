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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Testimoni</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('testimonial.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="user_id">User Id</label>
                                        <input type="hidden" id="user_id" name="user_id" value="{{ $data->user->id }}">
                                        <input type="text" class="form-control" value="{{ $data->user->name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <input type="number" inputmode="numeric" class="form-control" id="rating"
                                            name="rating" placeholder="1-5" value="{{ $data->rating }}">
                                    </div>

                                    <div class="form-group dropdown">
                                        <label for="content">Pesan</label>
                                        <input type="text" class="form-control" id="section" placeholder="pesan"
                                            name="message" value="{{ $data->message }}">
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
