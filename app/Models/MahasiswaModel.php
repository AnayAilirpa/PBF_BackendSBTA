<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model {
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    protected $returnType = 'object';
    protected $allowedFields = ['npm', 'nama', 'angkatan', 'email', 'no_telp'];
}
?>