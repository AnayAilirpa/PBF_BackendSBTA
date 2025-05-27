<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $user_model = new UserModel();
        $all_data_user = $user_model->findAll();
        return $this->response->setJSON($all_data_user);
    }

    public function Tambah_data_user()
    {
        return $this->response->setStatusCode(405, 'Method Not Allowed');  
    }

    public function Proses_tambah_user()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
    
        $data = $this->request->getJSON(true);
    
        $wajib = ['username', 'password', 'role'];
        foreach ($wajib as $field) {
            if (empty($data[$field])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['status' => 'error', 'message' => ucfirst($field) . ' tidak boleh kosong']);
            }
        }
    
        unset($data['id_user']);
    if (!empty($data['password'])) {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
}

        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON([
                    'status' => 'success',
                    'message' => 'Data User berhasil ditambahkan',
                    'id_user' => $db->insertID() 
                ]);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data User']);
        }
    }
    
    

    public function Edit_data_user($id_user = false)
    {
        $user_model = new UserModel();
        $data_user = $user_model->find($id_user);

        if ($data_user) {
            return $this->response->setJSON($data_user);
        } else {
            return $this->response->setStatusCode(404, 'Data User tidak ditemukan');
        }
    }

    public function Proses_edit_user($id_user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
    
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
    
        $cekUser = $builder->where('id_user', $id_user)->countAllResults();
        if ($cekUser == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data User tidak ditemukan']);
        }
    
        unset($data['id_user']);
    
        $builder->where('id_user', $id_user);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data User berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data User']);
        }
    }
    
    
    public function Hapus_data_user($id_user = false)
    {
        $user_model = new UserModel();
        if ($user_model->delete($id_user)) {
            return $this->response->setJSON(['message' => 'Data User berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data User tidak ditemukan');
        }
    }
}
