<?php
include '../auth.php';
include '../koneksi.php';

$id_mapel = $_POST['id_mapel'];
$nama_mapel = $_POST['nama_mapel'];
$koneksi->query("UPDATE mapel set nama = '$nama_mapel' WHERE id_mapel = '$id_mapel'");
header("Location: index_mapel.php");
?>