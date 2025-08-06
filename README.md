# 🏥 RuliKlinik

**RuliKlinik** adalah aplikasi manajemen klinik berbasis web yang dibangun menggunakan Laravel. Aplikasi ini dirancang untuk membantu pengelolaan data pasien dan pengguna secara efisien dan terstruktur.
Jadi Alurnya adalah Pasien Daftar lalu mendapatkan email berupa nomor antrian. Dan admin bisa mengelola pasien. Di web ini juga menggunakan fitur soft deletes yang jika sudah di hapus tidak akan hilang.

## 🚀 Fitur Utama

- ✅ Manajemen Data Pasien
- ✅ Manajemen Akun Pengguna (User)
- ✅ Autentikasi Login
- ✅ Soft Deletes
- 🚧 Sistem Antrean


## 🧱 Teknologi yang Digunakan

- **Framework**: Laravel 10
- **Database**: MySQL
- **Frontend**: Blade 

## 📂 Struktur Tabel Yang Digunakan

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


Tampilan 
1. Landing Page
   <img width="1891" height="917" alt="image" src="https://github.com/user-attachments/assets/8fa9422f-4f8c-4e10-a17c-0d0c97a9b1ec" />
2. Input Pendaftaran Pasien
   <img width="1898" height="822" alt="image" src="https://github.com/user-attachments/assets/a8f69e94-505b-4c12-a0fd-046e69354709" />
3. Login Admin
   <img width="1918" height="882" alt="image" src="https://github.com/user-attachments/assets/f1f95961-0375-4f09-9f54-0e3c2a0c9768" />
4. Dashboard Admin
   <img width="1904" height="712" alt="image" src="https://github.com/user-attachments/assets/91a97d9f-f331-483d-9fbe-7d820273ba2e" />
5. User
   <img width="1905" height="711" alt="image" src="https://github.com/user-attachments/assets/4e433993-e26a-4874-a002-867eae2510e1" />
6. pasien
   <img width="1880" height="917" alt="image" src="https://github.com/user-attachments/assets/851414ce-ebf0-44e2-a426-35588dbe01b4" />
7. Trashed User (User yang sudah di hapus)
   <img width="1896" height="812" alt="image" src="https://github.com/user-attachments/assets/04d44f3b-972e-4585-9208-a3e317808c1d" />
8. Trashed Pasien (Pasien yang sudah di hapus)
   <img width="1209" height="868" alt="image" src="https://github.com/user-attachments/assets/15202a23-282c-42e6-99ba-c31ed0ada2fc" />
9. Demo email pasien menggunakan Mailtrap
    ![Uploading image.png…]()

