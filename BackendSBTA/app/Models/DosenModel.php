<?php
namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model {
    protected $table = 'dosen_pembimbing';
    protected $primaryKey = 'nidn';
    protected $returnType = 'object';
    protected $allowedFields = ['nidn', 'nama', 'email', 'no_telp'];
}
?>