<?php

namespace App\Controllers;

use App\Models\TugasAkhirModel;
use App\Controllers\BaseController;

class TugasAkhir extends BaseController
{
    public function index()
    {
        $ta_model = new TugasAkhirModel();
        $all_data_ta = $ta_model->findAll();
        return $this->response->setJSON($all_data_ta);
    }

    public function Tambah_data_ta()
    {
        return $this->response->setStatusCode(405, 'Method Not Allowed');  
    }

    public function Proses_tambah_ta()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tugas_akhir');
    
        $data = $this->request->getJSON(true);
    
        $wajib = ['judul', 'status', 'npm', 'tanggal_revisi'];
        foreach ($wajib as $field) {
            if (empty($data[$field])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['status' => 'error', 'message' => ucfirst($field) . ' tidak boleh kosong']);
            }
        }
    
        unset($data['id_ta']);
    
        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Data Tugas Akhir berhasil ditambahkan',
                    'id_ta' => $db->insertID() 
                ]);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data Tugas Akhir']);
        }
    }
    
    

    public function Edit_data_ta($id_ta = false)
    {
        $ta_model = new TugasAkhirModel();
        $data_ta = $ta_model->find($id_ta);

        if ($data_ta) {
            return $this->response->setJSON($data_ta);
        } else {
            return $this->response->setStatusCode(404, 'Data TugasAkhir tidak ditemukan');
        }
    }

    public function Proses_edit_ta($id_ta)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tugas_akhir');
    
        $data = $this->request->getJSON(true);
    
        $wajib = ['judul', 'status', 'npm', 'tanggal_revisi'];
        foreach ($wajib as $field) {
            if (isset($data[$field]) && empty($data[$field])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['status' => 'error', 'message' => ucfirst($field) . ' tidak boleh kosong']);
            }
        }
    
        if (empty($data)) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Tidak ada data yang diperbarui']);
        }
    
        $cekTugasAkhir = $builder->where('id_ta', $id_ta)->countAllResults();
        if ($cekTugasAkhir == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data Tugas Akhir tidak ditemukan']);
        }
    
        unset($data['id_ta']);
    
        $builder->where('id_ta', $id_ta);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data Tugas Akhir berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data Tugas Akhir']);
        }
    }
    
    
    public function Hapus_data_ta($id_ta = false)
    {
        $ta_model = new TugasAkhirModel();
        if ($ta_model->delete($id_ta)) {
            return $this->response->setJSON(['message' => 'Data TugasAkhir berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data TugasAkhir tidak ditemukan');
        }
    }
}
