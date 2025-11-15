<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\MapelModel;
use App\Models\SiswaMapelModel;
use App\Models\UserModel;

class SiswaController extends BaseController
{

    protected $siswaModel;
    protected $mapelModel;
    protected $siswaMapelModel;
    protected $userModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->mapelModel = new MapelModel();
        $this->siswaMapelModel = new SiswaMapelModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q'); // ambil nilai pencarian

        if ($keyword) {
            $data['siswa'] = $this->siswaModel
                ->searchSiswa($keyword)
                ->paginate(10, 'siswa');
        } else {
            $data['siswa'] = $this->siswaModel
                ->getSiswaWithMapel() // ambil semua
                ->paginate(10, 'siswa');
        }

        $data['pager'] = $this->siswaModel->pager;
        return view('siswa/index', $data);
    }

    public function create()
    {
        // if (!checkRole(['admin'])) {
        //     return redirect()->to('/access-denied');
        // }

        $data['mapel'] = $this->mapelModel->findAll(); // ambil semua mapel untuk checkbox
        return view('siswa/create', $data); // tampilkan form tambah siswa
    }

    public function store()
    {
        $siswaId = $this->siswaModel->insert([
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        $nis = $this->request->getPost('nis');
        $this->userModel->insert([
            'username' => $nis,
            'password' => password_hash($nis, PASSWORD_DEFAULT),
            'role' => 'siswa',
            'id_siswa' => $siswaId
        ]);

        $mapelIds = $this->request->getPost('mapel') ?? [];
        foreach ($mapelIds as $mapelId) {
            $this->siswaMapelModel->insert([
                'id_siswa' => $siswaId,
                'id_mapel' => $mapelId
            ]);
        }
        return redirect()->to('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        $data['mapel'] = $this->mapelModel->findAll();

        /** @var array<int, array{id_mapel:int}> $rows */
        $rows = $this->siswaMapelModel
            ->where('id_siswa', $id)
            ->asArray()
            ->findAll();

        /** @var int[] $mapelIds */
        $mapelIds = array_column($rows, 'id_mapel');

        /** @var int[] $data['siswaMapel] */
        $data['siswaMapel'] = $mapelIds;

        return view('siswa/form_edit', $data);
    }

    public function update($id)
    {
        $oldSiswa = $this->siswaModel->find($id);

        $nisInput = session()->get('role') === 'guru'
            ? $oldSiswa['nis']
            : $this->request->getPost('nis');

        $this->siswaModel->update($id, [
            'nis'     => $nisInput,
            'nama'    => $this->request->getPost('nama'),
            'umur'    => $this->request->getPost('umur'),
            'alamat'  => $this->request->getPost('alamat')
        ]);

        $newNis = $this->request->getPost('nis');
        if ($oldSiswa['nis'] !== $newNis) {
            $this->userModel
                ->where('id_siswa', $id)
                ->set(['username' => $newNis])
                ->update();
        }

        $this->siswaMapelModel->where('id_siswa', $id)->delete();

        $mapelIds = $this->request->getPost('mapel') ?? [];
        foreach ($mapelIds as $mapelId) {
            $this->siswaMapelModel->insert([
                'id_siswa' => $id,
                'id_mapel' => $mapelId
            ]);
        }

        return redirect()->to('/siswa')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->siswaMapelModel->where('id_siswa', $id)->delete();
        $this->siswaModel->delete($id);
        return redirect()->to('/siswa')->with('success', 'Data berhasil dihapus');
    }

    public function resetPassword($id)
    {
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Data siswa tidak ditemukan');
        }

        $newPassword = $siswa['nis'];
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->userModel
            ->where('id_siswa', $id)
            ->set(['password' => $hash])
            ->update();

        return redirect()->to('/siswa')->with('success', 'Password siswa ' . $siswa['nis'] . ' berhasil direset menjadi NIS');
    }
}
