@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Contact Page</li>
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
                                <h3 class="card-title">Email Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ !empty($email) ? route('contact.update', $email) : route('contact.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($email))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Type</label>
                                        <input type="text" class="form-control" id="section" name="type"
                                            value="Email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name" value="{{ !empty($email->name) ? $email->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="value" value="{{ !empty($email->value) ? $email->value : '' }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        {{-- form contact end --}}

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Address Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form
                                action="{{ !empty($address) ? route('contact.update', $address) : route('contact.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($address))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Type</label>
                                        <input type="text" class="form-control" id="section" name="type"
                                            value="Address" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name" value="{{ !empty($address->name) ? $address->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="value"
                                            value="{{ !empty($address->value) ? $address->value : '' }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Phone Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ !empty($phone) ? route('contact.update', $phone) : route('contact.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($phone))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Type</label>
                                        <input type="text" class="form-control" id="section" name="type"
                                            value="Phone" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name" value="{{ !empty($phone->name) ? $phone->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="value" value="{{ !empty($phone->value) ? $phone->value : '' }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Open Hours Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <form
                                action="{{ !empty($open_hours) ? route('contact.update', $open_hours) : route('contact.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (!empty($open_hours))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Type</label>
                                        <input type="text" class="form-control" id="section" name="type"
                                            value="Open Hours" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name"
                                            value="{{ !empty($open_hours->name) ? $open_hours->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="value"
                                            value="{{ !empty($open_hours->value) ? $open_hours->value : '' }}">
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
