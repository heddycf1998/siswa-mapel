<?php

namespace App\Controllers\Users\Guru\Pages;

use App\Controllers\Users\Guru\GuruController;
use App\Models\SiswaModel;

class Siswa extends GuruController
{
    protected SiswaModel $siswaModel;

    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        if ($keyword) {
            $query = $this->siswaModel->searchSiswa($keyword);
        } else {
            $query = $this->siswaModel->getSiswaWithMapel();
        }

        return $this->render('users/guru/siswa/index', [
            'title' => 'Data Siswa',
            'siswa' => $query->orderBy('id', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => $this->request->getGet('page') ?? 1,
            'keyword' => $keyword,
        ]);
    }
}
