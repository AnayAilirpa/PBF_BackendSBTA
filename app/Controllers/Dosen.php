<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Controllers\BaseController;

class Dosen extends BaseController
{
    public function index()
    {
        $dosen_model = new DosenModel();
        $all_data_dosen = $dosen_model->findAll();
        return $this->response->setJSON($all_data_dosen);
    }

    public function Tambah_data_dosen()
    {
        return $this->response->setStatusCode(405, 'Method Not Allowed');  
    }

    public function Proses_tambah_dosen()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dosen_pembimbing');
    
        $data = $this->request->getJSON(true);
    
        if (!$data || empty($data['nidn']) || empty($data['nama']) || empty($data['email']) || empty($data['no_telp'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }
    
        $ceknidn = $builder->where('nidn', $data['nidn'])->countAllResults();
        if ($ceknidn > 0) {
            return $this->response->setStatusCode(409)
                ->setJSON(['status' => 'error', 'message' => 'nidn sudah terdaftar']);
        }
    
        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON(['status' => 'success', 'message' => 'Data Dosen berhasil ditambahkan']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data Dosen']);
        }
    }

    public function Edit_data_dosen($nidn = false)
    {
        $dosen_model = new DosenModel();
        $data_dosen = $dosen_model->find($nidn);

        if ($data_dosen) {
            return $this->response->setJSON($data_dosen);
        } else {
            return $this->response->setStatusCode(404, 'Data Dosen tidak ditemukan');
        }
    }

    public function Proses_edit_dosen($nidn)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('dosen_pembimbing'); 
    
        $data = $this->request->getJSON(true);
    
        if (!$data || empty($data['nidn']) || empty($data['nama']) || empty($data['email']) || empty($data['no_telp'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }
    
        $cekDosen = $builder->where('nidn', $nidn)->countAllResults();
        if ($cekDosen == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data Dosen tidak ditemukan']);
        }
    
        $builder->where('nidn', $nidn);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data Dosen berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data Dosen']);
        }
    }
    
    public function Hapus_data_dosen($nidn = false)
    {
        $dosen_model = new DosenModel();
        if ($dosen_model->delete($nidn)) {
            return $this->response->setJSON(['message' => 'Data Dosen berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data Dosen tidak ditemukan');
        }
    }
}
