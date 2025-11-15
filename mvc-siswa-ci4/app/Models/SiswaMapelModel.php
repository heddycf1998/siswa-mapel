<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaMapelModel extends Model {
    protected $table = 'siswa_mapel';
    
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_siswa', 'id_mapel'];

    protected $returnType = 'array';
}

?>