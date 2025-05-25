<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model {
    protected $table = 'notifikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['penerima_npm', 'penerima_nidn', 'judul', 'pesan', 'status_dibaca', 'waktu_dibuat'];
    protected $useTimestamps = false;
}
