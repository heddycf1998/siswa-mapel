<?php

namespace App\Controllers;

use App\Models\MapelModel;

class MapelController extends BaseController
{
    protected $mapelModel;

    public function __construct()
    {
        $this->mapelModel = new MapelModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $data['mapel'] = $this->mapelModel
                ->like('nama', $keyword)
                ->paginate(10, 'mapel');
        } else {
            $data['mapel'] = $this->mapelModel
                ->paginate(10, 'mapel');
        }

        $data['pager'] = $this->mapelModel->pager;

        return view('mapel/index', $data);
    }

    public function create()
    {
        return view('mapel/create');
    }

    public function store()
    {
        $this->mapelModel->save([
            'nama' => $this->request->getPost('nama')
        ]);
        return redirect()->to('/mapel')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['mapel'] = $this->mapelModel->find($id);

        return view('mapel/form_edit', $data);
    }

    public function update($id)
    {
        $this->mapelModel->update($id, [
            'nama' => $this->request->getPost('nama')
        ]);

        return redirect()->to('/mapel')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->mapelModel->delete($id);

        return redirect()->to('/mapel')->with('success', 'Data berhasil dihapus');
    }
}
