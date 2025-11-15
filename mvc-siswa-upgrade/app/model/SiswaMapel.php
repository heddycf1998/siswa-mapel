<?php
require_once __DIR__ . '/../../config/koneksi.php';

class SiswaMapel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getKoneksi();
    }

    public function simpan($id_siswa, $id_mapel) {
        $sql = "INSERT INTO siswa_mapel (id_siswa, id_mapel) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $id_siswa, $id_mapel);
        return $stmt->execute();
    }

    public function hapusBySiswa($id_siswa) {
        $sql = "DELETE FROM siswa_mapel WHERE id_siswa = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_siswa);
        return $stmt->execute();
    }

    public function getMapelBySiswa ($id_siswa) {
        $sql = "SELECT id_mapel FROM siswa_mapel WHERE id_siswa = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_siswa);
        $stmt->execute();

        $result = $stmt->get_result();

        $mapel_ids = [];
        while ($row = $result->fetch_assoc()) {
            $mapel_ids[] = $row['id_mapel'];
        }

        return $mapel_ids;
    }

    public function getNamaMapelBySiswa($id_siswa) {
        $sql = "SELECT mapel.nama 
                FROM siswa_mapel 
                JOIN mapel ON siswa_mapel.id_mapel = mapel.id_mapel
                WHERE siswa_mapel.id_siswa = ?
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id_siswa);
        $stmt->execute();
        $result = $stmt->get_result();

        $mapel = [];
        while($row = $result->fetch_assoc()) {
            $mapel[] = $row['nama'];
        }
        return $mapel;
    }
}
?>