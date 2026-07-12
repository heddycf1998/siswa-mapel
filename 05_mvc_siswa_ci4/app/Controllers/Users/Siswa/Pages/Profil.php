<?php

namespace App\Controllers\Users\Siswa\Pages;

use App\Controllers\Users\Siswa\SiswaController;
use App\Models\SiswaModel;

class Profil extends SiswaController
{
    protected SiswaModel $siswaModel;

    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $siswaData = $this->siswaModel->find($this->id_siswa);

        return $this->render('users/siswa/profil/index', [
            'title' => 'Profil Siswa',
            'siswa' => $siswaData,
        ]);
    }

    public function edit() 
    {
        $siswa = $this->siswaModel->find($this->id_siswa);

        if (!$siswa) {
            return redirect()->to('/siswa/dashboard')->with('error', 'Data Profil tidak ditemukan');
        }

        return $this->render('users/siswa/profil/edit', [
            'title' => 'Edit Profil Saya',
            'siswa' => $siswa
        ]);
    }

    public function update() 
    {
        $rules = [
            'nama' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama lengkap wajib diisi',
                    'min_length' => 'Nama lengkap minimal 3 karakter'
                ],
            ],
            'umur' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Umur wajib diisi',
                    'numeric'  => 'Umur harus berupa angka',
                    'greater_than' => 'Umur tidak boleh minus atau 0'
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat rumah wajib diisi'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $namaSiswa = trim($this->request->getPost('nama'));
        $umurSiswa = trim($this->request->getPost('umur'));
        $alamatSiswa = trim($this->request->getPost('alamat'));

        $this->siswaModel->update($this->id_siswa, [
            'nama' => $namaSiswa,
            'umur' => $umurSiswa,
            'alamat' => $alamatSiswa
        ]);

        return redirect()->to('/siswa/profil')->with('success', 'Profil <strong>' . esc($namaSiswa) . '</strong> berhasil diperbarui');
    }
}
