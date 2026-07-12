<?php

namespace App\Controllers\Users\Guru\Pages;

use App\Controllers\Users\Guru\GuruController;
use App\Models\MapelModel;
use App\Models\SiswaModel;

class Dashboard extends GuruController
{
    protected SiswaModel $siswaModel;
    protected MapelModel $mapelModel;

    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
        $this->mapelModel = new MapelModel();
    }

    public function index()
    {
        return $this->render('users/guru/dashboard', [
            'title' => 'Dashboard Guru',
            'totalSiswa' => $this->siswaModel->countAllResults(),
            'totalMapel' => $this->mapelModel->countAllResults(),
        ]);
    }
}
