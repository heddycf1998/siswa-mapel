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
        return $this->select('siswa.*, GROUP_CONCAT(mapel.nama SEPARATOR ", ") as mapel_list')
            ->join('siswa_mapel', 'siswa_mapel.id_siswa = siswa.id', 'left')
            ->join('mapel', 'mapel.id_mapel = siswa_mapel.id_mapel', 'left')
            ->groupBy('siswa.id')
            ->distinct();
    }

    public function searchSiswa(string $keyword)
    {
        return $this->select('siswa.*, GROUP_CONCAT(mapel.nama SEPARATOR ", ") as mapel_list')
            ->join('siswa_mapel', 'siswa_mapel.id_siswa = siswa.id', 'left')
            ->join('mapel', 'mapel.id_mapel = siswa_mapel.id_mapel', 'left')
            ->groupBy('siswa.id')
            ->distinct()
            ->groupStart()
                ->like('siswa.nis', $keyword)
                ->orLike('siswa.nama', $keyword)
                // ->orLike('siswa.alamat', $keyword)
                ->orLike('mapel.nama', $keyword)
            ->groupEnd();
    }

    public function getSiswaTanpaAkun(?string $keyword = null) {
        $this->select('siswa.*')
            ->join('user', 'user.id_siswa = siswa.id', 'left')
            ->where('user.id_siswa', null);

        if(!empty($keyword)) {
            $this->groupStart()
                ->like('siswa.nis', $keyword)
                ->orLike('siswa.nama', $keyword)
                ->orLike('siswa.alamat', $keyword)
            ->groupEnd();
        }

        return $this;
    }
}
