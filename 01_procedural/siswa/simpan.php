<?php 
include '../auth.php';
include '../koneksi.php';

$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$mapel = isset($_POST['mapel'])? $_POST['mapel'] : [];

if (empty($nama) || empty($umur) || empty($alamat)) {
    echo "Nama, Umur, Alamat Tidak Boleh Kosong !!! <a href='index.php'>Coba Lagi</a>";
    exit();
}

$sql = "INSERT INTO siswa (nama, umur, alamat) VALUES ('$nama', '$umur', '$alamat')";
$koneksi->query($sql);

$id_siswa = $koneksi->insert_id;

foreach($mapel as $id_mapel) {
    $koneksi->query("INSERT INTO siswa_mapel (id_siswa, id_mapel) VALUES ('$id_siswa', '$id_mapel')");
}

header("Location: index.php?pesan=sukses");
?>