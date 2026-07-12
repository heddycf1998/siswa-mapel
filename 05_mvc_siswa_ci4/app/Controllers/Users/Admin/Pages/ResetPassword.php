<?php

namespace App\Controllers\Users\Admin\Pages;

use App\Controllers\Users\Admin\AdminController;
use App\Models\UserModel;

class ResetPassword extends AdminController
{
    protected UserModel $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        $query = $this->userModel;

        if (!empty($keyword)) {
            $this->userModel->groupStart()
                ->like('username', $keyword)
                ->orlike('role', $keyword)
                ->groupEnd();
        }


        return $this->render('users/admin/resetPassword', [
            'title' => 'Reset Password',
            'users' => $query->orderby('id', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => $this->request->getGet('page') ?? 1,
            'keyword' => $keyword,
        ]);
    }

    // ... ini batas akhir fungsi index() ...

    public function resetPassword()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return redirect()->to('/admin/reset-password')->with('error', 'User ID tidak ditemukan.');
        }

        $user = $this->userModel->find($id);
        $username = $user['username'] ?? 'Pengguna';

        $passwordDefault = password_hash('123123', PASSWORD_DEFAULT);

        $this->userModel->update($id, ['password' => $passwordDefault]);

        return redirect()->to('/admin/reset-password')->with('success', "Password untuk pengguna '$username' telah direset.");
    }
}
