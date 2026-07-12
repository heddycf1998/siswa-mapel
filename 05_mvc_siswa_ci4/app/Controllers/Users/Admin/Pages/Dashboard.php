<?php

namespace App\Controllers\Users\Admin\Pages;

use App\Controllers\Users\Admin\AdminController;
use App\Models\MapelModel;
use App\Models\SiswaModel;

class Dashboard extends AdminController
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
        return $this->render('users/admin/dashboard', [
            'title' => 'Dashboard Admin',
            'totalSiswa' => $this->siswaModel->countAllResults(),
            'totalMapel' => $this->mapelModel->countAllResults(),
        ]);
    }
}