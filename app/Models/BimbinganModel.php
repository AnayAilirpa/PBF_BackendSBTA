<?php
namespace App\Models;

use CodeIgniter\Model;

class BimbinganModel extends Model {
    protected $table = 'jadwal_bimbingan';
    protected $primaryKey = 'id_jadwal';
    protected $returnType = 'object';
    protected $allowedFields = ['id_ta', 'id_dosen', 'tanggal_bimbingan', 'catatan_bimbingan', 'status'];
}
?>