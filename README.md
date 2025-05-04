## <p align="center" style="margin-top: 0;">Website Profil Informatics Study Club</p>

<p align="center">
  <img src="/public/LogoUnsulbar.png" width="300" alt="LogoUnsulbar" />
</p>

### <p align="center">MICHAEL AGUSTIN</p>

### <p align="center">D0223310</p></br>

### <p align="center">Framework Web Based</p>

### <p align="center">2025</p>

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role             | Akses                                                          |
| ---------------- | -------------------------------------------------------------- |
| **User** (Guest) | Melihat landing page, blog, prestasi, testimoni                |
| **Anggota**      | Semua akses User + Mengunggah karya                            |
| **Pengurus**     | Semua akses Anggota + Kelola anggota, testimoni, log aktivitas |
| **Admin**        | Semua akses Pengurus + Kelola user dan landing page            |

## 🗃️ Struktur Database

### Tabel `users`

| Field      | Tipe Data        | Keterangan               |
| ---------- | ---------------- | ------------------------ |
| id         | bigint (PK)      | ID unik                  |
| nama       | varchar          | Nama pengguna            |
| email      | varchar (unique) | Email pengguna           |
| password   | varchar          | Password terenkripsi     |
| nim        | char             | NIM anggota              |
| angkatan   | year             | Tahun angkatan           |
| role       | enum             | admin, pengurus, anggota |
| created_at | timestamp        | Tanggal dibuat           |
| updated_at | timestamp        | Tanggal update           |

### Tabel `karya`

| Field      | Tipe Data   | Keterangan                      |
| ---------- | ----------- | ------------------------------- |
| id         | bigint (PK) | ID karya                        |
| user_id    | foreign key | Relasi ke `users`               |
| nama_user  | varchar     | Diambil dari `users`            |
| title      | varchar     | Judul karya                     |
| deskripsi  | text        | Deskripsi karya                 |
| image_path | varchar     | Path gambar karya               |
| divisi     | enum        | Website, Mobile, IoT, UI/UX, AI |
| created_at | timestamp   | Tanggal dibuat                  |
| updated_at | timestamp   | Tanggal update                  |

## 🔗 Relasi Antar Tabel

| Tabel Asal | Tabel Tujuan  | Relasi      | Penjelasan                              |
| ---------- | ------------- | ----------- | --------------------------------------- |
| users      | blog          | one-to-many | Satu user dapat membuat banyak blog     |
| users      | karya         | one-to-many | Satu user dapat mengunggah banyak karya |
| users      | activity_logs | one-to-many | Aktivitas dicatat per user              |
| sosmed     | users         | one-to-one  | Satu akun sosmed per user               |
