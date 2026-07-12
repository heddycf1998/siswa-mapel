<?php

namespace App\Controllers\Users\Admin\Pages;

use App\Controllers\Users\Admin\AdminController;
use App\Models\MapelModel;

class Mapel extends AdminController
{
    protected MapelModel $mapelModel;

    public function __construct()
    {
        parent::__construct();
        $this->mapelModel = new MapelModel();

    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 5;
        
        $query = $this->mapelModel;

        if ($keyword) {
            $query->like('nama', $keyword);
        }

        return $this->render('users/admin/mapel/index', [
            'title' => 'Data Mata Pelajaran',
            'mapel' => $query->orderby('id_mapel', 'DESC')->paginate($perPage),
            'pager' => $query->pager,
            'currentPage' => $this->request->getGet('page') ?? 1,
            'keyword' => $keyword,
        ]);
    }

    public function create()
    {
        return $this->render('users/admin/mapel/create', [
            'title'      => 'Tambah Mata Pelajaran',
        ]);
    }

    public function store()
    {
        $rules = [
            'nama' => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required'   => 'Nama mapel wajib diisi',
                    'min_length' => 'Nama mapel minimal 3 karakter'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $namaMapel = trim($this->request->getPost('nama'));

        $this->mapelModel->insert([
            'nama' => $namaMapel,
        ]);

        return redirect()->to('/admin/mapel')->with('success', 'Mata pelajaran <strong>' . esc($namaMapel) . '</strong> berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $mapel = $this->mapelModel->find($id);

        if (!$mapel) {
            return redirect()->to('/admin/mapel')->with('error', 'Data tidak ditemukan');
        }

        return $this->render('users/admin/mapel/edit',[
            'title' => 'Edit Mata Pelajaran' ,
            'mapel' => $mapel,
        ]);
    }

    public function update(int $id)
    {
        $rules = [
            'nama' => [
                'rules'     => 'required|min_length[3]',
                'errors'    => [
                    'required'   => 'Nama mapel wajib diisi',
                    'min_length' => 'Nama mapel minimal 3 karakter'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $namaMapel = trim($this->request->getPost('nama'));

        $this->mapelModel->update($id, [
            'nama' => $namaMapel,
        ]);

        return redirect()->to('/admin/mapel')->with('success', 'Mata pelajaran <strong>' . esc($namaMapel) . '</strong> berhasil diperbarui');
    }

    public function delete(int $id)
    {   
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/mapel');
        }

        $mapel = $this->mapelModel->find($id);

        if (!$mapel) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        
        $this->mapelModel->delete($id);

        return redirect()->back()->with('success','Mata Pelajaran <strong>' . esc($mapel['nama']) . '</strong> berhasil dihapus' );
    }
}
