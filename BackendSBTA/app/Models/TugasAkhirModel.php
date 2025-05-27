<?php
namespace App\Models;

use CodeIgniter\Model;

class TugasAkhirModel extends Model {
    protected $table = 'tugas_akhir';
    protected $primaryKey = 'id_ta';
    protected $returnType = 'object';
    protected $allowedFields = ['judul', 'file_ta', 'id_mahasiswa', 'status', 'file_revisi', 'tanggal_revisi'];
}
?>