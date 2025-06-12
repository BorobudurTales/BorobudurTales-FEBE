# 🏛️ BOROBUDURTALES – Front-End & Back-End

Repositori ini berisi kode sumber **frontend dan backend** dari BorobudurTales, sebuah platform web interaktif yang bertujuan menghidupkan kembali cerita relief Candi Borobudur melalui teknologi digital. Proyek ini merupakan bagian dari capstone project tim CC25-CF247 dalam program Coding Camp 2025.

---

## 🖥️ Tampilan Aplikasi

Aplikasi ini memiliki dua peran utama:  
**🔸 Tampilan User** – untuk pengguna umum  
**🔸 Tampilan Admin** – untuk pengelola sistem

---

### 👤 Tampilan User

Memberikan pengalaman interaktif yang ramah dan mudah digunakan. Fitur-fitur yang tersedia:

#### 🔐 Daftar & Masuk
- Pengguna dapat:
  - Membuat akun baru (registrasi).
  - Login menggunakan email & password.

#### 🏠 Beranda
- Menampilkan:
  - Informasi pengantar tentang aplikasi.
  - Informasi singkat tim pengembang.
  - Navigasi cepat menuju fitur eksplorasi relief dan pustaka cerita.

#### 🗺️ Eksplor (Eksplorasi Relief)
- Pengguna dapat:
  - Menjelajahi relief-relief Candi Borobudur.
  - Melihat sejarah singkat, struktur candi, dan makna filosofis relief.
  - Mengakses cerita sejarah yang terkait secara visual dan menarik.

#### 📚 Pustaka
- Menyediakan:
  - Kumpulan cerita dan artikel seputar Candi Borobudur.
  - Cerita diklasifikasikan dan dijelaskan secara rinci.
  - Pengguna dapat membuka detail cerita untuk mempelajari isi lengkapnya.

#### 📷 Unggah Gambar & Ambil Gambar
- Fitur utama:
  - Pengguna dapat mengunggah gambar relief dari perangkat.
  - Memotret relief secara langsung melalui kamera.
  - Sistem akan menganalisis gambar dan secara otomatis menampilkan jenis relief dan cerita yang berkaitan.

---

### 🛡️ Tampilan Admin

Digunakan untuk mengelola data cerita, data pengguna, serta memantau seluruh aktivitas aplikasi.

#### 📊 Dashboard Admin
- Menampilkan statistik aplikasi:
  - Jumlah pengguna.
  - Aktivitas unggahan gambar.
  - Total data relief & cerita yang tersedia.

#### 📄 Riwayat Pengguna
- Melihat:
  - Riwayat unggahan gambar pengguna.
  - Interaksi pengguna dengan sistem.

#### 👤 Daftar Pengguna & Detail Pengguna
- Menampilkan data pengguna yang terdaftar.
- Admin dapat:
  - Mengedit data pengguna.
  - Melihat informasi pribadi & riwayat aktivitas masing-masing user.

#### 📖 Data Cerita Relief
- Mengelola data cerita relief:
  - Tambah cerita baru.
  - Edit atau perbarui cerita yang ada.
  - Menghapus cerita yang tidak relevan.
  - Melihat detail isi cerita lengkap dengan gambar relief dan referensi pendukung.

#### ⚙️ Profil Admin
- Pengaturan akun admin:
  - Memperbarui informasi diri.
  - Mengubah password.
  - Mengatur preferensi tampilan akun.

---
## 🛠️ Teknologi & Library 

| Teknologi/Library      | Fungsi                                                                 |
|------------------------|------------------------------------------------------------------------|
| **Laravel**            | Framework utama untuk mengembangkan sisi backend, termasuk routing, kontrol akses, dan pengelolaan data aplikasi. |
| **Vite**               | Build tools modern berbasis ES Module yang digunakan untuk melakukan bundling dan penyajian asset frontend dengan cepat dan efisien. |
| **Tailwind CSS**       | Library CSS utility-first yang digunakan untuk membangun antarmuka pengguna yang responsif dan konsisten secara komponen. |
| **MySQL**              | Sistem manajemen basis data relasional yang digunakan sebagai penyimpanan utama untuk data pengguna, cerita, pustaka, dan aktivitas lainnya. |
| **Laravel Breeze**     | Starter kit resmi dari Laravel untuk menerapkan fitur autentikasi dasar seperti registrasi, login, dan proteksi route dengan struktur yang sederhana. |
| **Laravel Sanctum**    | Sistem autentikasi berbasis token yang digunakan untuk mengamankan akses API antar klien dan server, termasuk manajemen sesi login pengguna. |
| **REST API**           | Gaya komunikasi antara frontend dan backend yang memungkinkan pertukaran data dalam format JSON melalui endpoint HTTP yang terstruktur. |
| **Figma**              | Platform desain kolaboratif yang digunakan untuk membuat wireframe, prototype, dan UI final dari aplikasi sebelum proses pengembangan dimulai. |
| **Visual Studio Code** | Editor kode sumber utama yang digunakan dalam proses pengembangan frontend dan backend, dilengkapi dengan berbagai ekstensi produktivitas. |

---

## ⚙️ Instalasi dan Setup Lokal

### 📋 Prasyarat
- PHP ≥ 8.1
- Composer
- Node.js & NPM
- MySQL

### 🔧 Langkah Instalasi
```bash
git clone https://github.com/BorobudurTales/BorobudurTales-FEBE.git
cd BorobudurTales-FEBE

cp .env.example .env
composer install
npm install && npm run dev
php artisan key:generate
php artisan migrate --seed

php artisan serve
```

---

## 🎨 Mockup Desain

📱 **User**  
![user](https://github.com/user-attachments/assets/eed426d4-e00d-4e8d-aba3-bd0872f80cf1)

🎯 **Admin**  
![admin](https://github.com/user-attachments/assets/1a6cf49d-ec56-4d32-acdd-6b848640bf17)

🔗 **Lihat Desain Lengkap di Figma**: [Figma Capstone Project](https://www.figma.com/design/IguXXq0naOjKpYCgxCDCdY/Capstone-Project?node-id=1-4&p=f)

---

## 🌐 URL Aplikasi & Dokumentasi API

- 🔗 **Akses Aplikasi Web**: [https://capstone.andreasadi.my.id](https://capstone.andreasadi.my.id)

- 📘 **Dokumentasi API**: [https://capstone.andreasadi.my.id/api/documentation](https://capstone.andreasadi.my.id/api/documentation)
