<?php
require_once __DIR__ . '/../../config/koneksi.php';

class BaseModel {
    protected $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getKoneksi();
    }
}
?>