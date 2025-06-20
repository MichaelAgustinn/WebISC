# 🎓 Website Profil Informatics Study Club

<p align="center">
  <img src="/public/LogoUnsulbar.png" width="300" alt="LogoUnsulbar" />
</p>

### <p align="center">MICHAEL AGUSTIN</p>

### <p align="center">D0223310</p>

### <p align="center">Framework Web Based</p>

### <p align="center">2025</p>

---

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role         | Akses                                                                              |
| ------------ | ---------------------------------------------------------------------------------- |
| **Anggota**  | Akses landing page + Mengunggah karya                                              |
| **Pengurus** | Semua akses Anggota + Kelola anggota, testimoni, log aktivitas, bisa approve karya |
| **Admin**    | Semua akses Pengurus + Kelola user dan landing page                                |

---

## 🗃️ Struktur Database

### 🔐 Tabel `users`

Berisi data user dan peran di sistem.

-   Relasi: `hasOne` ke `profiles`, `hasMany` ke `blogs`, `creations`, `activity_logs`
-   Role: None, Anggota, Pengurus, Admin

### 🎨 Tabel `creations`

Berisi karya yang diunggah oleh anggota.

-   Divisi: Mobile, Website, IoT, UIUX, SistemCerdas
-   Status: pending, approve, rejected
-   Many-to-many dengan `users` melalui `creation_user`

### ✍️ Tabel `blogs`

Berisi blog yang dibuat oleh user.

### 🌐 Tabel `landing_page_contents`

Mengelola konten halaman utama seperti visi, misi, tujuan, dan hero.

### 📜 Tabel `activity_logs`

Mencatat semua aktivitas user, seperti upload karya atau update profil.

### ❓ Tabel `faqs`

Berisi daftar pertanyaan umum beserta jawabannya.

### 💬 Tabel `testimonials`

Berisi testimoni dari user. Admin atau pengurus dapat mengelola isinya.

### 👥 Tabel `creation_user`

Pivot table antara user dan creation untuk menandai siapa saja anggota tim karya.

### 🧾 Tabel `profiles`

Berisi detail tambahan user: NIM, angkatan, jabatan, divisi, dan foto profil.

### 🖼️ Tabel `logos`

Berisi logo yang ditampilkan di landing page atau tempat lain di website.

### 📞 Tabel `contacts`

Berisi info kontak seperti email, alamat, nomor telepon, dan jam buka.

---

## 🔗 Relasi Antar Tabel

| Tabel Asal | Tabel Tujuan     | Relasi       | Penjelasan                                    |
| ---------- | ---------------- | ------------ | --------------------------------------------- |
| users      | blogs            | one-to-many  | Satu user dapat membuat banyak blog           |
| users      | activity_logs    | one-to-many  | Aktivitas dicatat per user                    |
| users      | member_creations | one-to-many  | Satu user dapat memiliki banyak member karya  |
| creations  | member_creations | one-to-many  | Satu karya dapat memiliki banyak member karya |
| users      | creations        | many-to-many | Dihubungkan oleh tabel member_creations       |

---
