<?php

namespace App\Controllers\Users\Siswa\Pages;

use App\Controllers\Users\Siswa\SiswaController;
use App\Models\UserModel;

class ChangePassword extends SiswaController
{
    protected UserModel $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $user = $this->userModel->where('id_siswa', $this->id_siswa)->first();

        return $this->render('users/siswa/changePassword', [
            'title' => 'Ubah Password',
            'user' => $user
        ]);
    }

    public function changePassword()
    {
        $rules = [
            'password_lama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password lama wajib diisi'
                ],
            ],
            'password_baru' => [
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required'   => 'Password baru wajib diisi',
                    'min_length' => 'Password baru minimal 6 karakter'
                ],
            ],
            'password_konfirmasi' => [
                'rules'  => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi',
                    'matches'  => 'Konfirmasi password tidak sesuai dengan password baru'
                ],
            ],
        ];

       $isValid = $this->validate($rules);

        $password_lama = $this->request->getPost('password_lama');
        $password_baru = $this->request->getPost('password_baru');
        $user = $this->userModel->where('id_siswa', $this->id_siswa)->first();

        // Verify the old password
        if (!$user || !password_verify($password_lama, $user['password'])) {
            $validation = \Config\Services::validation();
            $validation->setError('password_lama', 'Password lama tidak sesuai');

            $isValid = false;
        }

        if (!$isValid) {
            return redirect()->back()->withInput();
        }

        // Update the password
        $this->userModel->update($user['id'], [
            'password' => password_hash($password_baru, PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
