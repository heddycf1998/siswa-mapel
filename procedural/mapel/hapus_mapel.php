<?php
include '../auth.php';
include '../koneksi.php';

$id_mapel = $_POST['id_mapel'];
$koneksi->query("DELETE FROM mapel WHERE id_mapel = '$id_mapel'");
header("Location: index_mapel.php")
?>