# CRUD Siswa & Mata Pelajaran

Proyek ini adalah aplikasi sederhana untuk mengelola data **Siswa** dan **Mata Pelajaran**.  
Fitur utama meliputi **Create, Read, Update, Delete (CRUD)** serta **login & register (authentication)**.

## 📌 Fitur
- **Siswa**
  - Tambah data siswa
  - Edit data siswa
  - Hapus data siswa
  - Menampilkan daftar siswa
  - Relasi siswa dengan mata pelajaran (many-to-many)

- **Mata Pelajaran**
  - Tambah data mata pelajaran
  - Edit data mata pelajaran
  - Hapus data mata pelajaran
  - Menampilkan daftar mata pelajaran

- **Authentication**
  - Register akun baru
  - Login pengguna
  - Session untuk menjaga keamanan

## 🏗️ Perjalanan Belajar
Proyek ini saya buat sebagai bagian dari latihan belajar PHP & MySQL:
1. **Versi Procedural**  
   CRUD sederhana menggunakan PHP murni dengan `if else`.
2. **Transisi ke MVC Campuran**  
   Mulai mengenal konsep `Controller`, `Model`, dan `View`, tapi masih ada campuran procedural.
3. **MVC Lebih Rapi**  
   Struktur folder lebih teratur, ada `controller/`, `model/`, `view/`, `config/`.

## 📂 Struktur Folder : 
*(Lihat langsung di tab **Code** agar lebih rapih)*

**1.** Procedural : Tahap Awal
```
procedural/
├── mapel/ # CRUD mapel
├── siswa/ # CRUD siswa
├── auth.php # cek session
├── dashboard.php # halaman awal
├── koneksi.php # koneksi Database
├── login_cek.php # login koneksi ke Database
├── login.php # form login
├── logout.php # session destroy
├── nav.php # halaman navigasi
├── register_proses.php # register koneksi ke Database
├── register.php # form register
```

**2.** MVC-Siswa : Pisah File dan Campuran
```
mvc-siswa/
├── app/
│ ├── controller/
│ │ ├── AuthController.php # Mengatur login & registrasi
│ │ ├── SiswaController.php # CRUD data siswa
│ │ ├── MapelController.php # CRUD data mata pelajaran
│ ├── helper/
│ │ ├── pagination.php # Halaman data
│ ├── model/
│ │ ├── Siswa.php # Model untuk data siswa
│ │ ├── Mapel.php # Model untuk data mata pelajaran
│ │ ├── SiswaMapel.php # Model relasi many-to-many siswa & mapel
│ ├── view/
│ │ ├── auth/ # View untuk login & registrasi
│ │ ├── layout/ # View untuk kerangka dasar
│ │ ├── mapel/ # View untuk mapel
│ │ └── siswa/ # View untuk siswa
│ │ └── 404.php # View untuk halaman kosong
├── config/
│ ├── koneksi.php # Koneksi ke database
│ └── config.php # Konfigurasi global
├── public/
│ ├── style.css
│ └── index.php # Router utama
```

**3.** MVC-Siswa : Lebih Rapih
```
mvc-siswa-upgrade/
├── app/
│ ├── controller/
│ │ ├── AuthController.php # Mengatur login & registrasi
│ │ ├── SiswaController.php # CRUD data siswa
│ │ ├── MapelController.php # CRUD data mata pelajaran
│ ├── helper/
│ │ ├── pagination.php # Halaman data
│ ├── model/
│ │ ├── Siswa.php # Model untuk data siswa
│ │ ├── Mapel.php # Model untuk data mata pelajaran
│ │ ├── SiswaMapel.php # Model relasi many-to-many siswa & mapel
│ ├── view/
│ │ ├── auth/ # View untuk login & registrasi
│ │ ├── layout/ # View untuk kerangka dasar
│ │ ├── mapel/ # View untuk mapel
│ │ └── siswa/ # View untuk siswa
│ │ └── 404.php # View untuk halaman kosong
├── config/
│ ├── koneksi.php # Koneksi ke database
│ └── config.php # Konfigurasi global
├── public/
│ ├── .htaccess # Konfigurasi Apache (URL rewriting)
│ ├── index.php # Router utama
│ └── style.css # File CSS untuk tampilan
```

**4.** MVC-Siswa : Punya 3 User
```
mvc-siswa/
├── app/
│ ├── controller/
│ │ ├── AuthController.php # Mengatur login & registrasi
│ │ ├── ErrorController.php # Mengatur Error
│ │ ├── HomeController.php # Entry Point
│ │ ├── SiswaController.php # CRUD data siswa
│ │ ├── MapelController.php # CRUD data mata pelajaran
│ ├── helper/
│ │ ├── flash_helper # List Pesan
│ │ ├── pagination.php # Halaman data
│ │ ├── Flash.php # Mengatur Pesan
│ ├── middleware
│ │ ├── AuthMiddleware.php 
│ │ ├── GuestMiddleware.php
│ │ ├── RoleMiddelware.php 
│ ├── model/
│ │ ├── BaseModel.php 
│ │ ├── Siswa.php # Model untuk data siswa
│ │ ├── Mapel.php # Model untuk data mata pelajaran
│ │ ├── SiswaMapel.php # Model relasi many-to-many siswa & mapel
│ │ ├── User.php
│ ├── view/
│ │ ├── auth/ # View untuk login & registrasi
│ │ ├── error # tempat Error 400 dan lainnya
│ │ ├── layout/ # View untuk kerangka dasar
│ │ ├── mapel/ # View untuk mapel
│ │ ├── partial # Flash get key
│ │ └── siswa/ # View untuk siswa
├── config/
│ ├── autoload.php # Otomatis cek Controller & Model
│ ├── koneksi.php # Koneksi ke database
│ ├── config.php # Konfigurasi global
│ └── middleware.php # Akses URL untuk Role
├── public/
│ ├── .htaccess # Konfigurasi Apache (URL rewriting)
│ ├── index.php # Router utama
│ └── style.css # File CSS untuk tampilan
```

**5.** MVC-Siswa-CI4 — Versi CodeIgniter 4
```
mvc-siswa-ci4/
├── app/
├── public/
├── writable/
├── composer.json
└── spark


## ⚙️ Teknologi
- **PHP** (Procedural → MVC campuran)
- **MySQL** (phpMyAdmin)
- **HTML, CSS**
- **JavaScript** (sedikit, untuk interaksi dasar)
- **CodeIgniter 4** (versi terbaru)

## 🚀 Cara Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/username/mvc-siswa.git
2. Import database :
   - Buka phpMyAdmin
   - Buat database `db_siswa`
   - Import file `db_siswa.sql`
3. Jalankan project di localhost atau XAMPP
4. Akses melalui browser:
   - procedural = http://localhost/procedural/login.php
   - mvc campuran = http://localhost/mvc-siswa/public
   - mcv lebih rapih = http://localhost/mvc-siswa/public

## 🔑 Akun Default
Username :
```
admin
```
Password :
```
admin123
```

## 📝 Catatan
Keep Moving Forward
