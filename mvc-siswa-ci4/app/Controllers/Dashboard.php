<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\MapelModel;
use App\Models\SiswaMapelModel;
use App\Models\UserModel;


class Dashboard extends BaseController
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $mapelModel = new MapelModel();
        $siswaMapelModel = new SiswaMapelModel();
        $userModel = new UserModel();

        $data = [
            'title' => $siswaModel->countAll(),
            'totalSiswa' => $siswaModel->countAll(),
            'totalMapel' => $mapelModel->countAll(),
            'totalRelasi' => $siswaMapelModel->countAll(),
            'totalUser' => $userModel->getTotalUsers(),
            'totalAdmin' => $userModel->getTotalByRole('admin'),
            'totalUserSiswa' => $userModel->getTotalByRole('siswa'),

        ];

        return view('dashboard', $data);

        // return view('dashboard');
    }
}
