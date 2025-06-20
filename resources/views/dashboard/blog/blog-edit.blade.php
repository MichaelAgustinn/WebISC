@extends('layoutDashboard.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert bg-danger">{{ session('error') }}</div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form untuk menyimpan data -->
                    <form action="{{ route('blog.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Judul -->
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" required
                                value="{{ old('title', $data->title) }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Summernote Description -->
                        <div class="form-group">
                            <label for="summernote">Deskripsi</label>
                            <textarea id="summernote" name="description">{{ old('description', $data->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <!-- /.col-->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
