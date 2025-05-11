@extends('layoutDashboard.master')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/simplemde/simplemde.min.css">
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Text Editors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Text Editors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Summernote
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <textarea id="summernote">
                              <p>Text Here..</p>
                            </textarea>
                        </div>
                    </div>
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
