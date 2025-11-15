<?php
require_once BASE_PATH . '/app/model/Mapel.php';
require_once BASE_PATH . '/app/model/Siswa.php';
require_once BASE_PATH . '/app/model/SiswaMapel.php';

class SiswaController {
    private $siswa;
    private $siswaMapel;

    public function __construct() {
        $this->siswa = new Siswa();
        $this->siswaMapel = new SiswaMapel();
    }

    // Tampilkan daftar siswa
    public function index() {
        $this->list();
    }

    public function list() {
        $jumlahDataPerHalaman = 5;
        $halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($halamanAktif - 1) * $jumlahDataPerHalaman;

        if (!empty($_GET['cari'])) {
            $keyword = $_GET['cari'];
            $data = $this->siswa->search($keyword, $jumlahDataPerHalaman, $offset);
            $jumlahData = $this->siswa->countSearch($keyword);
        } else {
            $data = $this->siswa->getAll($jumlahDataPerHalaman, $offset);
            $jumlahData = $this->siswa->countAll();
        }

        $totalHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

        // Ambil pesan dari Flash (sukses / error)
        // $pesan = Flash::get("success") ?? Flash::get("error");

        // Biar bisa  dipakai di view
        $siswaMapel = $this->siswaMapel;

        $view_file = BASE_PATH . '/app/view/siswa/list.php';
        require BASE_PATH . '/app/view/layout/dashboard.php';
    }

    public function store() {
        $nama = $_POST['nama'] ?? '';
        $umur = $_POST['umur'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $mapel = $_POST['mapel'] ?? [];

        $error = $this->validasi($nama, $umur, $alamat);

        if (!empty($error)) {
            Flash::set("error", $error);
            Flash::set("old", [
                'nama' => $nama,
                'umur' => $umur,
                'alamat' => $alamat,
                'mapel' => $mapel
            ]);
            header("Location: ". BASE_URL ."/siswa/form");
            exit();
        }
        
        if ($this->siswa->create($nama, $umur, $alamat)) {
            $id_siswa = $this->siswa->getLastInsertId();
            foreach ($mapel as $id_mapel) {
                if (is_numeric($id_mapel)) {
                    $this->siswaMapel->create($id_siswa, $id_mapel);
                }  
            }
            Flash::set("success", "Data siswa {$nama} berhasil tersimpan !");
            header("Location: " . BASE_URL . "/siswa");
            exit();
        } else {
            Flash::set("error", "Gagal menyimpan data siswa");
            header("Location: " . BASE_URL . "/siswa");
        }
        exit();
    }

    public function update() {
        $id = $_POST['id'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $umur = $_POST['umur'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $mapel = $_POST['mapel'] ?? [];

        $error = $this->validasi($nama, $umur, $alamat);

        if (!empty($error)) {
            Flash::set("error", $error);
            Flash::set("old", [
                'id' => $id,
                'nama' => $nama,
                'umur' => $umur,
                'alamat' => $alamat,
                'mapel' => $mapel
            ]);
            header("Location: " . BASE_URL ."/siswa/form");
            exit();
        }

        if ($this->siswa->update($nama, $umur, $alamat, $id)) {
            $this->siswaMapel->deleteBySiswa($id);
            foreach($mapel as $id_mapel) {
                $this->siswaMapel->create($id, $id_mapel);
            }
            Flash::set("success", "Data siswa {$nama} berhasil terupdate !");
            header("Location: " . BASE_URL . "/siswa");
            exit();
        } else {
            Flash::set("error", "Data siswa gagal terupdate");
            header("Location: " . BASE_URL . "/siswa");
        }
        exit();
    }

    public function destroy() {
        $id = $_POST['id'] ?? null;
        if ($id) {
            $siswa = $this->siswa->find($id);
            if ($id && $this->siswa->delete($id)) {
                Flash::set("success", "Data siswa {$siswa['nama']} berhasil terhapus !");
                header("Location: " . BASE_URL . "/siswa");
                exit();
            } else {
                Flash::set("error", "Data siswa gagal terhapus");
                header("Location: " . BASE_URL . "/siswa");
                exit();
            }
        } else {
            Flash::set("error", "ID tidak ditemukan !");
            header("Location: " . BASE_URL . "/siswa");
            exit();
        }  
    }

    private function validasi($nama, $umur, $alamat) {
        $error = [];
        if (empty($nama) || strlen(trim($nama)) < 3)  {
            $error[] = "Nama minimal 3 huruf.";
        }

        if (!is_numeric($umur) || $umur < 5 || $umur > 100) {
            $error[] = "Umur harus 5 - 100.";
        }

        if (empty($alamat) || strlen(trim($alamat)) < 3 ) {
            $error[] = "Alamat minimal 3 huruf";
        }
        return $error;
    }

    public function form($id = null) {
        $mapel = new Mapel();

        $data = [];
        $mapel_terpilih = [];

        // Kalau ada ID di query string -> edit mode
        if ($id) {
            $data = $this->siswa->find($id);
            $mapel_terpilih = $this->siswaMapel->getMapelIdBySiswa($id);
        }

        // Kalau ada data lama dari Flash (misalnya form error)
        $old = Flash::get('old');
        if ($old) {
            $data = array_merge($data, $old);
            $mapel_terpilih = $old['mapel'] ?? $mapel_terpilih;
        }

        $result = $mapel->getAllWitoutLimit();
        $daftar_mapel = [];
        while ($row = $result->fetch_assoc()) {
            $daftar_mapel[] = $row;
        }
        
        $view_file =  BASE_PATH . '/app/view/siswa/form.php';
        include BASE_PATH . '/app/view/layout/dashboard.php';
        
    }

    // id nya bisa beda loh karena username buat login, kurang lebih gitu
    public function profil() {
        if ($_SESSION['user']['role'] === 'siswa') {
            $id = $_SESSION['user']['id_siswa'];
            $findSiswa = $this->siswa->find($id);
            $mapel_terpilih = $this->siswaMapel->getNamaMapelBySiswa($id);
            
            $view_file = BASE_PATH . '/app/view/siswa/detail.php';
            require BASE_PATH . '/app/view/layout/dashboard.php';
        } else {
            header("Location: " . BASE_URL . "/siswa");
            exit(); 
        } 
    }
}

?>