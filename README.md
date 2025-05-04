## <p align="center" style="margin-top: 0;">Website Profil Informatics Study Club</p>

<p align="center">
  <img src="/public/LogoUnsulbar.png" width="300" alt="LogoUnsulbar" />
</p>

### <p align="center">MICHAEL AGUSTIN</p>

### <p align="center">D0223310</p></br>

### <p align="center">Framework Web Based</p>

### <p align="center">2025</p>

---

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role             | Akses                                                          |
| ---------------- | -------------------------------------------------------------- |
| **User** (Guest) | Melihat landing page, blog, prestasi, testimoni                |
| **Anggota**      | Semua akses User + Mengunggah karya                            |
| **Pengurus**     | Semua akses Anggota + Kelola anggota, testimoni, log aktivitas |
| **Admin**        | Semua akses Pengurus + Kelola user dan landing page            |

---

## 🗃️ Struktur Database

### Tabel `users`

| Field      | Tipe Data        | Keterangan               |
| ---------- | ---------------- | ------------------------ |
| id         | bigint (PK)      | ID unik                  |
| name       | varchar          | Nama pengguna            |
| email      | varchar (unique) | Email pengguna           |
| password   | varchar          | Password terenkripsi     |
| nim        | char             | NIM anggota              |
| angkatan   | year             | Tahun angkatan           |
| role       | enum             | admin, pengurus, anggota |
| created_at | timestamp        | Tanggal dibuat           |
| updated_at | timestamp        | Tanggal update           |

### Tabel `creations`

| Field      | Tipe Data   | Keterangan                      |
| ---------- | ----------- | ------------------------------- |
| id         | bigint (PK) | ID creations                    |
| user_id    | foreign key | Relasi ke `users`               |
| nama_user  | varchar     | Diambil dari `users`            |
| title      | varchar     | Judul karya                     |
| deskripsi  | text        | Deskripsi karya                 |
| image_path | varchar     | Path gambar karya               |
| divisi     | enum        | Website, Mobile, IoT, UI/UX, AI |
| created_at | timestamp   | Tanggal dibuat                  |
| updated_at | timestamp   | Tanggal update                  |

### Tabel `blogs`

| Field      | Tipe Data   | Keterangan           |
| ---------- | ----------- | -------------------- |
| id         | bigint (PK) | ID karya             |
| user_id    | foreign key | Relasi ke `users`    |
| nama_user  | varchar     | Diambil dari `users` |
| title      | varchar     | Judul karya          |
| deskripsi  | text        | Deskripsi karya      |
| image_path | varchar     | Path gambar karya    |
| created_at | timestamp   | Tanggal dibuat       |
| updated_at | timestamp   | Tanggal update       |

### Tabel `landing_page_contents`

| Field      | Tipe Data   | Keterangan                   |
| ---------- | ----------- | ---------------------------- |
| id         | bigint (PK) | ID karya                     |
| section    | enum        | deskripsi, visi, misi        |
| content    | text        | Isi dari konten landing page |
| image_path | varchar     | Path konten                  |
| created_at | timestamp   | Tanggal dibuat               |
| updated_at | timestamp   | Tanggal update               |

### Tabel `activity_logs`

| Field      | Tipe Data   | Keterangan                                  |
| ---------- | ----------- | ------------------------------------------- |
| id         | bigint (PK) | ID log                                      |
| user_id    | foreign key | Relasi ke `users`                           |
| aktivitas  | text        | Deskripsi aktivitas (misal: "unggah karya") |
| created_at | timestamp   | Tanggal dan waktu aktivitas                 |

### Tabel `faqs`

| Field      | Tipe Data   | Keterangan                      |
| ---------- | ----------- | ------------------------------- |
| id         | bigint (PK) | ID FAQ                          |
| pertanyaan | text        | Pertanyaan umum dari user       |
| jawaban    | text        | Jawaban dari tim pengurus/admin |
| created_at | timestamp   | Tanggal dibuat                  |
| updated_at | timestamp   | Tanggal diperbarui              |

### Tabel `sosmeds`

| Field      | Tipe Data   | Keterangan                           |
| ---------- | ----------- | ------------------------------------ |
| id         | bigint (PK) | ID sosial media                      |
| nama       | varchar     | Nama platform (Instagram, dsb.)      |
| icon       | varchar     | Nama ikon (misal: fontawesome class) |
| url        | varchar     | URL ke sosial media                  |
| created_at | timestamp   | Tanggal dibuat                       |
| updated_at | timestamp   | Tanggal diperbarui                   |

### Tabel `testimoni`

| Field      | Tipe Data   | Keterangan             |
| ---------- | ----------- | ---------------------- |
| id         | bigint (PK) | ID testimoni           |
| nama       | varchar     | Nama pemberi testimoni |
| pesan      | text        | Isi testimoni          |
| created_at | timestamp   | Tanggal dibuat         |
| updated_at | timestamp   | Tanggal diperbarui     |

## 🔗 Relasi Antar Tabel

| Tabel Asal | Tabel Tujuan  | Relasi      | Penjelasan                              |
| ---------- | ------------- | ----------- | --------------------------------------- |
| users      | blog          | one-to-many | Satu user dapat membuat banyak blog     |
| users      | karya         | one-to-many | Satu user dapat mengunggah banyak karya |
| users      | activity_logs | one-to-many | Aktivitas dicatat per user              |
| sosmed     | users         | one-to-one  | Satu akun sosmed per user               |

---
