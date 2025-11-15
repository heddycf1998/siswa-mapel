<?php
require_once BASE_PATH . '/app/model/Mapel.php';

class MapelController {
    private $mapel;

    public function __construct() {
        $this->mapel = new Mapel();
    }

    public function simpan() {
        $nama = $_POST['nama'];

        $error = $this->validasi($nama);
        
        if (!empty($error)) {
            $param = http_build_query([
                'menu' => 'mapel',
                'aksi' => 'form',
                'error' => implode('|', $error),
                'nama' => $nama
            ]);
            header("Location: " . BASE_URL . "/mapel/form?$param");
            exit();
        }

        if ($this->mapel->simpan($nama)) {
            header("Location: " . BASE_URL . "/mapel/list?pesan=sukses");
            exit();
        } else {
            echo "Gagal simpan data mapel";
        }
        exit();
    }

    public function update() {
        $id = $_POST['id'] ?? '';
        $nama = $_POST['nama'] ?? '';

        $error = $this->validasi($nama);

        if (!empty($error)) {
            $param = http_build_query([
                'menu' => 'mapel',
                'aksi' => 'form',
                'id' => $id,
                'error' => implode("|", $error),
                'nama' => $nama
            ]);
            header("Location: " . BASE_URL . "/mapel/form?$param");
            exit();
        }

        if ($this->mapel->update($id, $nama)) {
            header("Location: " . BASE_URL . "/mapel/list?pesan=update");
            exit();
        } else {
            echo "Gagal update data mapel";
        }
        exit();
    }

    public function hapus() {
        $id = $_POST['id'];
        if ($this->mapel->hapus($id)) {
            header("Location: " . BASE_URL . "/mapel/list");
            exit();
        } else {
            echo "Gagal hapus data mapel";
        }
        exit();
    }

    private function validasi($nama) {
        $error = [];

        if (empty($nama)) {
            $error[] = "Nama mapel tidak boleh kosong";
        }

        if (empty($nama) || strlen(trim($nama)) < 3)  {
            $error[] = "Nama minimal 3 huruf.";
        }

        return $error;
    }
}

?>