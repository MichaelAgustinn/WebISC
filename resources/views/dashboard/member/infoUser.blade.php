@extends('layoutDashboard.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contacts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach ($infouser as $iu)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ $iu->role }}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $iu->name }}</b></h2>
                                                <p class="text-muted text-sm"><b>Divisi: </b>{{ $iu->divisi }}</p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    @if ($iu->profile->jabatan == 'Pembimbing')
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-id-card"></i></span> <b>NIDN: </b>
                                                            {{ $iu->nim }} </li>
                                                    @else
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-id-card"></i></span> <b>NIM: </b>
                                                            {{ $iu->nim }} </li>
                                                    @endif
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-calendar-alt"></i></span> <b>Angkatan:
                                                        </b>
                                                        {{ $iu->angkatan }} </li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-briefcase"></i></span> <b>Jabatan: </b>
                                                        {{ $iu->jabatan }} </li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-layer-group"></i></span><b> Divisi: </b>
                                                        {{ $iu->divisi }}</li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-envelope"></i></span><b> Email: </b>
                                                        {{ $iu->email }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ $iu->profile->foto ? 'storage/' . $iu->profile->foto : 'storage/photo_profil/default.jpg' }}"
                                                    alt="user-avatar" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('user.delete', $iu->id) }}" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapus user ini?')">
                                                <i class="fas fa-user"></i> Delete User
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $infouser->links() }}
                    </div>

                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
