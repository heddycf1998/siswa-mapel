<?php
include '../auth.php';
include '../koneksi.php';

$id = $_POST['id'];
$koneksi->query("DELETE FROM siswa WHERE id = '$id' ");
header("Location: index.php?pesan=hapus");

?>