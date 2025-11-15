<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password', 'role', 'id_siswa'];

    protected $returnType = 'array';

    public function getTotalUsers()
    {
        return $this->countAllResults();
    }

    public function getTotalByRole($role)
    {
        return $this->where('role', $role)->countAllResults();
    }
}
