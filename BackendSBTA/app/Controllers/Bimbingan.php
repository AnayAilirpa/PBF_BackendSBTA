<?php

namespace App\Controllers;

use App\Models\BimbinganModel;
use App\Controllers\BaseController;

class Bimbingan extends BaseController
{
    // Menampilkan seluruh data bimbingan
    public function index()
    {
        $bimbingan_model = new BimbinganModel();
        $all_data_bimbingan = $bimbingan_model->findAll();
        return $this->response->setJSON($all_data_bimbingan);
    }

    // Menolak akses form tambah (tidak digunakan di API)
    public function Tambah_data_bimbingan()
    {
        return $this->response->setStatusCode(405, 'Method Not Allowed');  
    }

    // Proses penambahan data bimbingan baru
    public function Proses_tambah_bimbingan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal_bimbingan');

        $data = $this->request->getJSON(true);

        // Validasi kolom wajib
        $wajib = ['id_ta', 'status', 'nidn', 'catatan_bimbingan', 'tanggal_bimbingan'];
        foreach ($wajib as $field) {
            if (empty($data[$field])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['status' => 'error', 'message' => ucfirst($field) . ' tidak boleh kosong']);
            }
        }

        unset($data['id_jadwal']);

        // Insert data ke database
        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Data Bimbingan berhasil ditambahkan',
                    'id_jadwal' => $db->insertID() 
                ]);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data Bimbingan']);
        }
    }

    // Ambil data bimbingan berdasarkan ID untuk diedit
    public function Edit_data_bimbingan($id_jadwal = false)
    {
        $bimbingan_model = new BimbinganModel();
        $data_bimbingan = $bimbingan_model->find($id_jadwal);

        if ($data_bimbingan) {
            return $this->response->setJSON($data_bimbingan);
        } else {
            return $this->response->setStatusCode(404, 'Data Bimbingan tidak ditemukan');
        }
    }

    // Proses edit data bimbingan berdasarkan ID
    public function Proses_edit_bimbingan($id_jadwal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jadwal_bimbingan');

        $data = $this->request->getJSON(true);

        // Validasi data wajib jika ada
        $wajib = ['id_ta', 'status', 'nidn', 'catatan_bimbingan', 'tanggal_bimbingan'];
        foreach ($wajib as $field) {
            if (isset($data[$field]) && empty($data[$field])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['status' => 'error', 'message' => ucfirst($field) . ' tidak boleh kosong']);
            }
        }

        // Cek jika tidak ada data dikirim
        if (empty($data)) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Tidak ada data yang diperbarui']);
        }

        // Pastikan data dengan id_jadwal ada
        $cekBimbingan = $builder->where('id_jadwal', $id_jadwal)->countAllResults();
        if ($cekBimbingan == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data Bimbingan tidak ditemukan']);
        }

        unset($data['id_jadwal']);

        // Update data
        $builder->where('id_jadwal', $id_jadwal);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data Bimbingan berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data Bimbingan']);
        }
    }

    // Hapus data bimbingan berdasarkan ID
    public function Hapus_data_bimbingan($id_jadwal = false)
    {
        $bimbingan_model = new BimbinganModel();
        if ($bimbingan_model->delete($id_jadwal)) {
            return $this->response->setJSON(['message' => 'Data Bimbingan berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data Bimbingan tidak ditemukan');
        }
    }
}
