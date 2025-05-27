<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public function login()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
    
        $data = $this->request->getJSON(true);
    
        // Validasi input
        if (empty($data['username']) || empty($data['password'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Username dan Password wajib diisi']);
        }
    
        // Ambil data user berdasarkan username
        $user = $builder->where('username', $data['username'])->get()->getRowArray();
    
        // Cek apakah user ditemukan
        if (!$user) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Username tidak ditemukan']);
        }
    
        // Verifikasi password
        log_message('info', 'Password dari frontend: ' . $data['password']);
log_message('info', 'Password dari database: ' . $user['password']);
        if (!password_verify($data['password'], $user['password'])) {
    return $this->response->setStatusCode(400)
        ->setJSON(['status' => 'error', 'message' => 'Password salah']);
}

    
        // Simpan session atau token jika berhasil login
        $session = session();
        $session->set([
            'id_user'  => $user['id_user'],
            'username' => $user['username'],
            'role'     => $user['role'],
            'logged_in' => true
        ]);
    
        return $this->response->setStatusCode(200)
            ->setJSON([
                'status'  => 'success',
                'message' => 'Login berhasil',
                'user'    => [
                    'id_user'  => $user['id_user'],
                    'username' => $user['username'],
                    'role'     => $user['role']
                ]
            ]);
    }
    
}
