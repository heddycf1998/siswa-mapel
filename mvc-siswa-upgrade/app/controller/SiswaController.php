<?php
require_once BASE_PATH . '/app/model/Siswa.php';
require_once BASE_PATH . '/app/model/SiswaMapel.php';

class SiswaController {
    private $siswa;
    private $siswaMapel;

    public function __construct() {
        $this->siswa = new Siswa();
        $this->siswaMapel = new SiswaMapel();
    }

    public function simpan() {
        $nama = $_POST['nama'] ?? '';
        $umur = $_POST['umur'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $mapel = $_POST['mapel'] ?? [];

        $error = $this->validasi($nama, $umur, $alamat);

        if (!empty($error)) {
            $param = http_build_query([
                'menu' => 'siswa',
                'aksi' => 'form',
                'error' => implode('|', $error),
                'nama' => $nama,
                'umur' => $umur,
                'alamat' => $alamat,
                'mapel' => $mapel,
            ]);
            header("Location: ". BASE_URL ."/siswa/form?$param");
            exit();
        }
        
        if ($this->siswa->simpan($nama, $umur, $alamat)) {
            $id_siswa = $this->siswa->getLastInsertId();
            foreach ($mapel as $id_mapel) {
                $this->siswaMapel->simpan($id_siswa, $id_mapel);
            }
            header("Location: " . BASE_URL . "/siswa/list?pesan=sukses");
            exit();
        } else {
            echo "Gagal simpan data";
        }
        exit();
    }
    // Next for 26/08/2025 : v
    public function update() {
        $id = $_POST['id'] ?? '';
        $nama = $_POST['nama'] ?? '';
        $umur = $_POST['umur'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $mapel = $_POST['mapel'] ?? [];

        $error = $this->validasi($nama, $umur, $alamat);

        if (!empty($error)) {
            $param = http_build_query([
                'menu' => 'siswa',
                'aksi' => 'form',
                'id' => $id,
                'error' => implode('|', $error),
                'nama' => $nama,
                'umur' => $umur,
                'alamat' => $alamat,
                'mapel' => $mapel
            ]);
            header("Location: " . BASE_URL ."/siswa/form?$param");
            exit();
        }

        if ($this->siswa->update($nama, $umur, $alamat, $id)) {
            $this->siswaMapel->hapusBySiswa($id);
            foreach($mapel as $id_mapel) {
                $this->siswaMapel->simpan($id, $id_mapel);
            }
            header("Location: " . BASE_URL . "/siswa/list?pesan=update");
        } else {
            echo "Gagal update data";
        }
        exit();
    }
    // Next for 26/08/2025 : v
    public function hapus() {
        $id = $_POST['id'] ?? null;
        if ($this->siswa->hapus($id)) {
            header("Location: " . BASE_URL . "/siswa/list?pesan=hapus");
        } else {
            echo "Gagal hapus data";
        }
        exit();
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
}

?>