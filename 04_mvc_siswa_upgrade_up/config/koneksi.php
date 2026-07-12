<?php
class Database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_siswa";
    public $koneksi;

    public function __construct() {
        $this->koneksi = new mysqli($this->hostname,$this->username, $this->password, $this->database);

        if ($this->koneksi->connect_error) {
            die("Koneksi Gagal : ". $this->koneksi->connect_error);
        }
    }

    public function getKoneksi() {
        return $this->koneksi;
    }
}
?>