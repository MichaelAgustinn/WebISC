@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pengurus')
                            <h1>karya Total</h1>
                        @else
                            <h1>karya Saya</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pengurus')
                                <li class="breadcrumb-item active">karya Total</li>
                            @else
                                <li class="breadcrumb-item active">karya Saya</li>
                            @endif
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
                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pengurus')
                                    <h3 class="card-title">Table Karya</h3>
                                @else
                                    <h3 class="card-title">Table Karya</h3>
                                @endif
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
                                            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pengurus')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    <tbody>
                                        @foreach ($data as $karya)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $karya->id }}</td>
                                                <td>{{ $karya->title }}</td>
                                                <td>{{ $karya->description }}</td>
                                                <td>
                                                    @if ($karya && $karya->image_path)
                                                        <div class="form-group">
                                                            <img src="{{ asset('storage/' . $karya->image_path) }}"
                                                                alt="test" width="200px" height="auto"
                                                                style="object-fit: cover; border-radius: 8px;" />
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $karya->divisi }}</td>
                                                <td>{{ $karya->status }}</td>
                                                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pengurus')
                                                    <td>
                                                        @if ($karya->status != 'approve')
                                                            <form action="{{ route('karya.validated', $karya->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success">Verifikasi
                                                                    karya</button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('karya.unvalidated', $karya->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Rejected
                                                                    Karya</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                @endif

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
