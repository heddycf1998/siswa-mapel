<?php

/**
 * Login Controller
 * 
 * Mengelola proses autentikasi pengguna :
 * - Menampilkan form login
 * - Validasi username & password
 * - Membuat session
 * - Redirect sesuai role (admin, guru, siswa)
 * 
 * @author Heddy
 * @version 1.0
 */

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    /**
     * Tampilkan Form Login
     */
    public function index()
    {
        return view('auth/login');
    }

    /**
     * Proses autentikasi pengguna
     */
    public function process()
    {
        // Ambil instance session
        $session = session();

        // Panggil model untuk akses tabel user
        $userModel = new UserModel();

        // Nilai dai Form Login (POST)
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek Username
        $user = $userModel->where('username', $username)->first();

        // Username tidak ada di Database
        if (!$user) {
            $session->setFlashdata('errors', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }

        // Cek Password
        if (!password_verify($password, $user['password'])) {
            $session->setFlashdata('errors', 'Password salah.');
            return redirect()->to('/login'); // kembali ke login
        }

        // Simpan Session (tanpa Password)
        $session->set([
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'id_siswa' => $user['id_siswa'],
            'logged_in' => true
        ]);

        // Redirect berdasarkan role
        switch ($user['role']) {
            case 'admin':
                return redirect()->to('/admin');
            case 'guru':
                return redirect()->to('/guru');
            case 'siswa':
                return redirect()->to('/siswa');
            default:
                return redirect()->to('/login');
        }
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
