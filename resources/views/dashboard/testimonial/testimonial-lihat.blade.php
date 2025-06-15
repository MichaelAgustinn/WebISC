@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Member Testimonial</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Member Testimonial</li>
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
                                <h3 class="card-title">Testimonial Table</h3>
                            </div>
                            <!-- ./card-header -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @elseif(session('deleted'))
                                <div class="alert alert-danger">{{ session('deleted') }}</div>
                            @endif
                            <div class="card-body">
                                <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-success">Tambah Data</a>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Nim</th>
                                            <th>Angkatan</th>
                                            <th>Jabatan</th>
                                            <th>Rating</th>
                                            <th>Pesan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $testimonial->user->name }}</td>
                                                <td>{{ $testimonial->user->profile->nim ?? '' }}</td>
                                                <td>{{ $testimonial->user->profile->angkatan ?? '' }}</td>
                                                <td>{{ $testimonial->user->profile->jabatan ?? '' }}</td>
                                                <td>{{ $testimonial->rating }}</td>
                                                <td>{{ $testimonial->message }}</td>
                                                <td>
                                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('testimonial.delete', $testimonial->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        {{-- @method('DELETE') --}}
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
