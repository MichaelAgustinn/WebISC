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

                            <form
                                action="{{ isset($contact) ? route('contact.update', $contact) : route('contact.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($contact))
                                    @method('PUT')
                                @endif

                                <div class="card-body">
                                    <!-- Dropdown Type -->
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Email"
                                                {{ isset($contact) && $contact->type == 'Email' ? 'selected' : '' }}>Email
                                            </option>
                                            <option value="Address"
                                                {{ isset($contact) && $contact->type == 'Address' ? 'selected' : '' }}>
                                                Address</option>
                                            <option value="Phone"
                                                {{ isset($contact) && $contact->type == 'Phone' ? 'selected' : '' }}>Phone
                                            </option>
                                            <option value="Open Hours"
                                                {{ isset($contact) && $contact->type == 'Open Hours' ? 'selected' : '' }}>
                                                Open Hours</option>
                                        </select>
                                    </div>

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="name" value="{{ isset($contact) ? $contact->name : '' }}">
                                    </div>

                                    <!-- Value -->
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control" id="value" name="value"
                                            placeholder="value" value="{{ isset($contact) ? $contact->value : '' }}">
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
