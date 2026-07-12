<?php
class SiswaMapel extends BaseModel{
    protected $table = "siswa_mapel";
    protected $primaryKey = "id";

    // Simpan relasi siswa dengan mapel
    public function create($id_siswa, $id_mapel) {
        $sql = "INSERT INTO {$this->table} (id_siswa, id_mapel) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $id_siswa, $id_mapel);
        return $stmt->execute();
    }

    // Hapus semua mapel berdasarkan id siswa
    public function deleteBySiswa($id_siswa) {
        $sql = "DELETE FROM {$this->table} WHERE id_siswa = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_siswa);
        return $stmt->execute();
    }

    // Ambil semua id_mapel yang dimiliki siswa
    public function getMapelIdBySiswa ($id_siswa) {
        $sql = "SELECT id_mapel FROM {$this->table} WHERE id_siswa = ?";
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

    // Ambil nama mapel yang dimiliki siswa
    public function getNamaMapelBySiswa($id_siswa) {
        $sql = "SELECT mapel.nama 
                FROM {$this->table} 
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