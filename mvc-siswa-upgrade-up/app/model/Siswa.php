<?php
class Siswa extends BaseModel {

    protected $table = "siswa";
    protected $primaryKey = "id";

    // Ambil semua siswa dengan limit & offset
    public function getAll($limit = 10, $offset = 0) {
        $sql = "SELECT * FROM {$this->table} LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result(); // langsung array
    }

    // Hitung semua data siswa
    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    // Simpan siswa baru
    public function create($nama, $umur, $alamat) {
        $sql = "INSERT INTO {$this->table} (nama, umur, alamat) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sis', $nama, $umur, $alamat);
        return $stmt->execute();
    }

    // Hapus siswa by id
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Ambil satu siswa by id
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    // Method Find :
    // [
    //  "id" => 2,
    //  "nama" => "Budi",
    //  "umur" => "27",
    //  "alamat" => "Bandung"
    // ]

    
    // Update siswa by id
    public function update($nama, $umur, $alamat, $id) {
        $sql = "UPDATE {$this->table} SET nama = ?, umur = ?, alamat = ? WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sisi', $nama, $umur, $alamat, $id);
        return $stmt->execute();
    }

    // Ambil id terakhir setelah insert
    public function getLastInsertId() {
        return $this->conn->insert_id;
    }
    // biasanya dipakai kalo ada relasi (tabel relasi)
    // insert siswa -> dapet id_siswa terakhir
    // insert ke tabel siswa_mapel pake id_siswa itu

    // Cari siswa berdasarkan keyword (nama, umur, alamat, atau mapel)
    public function search($keyword, $limit, $offset) {
        $sql = "SELECT DISTINCT s.* 
                FROM {$this->table} s
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

    // Hitung hasil pencarian
    public function countSearch($keyword) {
        $sql = "SELECT COUNT(DISTINCT s.id) as total 
                FROM {$this->table} s
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