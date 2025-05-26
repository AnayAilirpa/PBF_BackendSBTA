# SBTA-Backend

Sistem Bimbingan Tugas Akhir (TA) - Backend with CodeIgniter 4

## 📌 Cara Clone Repository

```bash
git clone https://github.com/AnayAilirpa/PBF_BackendSBTA.git
cd SBTA-Backend
```

## 🛠️ Syarat Utama

1. Instalasi **[Composer](https://getcomposer.org/Composer-Setup.exe)** dan **[PHP](https://www.php.net/downloads.php)**
2. Download PHP (Sesuaikan dengan versi PHP anggota kelompok)
3. Simpan Composer ke direktori php.exe.
4. Restart Laptop atau PC

## 🔧 Instalasi dan Konfigurasi

1. **Install Dependencies**
   ```bash
   composer install
   ```
2. **Salin file .env.example menjadi .env**
   ```bash
   cp env .env
   ```
3. **Edit file `.env` dan atur konfigurasi database**
   ```env
   database.default.hostname = localhost
   database.default.database = bimbingan
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQL
   ```
4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Jalankan seeder (jika ada data default yang perlu diisi)**
   ```bash
   php spark db:seed NamaSeeder
   ```

## 🚀 Menjalankan Project

```bash
php spark serve
```
Secara default, server akan berjalan di `http://localhost:8080`.

## 📡 Menggunakan API di Postman

1. **Pastikan server berjalan** dengan perintah `php spark serve`
2. **Buka Postman**
3. **Buat request baru**
   - **Method:** `GET`, `POST`, `PUT`, `DELETE`
   - **URL:** `http://localhost:8080/nama-endpoint`
4. **Kirim request dan lihat response dari API**

---
💡 Pastikan database sudah dikonfigurasi dengan benar dan migrasi telah dijalankan. 🚀
