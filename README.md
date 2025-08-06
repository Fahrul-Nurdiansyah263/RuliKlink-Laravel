# 🏥 RuliKlinik

**RuliKlinik** adalah aplikasi manajemen klinik berbasis web yang dibangun menggunakan Laravel. Aplikasi ini dirancang untuk membantu pengelolaan data pasien dan pengguna secara efisien dan terstruktur.
Jadi Alurnya adalah Pasien Daftar lalu mendapatkan email berupa nomor antrian. Dan admin bisa mengelola pasien.

## 🚀 Fitur Utama

- ✅ Manajemen Data Pasien
- ✅ Manajemen Akun Pengguna (User)
- ✅ Autentikasi Login
- 🚧 Sistem Antrean


## 🧱 Teknologi yang Digunakan

- **Framework**: Laravel 10
- **Database**: MySQL
- **Frontend**: Blade 

## 📂 Struktur Tabel Saat Ini

### 1. `users`
Menyimpan data akun pengguna sistem (admin).
| Kolom         | Tipe Data    | Keterangan           |
|---------------|--------------|----------------------|
| id            | BIGINT       | Primary key          |
| name          | VARCHAR      | Nama pengguna        |
| email         | VARCHAR      | Email unik           |
| password      | VARCHAR      | Password terenkripsi |
| created_at    | TIMESTAMP    |                      |
| updated_at    | TIMESTAMP    |                      |
| deleted_at    | TIMESTAMP    |                      |

### 2. `pasien`
Menyimpan data pasien yang mendaftar ke klinik.
| Kolom         | Tipe Data    | Keterangan           |
|---------------|--------------|----------------------|
| id            | BIGINT       | Primary key          |
| nama_pasien   | VARCHAR      | Nama pasien          |
| email_pasien  | VARCHAR      | Email pasien         |
| nomor_antrean | INT          | Nomor Antrian        |
| tanggal       | DATE         | Tanggal Kunjungan    |
| jam           | VARCHAR      | Jam Kunjungan        |
| created_at    | TIMESTAMP    |                      |
| updated_at    | TIMESTAMP    |                      |
| deleted_at    | TIMESTAMP    |                      |



## 🛠️ Cara Menjalankan Proyek

1. Clone repository:
   ```bash
   git clone https://github.com/username/RuliKlinik.git
   cd RuliKlinik
