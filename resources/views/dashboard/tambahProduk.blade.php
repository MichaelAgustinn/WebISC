@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Produk 12222222</h2>

        <form action="{{ route('general') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Kategori -->
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori" id="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="akun">Akun</option>
                    <option value="joki">Joki</option>
                </select>
            </div>

            <!-- Nama Game -->
            <div class="mb-3">
                <label for="nama_game" class="form-label">Nama Game</label>
                <input type="text" class="form-control" name="nama_game" id="nama_game">
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
            </div>

            <!-- Gambar Game -->
            <div class="mb-3">
                <label for="gambar_game" class="form-label">Gambar Game</label>
                <input type="file" class="form-control" name="image" id="gambar_game" accept="image/*">
            </div>

            <!-- Harga -->
            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" step="0.01" class="form-control" name="harga" id="harga">
            </div>

            <!-- Status (disembunyikan karena default 'tersedia') -->
            <input type="hidden" name="status" value="tersedia">

            <!-- User ID (jika ingin otomatis dari Auth, bisa diisi di controller) -->

            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </form>
    </div>
@endsection
