<?php

namespace App\Controllers\Users\Admin\Pages;

use App\Controllers\Users\Admin\AdminController;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Aktivasi extends AdminController
{
    protected SiswaModel $siswaModel;
    protected UserModel $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        $siswaTanpaAkun = $this->siswaModel->getSiswaTanpaAkun($keyword)->paginate($perPage);

        $totalGlobalTanpaAkun = $this->siswaModel->getSiswaTanpaAkun()->countAllResults();

        return $this->render('users/admin/aktivasi', [
            'title'                 => 'Aktivasi Akun',
            'siswaTanpaAkun'        => $siswaTanpaAkun,
            'totalGlobalTanpaAkun'  => $totalGlobalTanpaAkun,
            'pager'                 => $this->siswaModel->pager,
            'keyword'               => $keyword,
        ]);
    }

    public function aktivasi($id = null)
    {
        if ($id == null) {
            $siswaTanpaAkun = $this->siswaModel->getSiswaTanpaAkun()->findAll();

            $count = 0;
            foreach ($siswaTanpaAkun as $siswa) {
                $this->userModel->insert([
                    'username'  => $siswa['nis'],
                    'password'  => password_hash('123123', PASSWORD_DEFAULT),
                    'role'      => 'siswa',
                    'id_siswa'  => $siswa['id'],
                ]);
                $count++;
            }
            return redirect()->to('/admin/aktivasi')->with('success', "Berhasil mengaktivasi massal sebanyak {$count} akun siswa.");
        } else {
            $siswa = $this->siswaModel->find($id);

            if (!$siswa) {
                return redirect()->to('/admin/aktivasi')->with('errors', 'Data Siswa tidak ditemukan.');
            }

            $cek = $this->userModel->where('id_siswa', $id)->first();
            if ($cek) {
                return redirect()->to('/admin/aktivasi')->with('errors', 'Akun untuk siswa ini sudah ada.');
            }

            $this->userModel->insert([
                'username'  => $siswa['nis'],
                'password'  => password_hash('123123', PASSWORD_DEFAULT),
                'role'      => 'siswa',
                'id_siswa'  => $siswa['id'],
            ]);
            return redirect()->to('/admin/aktivasi')->with('success', 'Akun berhasil diaktivasi.');
        }
    }
}
