<?php

namespace App\Controllers\Users\Guru\Pages;

use App\Controllers\Users\Guru\GuruController;
use App\Models\MapelModel;

class Mapel extends GuruController
{
    protected MapelModel $mapelModel;

    public function __construct()
    {
        parent::__construct();
        $this->mapelModel = new MapelModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        $query = $this->mapelModel;

        if ($keyword) {
            $query->like('nama', $keyword);
        }

        return $this->render('users/guru/mapel/index', [
            'title' => 'Data Mata Pelajaran',
            'mapel' => $query->orderBy('id_mapel', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => $this->request->getGet('page') ?? 1,
            'keyword' => $keyword,
        ]);
    }
}
