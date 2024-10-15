# Aplikasi Kasir - Uji Kompetensi

![Aplikasi Kasir](https://img.shields.io/badge/Aplikasi-Kasir-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

Aplikasi Kasir **Uji Kompetensi** ini dibuat untuk mempermudah pengelolaan transaksi penjualan, stok barang, serta laporan transaksi. Aplikasi ini cocok digunakan oleh usaha kecil dan menengah (UKM) yang membutuhkan solusi sederhana namun efektif untuk pengelolaan kasir dan inventori.

## Fitur Utama

- **Pengelolaan Barang**: Tambah, edit, dan hapus data barang dengan mudah.
- **Transaksi Penjualan**: Mencatat transaksi dengan rincian barang, harga, dan jumlah yang dibeli.
- **Laporan Transaksi**: Menampilkan laporan penjualan harian, bulanan, dan tahunan.
- **Stok Barang**: Pantau stok barang dan dapatkan notifikasi saat stok menipis.
- **User-Friendly**: Tampilan antarmuka yang sederhana dan mudah digunakan.
- **Multi-User**: Mendukung beberapa pengguna dengan hak akses berbeda (kasir dan admin).

## Instalasi

1. **Clone repository**:

    ```bash
    git clone https://github.com/RizkyAlfarizy12/aplikasi_kasir_ujikom.git
    ```

2. **Masuk ke direktori aplikasi**:

    ```bash
    cd aplikasi_kasir_ujikom
    ```

3. **Instal dependencies** (jika ada):

    ```bash
    composer install  # atau npm install, sesuai teknologi yang digunakan
    ```

4. **Konfigurasi database**:

   Pastikan Anda telah membuat database, lalu sesuaikan pengaturan database pada file `.env`.

    ```bash
    DB_DATABASE=nama_database
    DB_USERNAME=username_database
    DB_PASSWORD=password_database
    ```

5. **Migrasi dan Seed Database**:

    ```bash
    php artisan migrate --seed
    ```

6. **Jalankan aplikasi**:

    ```bash
    php artisan serve
    ```

7. Buka browser dan akses aplikasi di `http://localhost:8000`.

## Teknologi yang Digunakan

- **Backend**: Laravel / CodeIgniter (sesuaikan dengan framework yang Anda gunakan)
- **Frontend**: HTML, CSS, JavaScript (Vue.js/React.js jika digunakan)
- **Database**: MySQL / PostgreSQL

## Struktur Proyek

```bash
.
├── app/                   # File backend aplikasi
├── public/                # Folder publik untuk frontend
├── resources/             # View dan assets (CSS, JS)
├── routes/                # Definisi rute aplikasi
├── .env.example           # Contoh konfigurasi environment
├── composer.json          # File composer untuk PHP dependencies
└── README.md              # Dokumentasi proyek ini
