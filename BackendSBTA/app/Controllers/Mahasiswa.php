<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $mahasiswa_model = new MahasiswaModel();
        $all_data_mahasiswa = $mahasiswa_model->findAll();
        return $this->response->setJSON($all_data_mahasiswa);
    }

    public function Tambah_data_mahasiswa()
    {
        // API tidak memerlukan tampilan, jadi kita bisa mengabaikan fungsi ini
        return $this->response->setStatusCode(405, 'Method Not Allowed'); // Mengembalikan status 405
    }

    public function Proses_tambah_mahasiswa()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('mahasiswa'); // Nama tabel di database
    
        // Ambil data dari request (format JSON)
        $data = $this->request->getJSON(true);
    
        // Pastikan semua kolom wajib diisi
        if (!$data || empty($data['npm']) || empty($data['nama']) || empty($data['angkatan']) || empty($data['email']) || empty($data['no_telp'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }
    
        // Cek apakah NPM sudah ada
        $cekNpm = $builder->where('npm', $data['npm'])->countAllResults();
        if ($cekNpm > 0) {
            return $this->response->setStatusCode(409)
                ->setJSON(['status' => 'error', 'message' => 'NPM sudah terdaftar']);
        }
    
        // Insert data mahasiswa ke database
        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON(['status' => 'success', 'message' => 'Data Mahasiswa berhasil ditambahkan']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data Mahasiswa']);
        }
    }
    

    public function Edit_data_mahasiswa($npm = false)
    {
        $mahasiswa_model = new MahasiswaModel();
        $data_mahasiswa = $mahasiswa_model->find($npm);

        if ($data_mahasiswa) {
            return $this->response->setJSON($data_mahasiswa);
        } else {
            return $this->response->setStatusCode(404, 'Data Mahasiswa tidak ditemukan');
        }
    }

    public function Proses_edit_mahasiswa($npm)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('mahasiswa'); // Nama tabel di database
    
        // Mengambil data dari request PUT (JSON)
        $data = $this->request->getJSON(true);
    
        // Pastikan data tidak kosong
        if (!$data || empty($data['npm']) || empty($data['nama']) || empty($data['angkatan']) || empty($data['email']) || empty($data['no_telp'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }
    
        // Cek apakah mahasiswa dengan NPM tersebut ada
        $cekMahasiswa = $builder->where('npm', $npm)->countAllResults();
        if ($cekMahasiswa == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data Mahasiswa tidak ditemukan']);
        }
    
        // Update data mahasiswa berdasarkan NPM
        $builder->where('npm', $npm);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data Mahasiswa berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data Mahasiswa']);
        }
    }
    

    public function Hapus_data_mahasiswa($npm = false)
    {
        $mahasiswa_model = new MahasiswaModel();
        if ($mahasiswa_model->delete($npm)) {
            return $this->response->setJSON(['message' => 'Data Mahasiswa berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data Mahasiswa tidak ditemukan');
        }
    }
}
