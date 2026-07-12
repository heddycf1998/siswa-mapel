<?php

namespace App\Controllers\Users\Siswa\Pages;

use App\Controllers\Users\Siswa\SiswaController;
use App\Models\SiswaMapelModel;

class Mapel extends SiswaController
{
    protected SiswaMapelModel $siswaMapelModel;

    public function __construct()
    {
        parent::__construct();
        $this->siswaMapelModel = new SiswaMapelModel();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        $query = $this->siswaMapelModel
            ->select('siswa_mapel.id, siswa_mapel.id_siswa, siswa_mapel.id_mapel, mapel.nama as nama_mapel') // mapel.nama di-alias jadi nama_mapel biar rapi
            ->join('mapel', 'mapel.id_mapel = siswa_mapel.id_mapel')
            ->where('siswa_mapel.id_siswa', $this->id_siswa);

        if ($keyword) {
            $query->like('mapel.nama', $keyword);
        }

        return $this->render('users/siswa/mapel/index', [
            'title' => 'Data Mata Pelajaran',
            'mapel' => $query->orderBy('siswa_mapel.id', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => $this->request->getGet('page') ?? 1,
            'keyword' => $keyword,
        ]);
    }
}
