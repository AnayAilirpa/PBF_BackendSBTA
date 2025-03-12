<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class View extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM v_tugasakhir"); // Ganti 'nama_view' dengan nama view yang sesuai
        $data = $query->getResultArray(); // Ambil hasil dalam bentuk array asosiatif

        return $this->response->setJSON($data);
    }
}
