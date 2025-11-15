<?php
require_once __DIR__ . "/../../config/koneksi.php";

class Mapel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getKoneksi();
    }

    public function tampil($limit = 10, $offset = 0) {
        $sql = "SELECT * FROM mapel LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM mapel";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    public function simpan($nama) {
        $sql = "INSERT INTO mapel (nama) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $nama);
        return $stmt->execute();
    }

    public function hapus($id) {
        $sql = "DELETE FROM mapel WHERE id_mapel = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function ambil($id) {
        $sql = "SELECT * FROM mapel WHERE id_mapel = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $nama) {
        $sql = "UPDATE mapel SET nama  = ? WHERE id_mapel = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $nama, $id);
        return $stmt->execute();
    }

    public function cari($keyword, $limit, $offset) {
        $sql = "SELECT * 
                FROM mapel
                WHERE nama LIKE ?
                LIMIT ? OFFSET ?
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('ssi',$like, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

        public function countCariByMapel($keyword) {
        $sql = "SELECT COUNT(*) as total 
                FROM mapel
                WHERE nama LIKE ? 
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('s', $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }  
}

?>