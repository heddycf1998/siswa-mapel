<?php
include '../auth.php';
include '../koneksi.php';

$nama_mapel = $_POST['nama_mapel'];

if (empty($nama_mapel)) {
    echo "Nama Mata Pelajaran Tidak Boleh Kosong !!! <a href='index_mapel.php'>Coba Lagi</a>";
    exit();
}

$koneksi->query("INSERT INTO mapel (nama) VALUES ('$nama_mapel')");
header('Location: index_mapel.php?pesan=sukses');
?>