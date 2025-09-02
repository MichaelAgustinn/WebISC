@extends('layoutDashboard.master')
@section('content')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .user-card {
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 6px 10px;
        }

        .user-card button {
            margin-left: 10px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Karya</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Karya</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('failed'))
            <div class="alert alert-danger">{{ session('failed') }}</div>
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
                                <h3 class="card-title">Karya Section</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('karya.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="section">Judul</label>
                                        <input type="text" class="form-control" id="section" name="title"
                                            placeholder="judul" value="{{ $creation->title }}">
                                    </div>
                                    <div class="form-group dropdown">
                                        <label for="content">Deskripsi</label>
                                        <input type="text" class="form-control" id="section" placeholder="deskripsi"
                                            name="description" value="{{ $creation->description }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto Karya</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    id="gambar-landing-page" name="image">
                                                <label class="custom-file-label" for="gambar-landingpage">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($creation && $creation->image_path)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' . $creation->image_path) }}" alt="test"
                                                width="200px" height="auto"
                                                style="object-fit: cover; border-radius: 8px;" />
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="searchBox">Cari Nama Anggota</label> <small class="text-muted">(Tekan
                                            Ctrl (atau Cmd di Mac) untuk pilih
                                            anggota)</small>
                                        <input type="text" id="searchBox" class="form-control mb-2"
                                            placeholder="Ketik nama...">
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="userSelect">Pilih Anggota</label> --}}

                                        <select id="userSelect" class="form-control" multiple style="width: 100%;">
                                            @foreach ($users as $u)
                                                @if ($u->role !== 'Admin')
                                                    <option value="{{ $u->id }}"
                                                        data-name="{{ $u->name }} | {{ $u->profile->nim }}">
                                                        {{ $u->name }} | {{ $u->profile->nim }}
                                                    </option>
                                                @endif
                                            @endforeach 
                                        </select>
                                    </div>
                                    <!-- Container untuk card nama yang dipilih -->
                                    <div id="selectedUsers" class="d-flex flex-wrap gap-2 mb-3"></div>

                                    <!-- Hidden input untuk dikirim ke backend -->
                                    <div id="userHiddenInputs"></div>

                                    <div class="form-group dropdown">
                                        <label for="jabatan">Divisi</label>
                                        <select class="form-control" id="role" name="divisi">
                                            <option value="None" {{ $creation->divisi == 'None' ? 'selected' : '' }}>None
                                            </option>
                                            <option value="Mobile" {{ $creation->divisi == 'Mobile' ? 'selected' : '' }}>
                                                Mobile</option>
                                            <option value="Website" {{ $creation->divisi == 'Website' ? 'selected' : '' }}>
                                                Website</option>
                                            <option value="SistemCerdas"
                                                {{ $creation->divisi == 'Sistem Cerdas' ? 'selected' : '' }}>Sistem Cerdas
                                            </option>
                                            <option value="IoT"
                                                {{ $creation->divisi == 'Internet Of Things' ? 'selected' : '' }}>Internet
                                                Of Things</option>
                                        </select>
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
    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const searchBox = document.getElementById('searchBox');
        const userSelect = document.getElementById('userSelect');
        const selectedUsersDiv = document.getElementById('selectedUsers');

        const selectedUsers = new Map();

        function renderSelectedUsers() {
            selectedUsersDiv.innerHTML = '';

            selectedUsers.forEach((name, id) => {
                const card = document.createElement('div');
                card.classList.add('user-card');
                card.textContent = name;

                const btn = document.createElement('button');
                btn.textContent = '×';
                btn.title = 'Hapus';
                btn.onclick = () => {
                    selectedUsers.delete(id);
                    updateSelectOptions();
                    renderSelectedUsers();
                };

                card.appendChild(btn);
                selectedUsersDiv.appendChild(card);
            });
        }

        function updateSelectOptions() {
            for (let option of userSelect.options) {
                option.selected = selectedUsers.has(option.value);
            }
        }

        userSelect.addEventListener('change', () => {
            // Tambah yg dipilih
            for (let option of userSelect.options) {
                if (option.selected) {
                    selectedUsers.set(option.value, option.getAttribute('data-name'));
                } else {
                    selectedUsers.delete(option.value);
                }
            }
            renderSelectedUsers();
        });

        // Filter options berdasarkan pencarian
        searchBox.addEventListener('input', () => {
            const keyword = searchBox.value.toLowerCase();

            for (let option of userSelect.options) {
                const text = option.textContent.toLowerCase();
                option.style.display = text.includes(keyword) ? '' : 'none';
            }
        });

        // Inisialisasi render jika ada yang sudah dipilih (misal dari HTML)
        renderSelectedUsers();
    </script>
@endsection
