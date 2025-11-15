<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id';

    protected $allowedFields = ['nis', 'nama', 'umur', 'alamat'];

    protected $returnType = 'array';

    public function getSiswaWithMapel()
    {
        return $this->select('siswa.*, GROUP_CONCAT(mapel.nama) as mapel_list')
            ->join('siswa_mapel', 'siswa_mapel.id_siswa = siswa.id', 'left')
            ->join('mapel', 'mapel.id_mapel = siswa_mapel.id_mapel', 'left')
            ->groupBy('siswa.id');
    }

    public function searchSiswa($keyword)
    {
        return $this->select('siswa.*, GROUP_CONCAT(mapel.nama) as mapel_list')
            ->join('siswa_mapel', 'siswa_mapel.id_siswa = siswa.id', 'left')
            ->join('mapel', 'mapel.id_mapel = siswa_mapel.id_mapel', 'left')
            ->groupBy('siswa.id')
            ->groupStart()
            ->like('siswa.nis', $keyword)
            ->orLike('siswa.nama', $keyword)
            ->orLike('siswa.alamat', $keyword)
            ->orLike('mapel.nama', $keyword)
            ->groupEnd();
    }
}
