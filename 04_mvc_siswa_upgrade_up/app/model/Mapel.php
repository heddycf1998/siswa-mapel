<?php
class Mapel extends BaseModel{

    protected $table = "mapel";
    protected $primaryKey = "id_mapel";

    // Ambil semua mapel dengan limit & offset
    public function getAll($limit = 10, $offset = 0) {
        $sql = "SELECT * FROM {$this->table} LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        return $stmt->get_result(); // ini object mysqli_result
    }

    // Hitung semua data mapel
    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }

    // Simpan mapel baru
    public function create($nama) {
        $sql = "INSERT INTO {$this->table} (nama) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $nama);
        return $stmt->execute();
    }

    // Hapus mapel by id
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Ambil satu mapel by id
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }

    // Update mapel by id
    public function update($id, $nama) {
        $sql = "UPDATE {$this->table} SET nama  = ? WHERE {$this->primaryKey} = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $nama, $id);
        return $stmt->execute();
    }

    // Cari mapel by keyword
    public function search($keyword, $limit, $offset) {
        $sql = "SELECT * 
                FROM {$this->table}
                WHERE nama LIKE ?
                LIMIT ? OFFSET ?
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('ssi',$like, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Hitung jumlah data pencarian
    public function countSearch($keyword) {
        $sql = "SELECT COUNT(*) as total 
                FROM {$this->table}
                WHERE nama LIKE ? 
                ";
        $stmt = $this->conn->prepare($sql);
        $like = "%$keyword%";
        $stmt->bind_param('s', $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total'];
    }  

    public function getAllWitoutLimit() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->conn->query($sql);
    }
}

?>