@extends('layoutDashboard.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>FAQ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">FAQ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        @if (session('success'))
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        @endif
        <section class="content">
            <a href="{{ route('faq.tambah') }}" class="btn btn-success">Tambah Data</a>
            <div class="row">
                <div class="col-12" id="accordion">
                    @foreach ($faqs as $faq)
                        <form action="{{ route('faq.update', $faq->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card card-primary card-outline">
                                <div class="d-block w-100" data-toggle="collapse">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <label for="question">Pertanyaan</label>
                                            <input type="text" class="form-control" id="question" name="question"
                                                value="{{ $faq->question }}">
                                        </h4>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <label for="answered">Jawaban</label>
                                        <input type="text" class="form-control" id="answered" name="answered"
                                            value="{{ $faq->answered }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Simpan</button>
                                    <a href="{{ route('faq.delete', $faq->id) }}" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
