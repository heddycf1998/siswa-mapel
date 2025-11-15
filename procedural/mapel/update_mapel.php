<?php
include '../auth.php';
include '../koneksi.php';
include $_SERVER['DOCUMENT_ROOT'] . '/latihan-php/procedural/nav.php';

$id_mapel = $_POST['id_mapel'];
$result = $koneksi->query("SELECT * FROM mapel WHERE id_mapel = '$id_mapel'");
$data = $result->fetch_assoc();
?>

<h2>Form Update Mata Pelajaran</h2>
<form action="update_db_mapel.php" method="post">
    <input type="hidden" name='id_mapel' value="<?= $data['id_mapel']?>">
    Nama Mata Pelajaran : <input type="text" name="nama_mapel" value="<?= $data['nama']?>"><br/><br/>
    <input type="submit" value="Update"></input>
</form>