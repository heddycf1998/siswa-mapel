<?php

namespace App\Controllers\Users\Admin\Pages;

use App\Controllers\Users\Admin\AdminController;
use App\Models\SiswaModel;
use App\Models\SiswaMapelModel;
use App\Models\MapelModel;

class Siswa extends AdminController
{
    protected SiswaModel $siswaModel;
    protected SiswaMapelModel $siswaMapelModel;
    protected MapelModel $mapelModel;
    public function __construct()
    {
        parent::__construct();
        $this->siswaModel = new SiswaModel();
        $this->siswaMapelModel = new SiswaMapelModel();
        $this->mapelModel = new MapelModel();
    }


    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;

        if ($keyword) {
            $query = $this->siswaModel->searchSiswa($keyword);
        } else {
            $query = $this->siswaModel->getSiswaWithMapel();
        }

        return $this->render('users/admin/siswa/index', [
            'title' => 'Data Siswa',
            'siswa' => $query->orderBy('id', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => (int) ($this->request->getGet('page') ?? 1),
            'keyword' => $keyword,
        ]);
    }

    public function create()
    {
        return $this->render('users/admin/siswa/create', [
            'title'      => 'Tambah Siswa',
            'mapel'      => $this->mapelModel->findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'nis' => [
                'rules'     => 'required|is_unique[siswa.nis]|numeric|min_length[4]',
                'errors'    => [
                    'required'   => 'NIS wajib diisi',
                    'is_unique'  => 'NIS sudah digunakan',
                    'numeric'    => 'NIS harus berupa angka',
                    'min_length' => 'NIS minimal 4 karakter'
                ],
            ],
            'nama' => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required'   => 'Nama siswa wajib diisi',
                    'min_length' => 'Nama siswa minimal 3 karakter'
                ],
            ],
            'umur' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'   => 'Umur wajib diisi',
                    'integer'    => 'Umur harus berupa angka'
                ],
            ],
            'alamat' => [
                'rules'     => 'required|min_length[5]',
                'errors'    => [
                    'required'   => 'Alamat wajib diisi',
                    'min_length' => 'Alamat minimal 5 karakter'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $namaSiswa = trim($this->request->getPost('nama'));

        $dataSiswa = [
            'nis' => trim($this->request->getPost('nis')),
            'nama' => $namaSiswa,
            'umur' => (int) $this->request->getPost('umur'),
            'alamat' => trim($this->request->getPost('alamat')),
        ];

        $this->siswaModel->insert($dataSiswa);
        $idSiswa = $this->siswaModel->getInsertID();
        $idMapel = $this->request->getPost('id_mapel');

        if (!empty($idMapel) && is_array($idMapel)) {
            foreach ($idMapel as $id) {
                $this->siswaMapelModel->insert([
                    'id_siswa' => $idSiswa,
                    'id_mapel' => (int) $id,
                ]);
            }
        }

        return redirect()->to('/admin/siswa')->with('success', 'Siswa bernama <strong>' . esc($namaSiswa) . '</strong> berhasil disimpan');
    }

    public function edit(int $id)
    {
        $siswa = $this->siswaModel->find($id);
        $mapel = $this->mapelModel->findAll();
        $selectedMapel = $this->siswaMapelModel->where('id_siswa', $id)->findColumn('id_mapel') ?? [];

        if (!$siswa) {
            return redirect()->to('/admin/siswa')->with('error', 'Data siswa tidak ditemukan');
        }

        return $this->render('users/admin/siswa/edit', [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'mapel' => $mapel,
            'selectedMapel' => $selectedMapel,
        ]);
    }

    public function update(int $id)
    {
        $rules = [
            'nis' => [
                'rules'     => "required|numeric|min_length[4]|greater_than[0]|is_unique[siswa.nis,id,{$id}]",
                'errors'    => [
                    'required'   => 'NIS wajib diisi',
                    'numeric'    => 'NIS harus berupa angka',
                    'min_length' => 'NIS minimal 4 karakter',
                    'greater_than' => 'NIS tidak boleh minus atau 0',
                    'is_unique'  => 'NIS sudah digunakan'
                ],
            ],
            'nama' => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required'   => 'Nama siswa wajib diisi',
                    'min_length' => 'Nama siswa minimal 3 karakter'
                ],
            ],
            'umur' => [
                'rules'     => 'required|integer|greater_than[0]',
                'errors'    => [
                    'required'   => 'Umur wajib diisi',
                    'integer'    => 'Umur harus berupa angka',
                    'greater_than' => 'Umur tidak boleh minus atau 0'
                ],
            ],
            'alamat' => [
                'rules'     => 'required|min_length[5]',
                'errors'    => [
                    'required'   => 'Alamat wajib diisi',
                    'min_length' => 'Alamat minimal 5 karakter'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $namaSiswa = trim($this->request->getPost('nama'));

        $dataSiswa = [
            'nis' => trim($this->request->getPost('nis')),
            'nama' => $namaSiswa,
            'umur' => (int) $this->request->getPost('umur'),
            'alamat' => trim($this->request->getPost('alamat')),
        ];

        $this->siswaModel->update($id, $dataSiswa);

        $this->siswaMapelModel->where('id_siswa', $id)->delete();

        $selectMapel = $this->request->getPost('id_mapel');

        if (!empty($selectMapel) && is_array($selectMapel)) {
            foreach ($selectMapel as $idMapel) {
                $this->siswaMapelModel->insert([
                    'id_siswa' => $id,
                    'id_mapel' => (int) $idMapel,
                ]);
            }
        }

        return redirect()->to('/admin/siswa')->with('success', 'Data Siswa <strong>' . esc($namaSiswa) . '</strong> berhasil diperbarui!');
    }

    public function delete(int $id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/siswa');
        }

        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to('/admin/siswa')->with('error', 'Data siswa tidak ditemukan');
        }

        $this->siswaMapelModel->where('id_siswa', $id)->delete();

        $this->siswaModel->delete($id);

        return redirect()->to('/admin/siswa')->with('success', 'Siswa bernama <strong>' . esc($siswa['nama']) . '</strong> berhasil dihapus!');
    }
}
