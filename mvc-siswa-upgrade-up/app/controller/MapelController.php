<?php
require_once BASE_PATH . '/app/model/Mapel.php';

class MapelController {
    private $mapel;

    public function __construct() {
        $this->mapel = new Mapel();
    }

    public function index() {
        $this->list();
    }

    public function list() {
        $jumlahDataPerHalaman = 5;
        $halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

        if (!empty($_GET['cari'])) {
            $keyword = $_GET['cari'];
            $data = $this->mapel->search($keyword, $jumlahDataPerHalaman, $offset);
            $jumlahData = $this->mapel->countSearch($keyword);
        } else {
            $data = $this->mapel->getAll($jumlahDataPerHalaman, $offset);
            $jumlahData = $this->mapel->countAll();
        }

        $totalHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

        $view_file = BASE_PATH . '/app/view/mapel/list.php';
        include BASE_PATH . '/app/view/layout/dashboard.php';
    }

    public function store() {
        $nama = $_POST['nama'];

        $error = $this->validasi($nama);
        
        if (!empty($error)) {
            Flash::set("error", $error);
            Flash::set("old", [
                'nama' => $nama
            ]);
            header("Location: " . BASE_URL . "/mapel/form");
            exit();
        }

        if ($this->mapel->create($nama)) {
            Flash::set("success", "Data Mapel $nama berhasil tersimpan !");
            header("Location: " . BASE_URL . "/mapel");
            exit();
        } else {
            Flash::set("error", "Data Mapel gagal tersimpan !");
            header("Location: " . BASE_URL . "/mapel");
        }
        exit();
    }

    public function update() {
        $id = $_POST['id'] ?? '';
        $nama = $_POST['nama'] ?? '';

        $error = $this->validasi($nama);

        if (!empty($error)) {
            Flash::set("error", $error);
            Flash::set("old", [
                'id' => $id,
                'nama' => $nama
            ]);
            header("Location: " . BASE_URL . "/mapel/form");
            exit();
        }

        if ($this->mapel->update($id, $nama)) {
            Flash::set("success", "Data Mapel $nama berhasil terupdate !");
            header("Location: " . BASE_URL . "/mapel");
            exit();
        } else {
            Flash::set("error", "Data Mapel gagal terupdate");
            header("Location: " . BASE_URL . "/mapel");
        }
        exit();
    }

    public function destroy() {
        $id = $_POST['id'] ?? null;
        if ($id) {
            $mapel = $this->mapel->find($id);
            if ($id && $this->mapel->delete($id)) {
                Flash::set("success", "Data Mapel {$mapel['nama']} telah terhapus !");
                header("Location: " . BASE_URL . "/mapel");
                exit();
            } else {
                Flash::set("error", "ID Mapel gagal terhapus !");
                header("Location: " . BASE_URL . "/mapel");
                exit();
            }
        } else {
            Flash::set("error", "ID Mapel tidak ditemukan");
            header("Location: " . BASE_URL . "/mapel");
            exit();
        }
    }

    private function validasi($nama) {
        $error = [];

        if (empty($nama)) {
            $error[] = "Nama mapel tidak boleh kosong";
        } elseif (strlen(trim($nama)) < 3) {
            $error[] = "Nama minimal 3 huruf.";
        }

        return $error;
    }

    public function form($id = null) {
        $data = [];
        
        // kalo ada ID, berarti edit mode
        if ($id) {
            $data = $this->mapel->find($id);
        }

        // kalo ada data lama
        $old = Flash::get('old');
        if ($old) {
            $data = array_merge($data, $old);
        }

        $view_file = BASE_PATH . '/app/view/mapel/form.php';
        include BASE_PATH . '/app/view/layout/dashboard.php';
    }
}

?>