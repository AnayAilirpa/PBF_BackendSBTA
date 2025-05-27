# SBTA-Backend

Sistem Bimbingan Tugas Akhir (TA) - Backend with CodeIgniter 4

CodeIgniter 4 adalah framework PHP open-source yang dirancang untuk membangun aplikasi web dengan cepat, efisien, dan modern.

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
5. **(Opsional) Gunakan Postman Collection yang sudah disiapkan**
   - 📥 **Klik link berikut untuk mengimpor collection ke Postman:**
   - 👉 **[BackEndSBTA API Collection - Postman](https://app.getpostman.com/join-team?invite_code=08d5f171b92ee6b02d29696bb2270509a5c3e0d4d110b2c9b9afe05b0463897c&target_code=a9d1f96f57cb1c248814055f7e505d83)**
   - ⚠️ **PERHATIAN:** Silakan hubungi saya terlebih dahulu untuk mendapatkan akses atau konfirmasi sebelum mencoba mengakses koleksinya. (bukan akun premium)
  
## 📄 Dokumentasi Tambahan

1. **Postman Collection (Endpoint API)**

   Saya juga sudah menyiapkan dan mengupload file Postman Collection agar memudahkan testing API secara offline atau jika link undangan Postman bermasalah.

   - 📥 Folder Collection: `BackEndSBTA-PostmanCollection` 
   - 📍 Cara impor manual di Postman:
      1. Buka Postman
      2. Klik "Import"
      3. Pilih file PostmanCollection.json
      4. Drag and drop
   
2. **Backup Database (MySQL)**

   Untuk memudahkan setup lokal dan menjaga konsistensi data, saya juga sudah mengupload file backup SQL database.

   - 📦 Folder Database: `DatabaseSBTA-backup`
   - 🧰 Cara restore di phpMyAdmin:
      1. Buka http://localhost/phpmyadmin
      2. Buat database baru: bimbingan
      3. Masuk ke database tersebut → Klik "Import"
      4. Pilih file database
      5. Klik "Go"

---
💡 Pastikan database sudah dikonfigurasi dengan benar dan migrasi telah dijalankan. 🚀
