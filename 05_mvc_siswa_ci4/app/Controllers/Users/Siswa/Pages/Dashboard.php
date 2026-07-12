<?php

namespace App\Controllers\Users\Siswa\Pages;

use App\Controllers\Users\Siswa\SiswaController;
use App\Models\SiswaModel;
use App\Models\MapelModel;
use App\Models\SiswaMapelModel;

class Dashboard extends SiswaController
{
    protected SiswaModel $siswaModel;
    protected MapelModel $mapelModel;
    protected SiswaMapelModel $siswaMapelModel;


    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
        $this->mapelModel = new MapelModel();
        $this->siswaMapelModel = new SiswaMapelModel();
    }

    public function index()
    {

    //     echo "<h1>--- HALAMAN DEBUGGING HEDDY ---</h1>";
    // echo "Isi session ID kamu adalah: <b>" . ($id_siswa ?? 'KOSONG / NULL') . "</b><br>";
    // echo "Isi semua memori session kamu: <pre>";
    // print_r(session()->get());
    // echo "</pre>";
    // die();

        return $this->render('users/siswa/dashboard', [
            'title' => 'Dashboard Siswa',
            'totalSiswaMapel' => $this->siswaMapelModel->where('id_siswa', $this->id_siswa)->countAllResults(),
        ]);
    }
}
