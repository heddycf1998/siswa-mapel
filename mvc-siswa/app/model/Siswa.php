<?php
require_once __DIR__ . '/../../config/koneksi.php';
class Siswa {

    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->getKoneksi();
    }

    public function tampil($limit = 10, $offset = 0) {
        $sql = "SELECT * FROM siswa LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM siswa";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function simpan($nama, $umur, $alamat) {
        $sql = "INSERT INTO siswa (nama, umur, alamat) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sis', $nama, $umur, $alamat);
        return $stmt->execute();
    }

    public function hapus($id) {
        $sql = "DELETE FROM siswa WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function ambil($id) {
        $sql = "SELECT * FROM siswa WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function update($nama, $umur, $alamat, $id) {
        $sql = "UPDATE siswa SET nama = ?, umur = ?, alamat = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sisi', $nama, $umur, $alamat, $id);
        return $stmt->execute();
    }

    public function getLastInsertId() {
        return $this->conn->insert_id;
    }

    public function cari($keyword, $limit, $offset) {
        $sql = "SELECT DISTINCT s.* 
                FROM siswa s
                LEFT JOIN siswa_mapel sm ON s.id = sm.id_siswa
                LEFT JOIN mapel m  ON sm.id_mapel = m.id_mapel
                WHERE s.nama LIKE ? 
                    OR s.umur LIKE ? 
                    OR s.alamat LIKE ?
                    OR m.nama LIKE ?
                LIMIT ? OFFSET ?
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('sssssi', $like, $like, $like, $like, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function countCariByMapel($keyword) {
        $sql = "SELECT COUNT(DISTINCT s.id) as total 
                FROM siswa s
                LEFT JOIN siswa_mapel sm ON s.id = sm.id_siswa
                LEFT JOIN mapel m ON sm.id_mapel = m.id_mapel
                WHERE s.nama LIKE ? 
                    OR s.umur LIKE ? 
                    OR s.alamat LIKE ?
                    OR m.nama LIKE ?
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('ssss', $like, $like, $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }    
}

?>