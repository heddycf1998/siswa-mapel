<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true,
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    // public function register()
    // {
    //     return view('auth/register');
    // }

    // public function registerProcess()
    // {
    //     $username = $this->request->getPost('username');
    //     $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    //     $role = 'siswa'; // default role

    //     // var_dump($username);
    //     // die;

    //     $this->userModel->insert([
    //         'username' => $username,
    //         'password' => $password,
    //         'role' => $role,
    //         'id_siswa' => null
    //     ]);

    //     return redirect()->to('/login')->with('success', 'Registrasi berhasil, silahkan login');
    // }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }

    // versi lama
    // public function changePassword()
    // {
    //     $userId = session()->get('user_id');
    //     $user = $this->userModel->find($userId);

    //     // Pastikan user login dulu
    //     if (!$userId || !$user) {
    //         return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
    //     }

    //     if ($this->request->getMethod() === 'post') {
    //         $oldPass = $this->request->getPost('old_password');
    //         $newPass = $this->request->getPost('new_password');
    //         $confirmPass = $this->request->getPost('confirm_password');

    //         // Cek Password Lama
    //         if (!password_verify($oldPass, $user['password'])) {
    //             return redirect()->to('/change-password')->with('error', 'Password lama salah');
    //         }

    //         // Cek konfirmasi
    //         if ($newPass !== $confirmPass) {
    //             return redirect()->to('/change-password')->with('error', 'Password baru dan konfirmasi tidak sama');
    //         }

    //         $hash = password_hash($newPass, PASSWORD_DEFAULT);
    //         $this->userModel->update($userId, ['password' => $hash]);

    //         return redirect()->to('/dashboard')->with('success', 'Password berhasil diubah');
    //     }
    //     // Tampilkan form
    //     return view('auth/change_password');
    // }



    // Tampilkan form ubah password
    public function showChangePasswordForm()
    {
        // Pastikan user login
        if (!session()->has('user_id')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        return view('auth/change_password'); // view form
    }

    // Proses update password
    public function updatePassword()
    {
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$userId || !$user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $oldPass = $this->request->getPost('old_password');
        $newPass = $this->request->getPost('new_password');
        $confirmPass = $this->request->getPost('confirm_password');

        // Cek Password Lama
        if (!password_verify($oldPass, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama salah');
        }

        // Cek konfirmasi password
        if ($newPass !== $confirmPass) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi tidak sama');
        }

        // Cek Panjang Karakter Password
        if (strlen($newPass) < 6) {
            return redirect()->back()->with('error', 'Password baru kurang dari 6 karakter');
        }

        // Update password
        $hash = password_hash($newPass, PASSWORD_DEFAULT);
        $this->userModel->update($userId, ['password' => $hash]);

        return redirect()->to('/dashboard')->with('success', 'Password berhasil diubah');
    }
}
