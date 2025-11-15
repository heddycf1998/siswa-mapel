<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }
        return view('admin/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm_password');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Password dan konfirmasi tidak sama');
        }

        if (strlen($confirm) < 6) {
            return redirect()->back()->with('error', 'Password minimal 6 karakter');
        }

        $this->userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'admin',
            'id_siswa' => null,
        ]);

        return redirect()->to('/dashboard')->with('success', 'Admin baru berhasil ditambahkan');
    }
}
