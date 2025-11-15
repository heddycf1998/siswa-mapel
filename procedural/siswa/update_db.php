<?php
include '../auth.php';
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$mapel = isset($_POST['mapel']) ? $_POST['mapel'] : [];

$koneksi->query("UPDATE siswa SET nama = '$nama', umur = '$umur', alamat = '$alamat' WHERE id = '$id'");

$koneksi->query("DELETE FROM siswa_mapel WHERE id_siswa = '$id'");

foreach($mapel as $id_mapel) {
    $koneksi->query("INSERT INTO siswa_mapel (id_siswa, id_mapel) VALUES ('$id', '$id_mapel')");
}

header("Location: index.php?pesan=update");
?>