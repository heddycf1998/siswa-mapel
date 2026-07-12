<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\UserModel;

class SyncUser extends BaseController
{
    public function index()
    {
        $siswaModel = new SiswaModel();
        $userModel = new UserModel();

        // Ambil semua siswa yang belum punya akun
        $siswa = $siswaModel
            ->select('siswa.id, siswa.nis')
            ->join('user', 'user.id_siswa = siswa.id', 'left')
            ->where('user.id IS NULL')
            ->findAll();

        foreach ($siswa as $row) {
            $userModel->insert([
                'username' => $row['nis'],
                'password' => password_hash($row['nis'], PASSWORD_DEFAULT),
                'role' => 'siswa',
                'id_siswa' => $row['id'],
            ]);
            $created[] = $row; // simpan data yang baru dibuat
        }

        // Kalau tidak ada akun baru
        if (empty($created)) {
            return "<h3>Tidak ada siswa baru yang disinkronisasi. Semua sudah punya akun.</h3>";
        }

        // Tampilkan tabel siswa yang baru dibuatkan akun
        $html = "<h3>Daftar siswa yang baru dibuatkan akun:</h3>";
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>
                    <tr>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password (default)</th>
                    </tr>";

        foreach ($created as $c) {
            $html .= "<tr>
                        <td>{$c['id']}</td>
                        <td>{$c['nis']}</td>
                        <td>{$c['nama']}</td>
                        <td>{$c['nis']}</td>
                        <td>{$c['nis']}</td>
                      </tr>";
        }

        $html .= "</table>";

        return $html;
    }
}
