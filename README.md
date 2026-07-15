# Academic Information System (CodeIgniter 4 & MySQL)

Aplikasi manajemen data akademik untuk mengelola informasi siswa, mata pelajaran, dan hak akses multi-role. Repositori ini mendokumentasikan transformasi arsitektur kode dari pendekatan prosedural murni hingga framework MVC modern untuk menunjukkan proses peningkatan efisiensi kode dan pengelolaan database yang optimal.

## 🚀 Fitur Utama
* **Multi-Role Authentication**: Akses sistem yang disesuaikan berdasarkan peran pengguna (Admin, Guru, dan Siswa).
* **Manajemen Data (CRUD)**: Pengelolaan relasi data kompleks (Many-to-Many) antara Siswa dan Mata Pelajaran menggunakan SQL.
* **Interactive UI & Security**: Validasi input di sisi server yang terintegrasi dengan SweetAlert2 untuk respon notifikasi yang interaktif.

## 🛠️ Teknologi & Tools
* **Language**: PHP (CodeIgniter 4 Framework) & HTML/CSS
* **Database & Information Systems**: MySQL / SQL (Perancangan Database Relasional)
* **Library**: SweetAlert2 (JavaScript basis untuk notifikasi)

## 📂 Peta Perjalanan Kode (Learning Path)
Struktur kode di dalam repositori ini dibagi menjadi 5 tahap pengembangan:
1. `01_procedural` – Tahap awal sistem menggunakan PHP native murni dan logika prosedural.
2. `02_mvc_siswa` – Migrasi pertama untuk memisahkan logika ke dalam komponen Model, View, dan Controller (Campuran).
3. `03_mvc_siswa_upgrade` – Rekayasa ulang struktur kode agar pemisahan folder MVC menjadi lebih rapi dan terorganisir.
4. `04_mvc_siswa_upgrade_up` – Tahap persiapan tingkat lanjut agar transisi menuju framework profesional menjadi lebih mudah.
5. `05_mvc_siswa_ci4` – Implementasi penuh menggunakan Framework CodeIgniter 4 dengan tambahan fitur keamanan Ubah Password berbasis SweetAlert.

## ⚙️ Cara Menjalankan Project
1. Clone repositori ini ke folder lokal komputer Anda.
2. Pindahkan folder ke direktori server lokal (contoh: `xampp/htdocs/`).
3. Buat database baru bernama `db_siswa` di phpMyAdmin, lalu import file `db_siswa.sql`.
4. Buka terminal pada folder proyek CodeIgniter 4 (`05_mvc_siswa_ci4`), lalu jalankan perintah:
   ```bash
   php spark serve
   
## 🌐 Demo Aplikasi
Aplikasi sudah di-deploy secara live dan dapat diakses melalui: 
[https://heddycahyafirdaus.freedev.app/](https://heddycahyafirdaus.freedev.app/)

### 🔑 Akun Demo (Gunakan untuk mencoba):
* **Admin**  
  * Username: `admin`  
  * Password: `admin123`  
* **Guru**  
  * Username: `guru1`  
  * Password: `123456`  
* **Siswa**  
  * NIS: `10116309`  
  * Password: `123123`

## 📝 Catatan
Keep Moving Forward