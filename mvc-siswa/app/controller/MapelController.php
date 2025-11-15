<?php
require_once BASE_PATH . '/app/model/Mapel.php';

$mapel = new Mapel();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'simpan') {
    $nama = $_POST['nama'];

    if($mapel->simpan($nama)) {
        header("Location: ". BASE_URL . "/index.php?menu=mapel&pesan=sukses");
    } else {
        echo "Gagal simpan data mapel";
    }
    exit();
}

if ($_POST['aksi'] === 'hapus') {
    $id = $_POST['id'];

    if($mapel->hapus($id)) {
        header("Location: ". BASE_URL . "/index.php?menu=mapel&pesan=hapus");
    } else {
        echo "Gagal hapus data mapel";
    }
    exit();
}

if ($_POST['aksi'] === 'edit') {
    $id = $_POST['id'];
    $data = $mapel->ambil($id);
    include BASE_PATH . '/app/view/mapel/form.php';
    exit();
}

if ($_POST['aksi'] === 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    if($mapel->update($nama, $id)) {
        header("Location: " . BASE_URL . "/index.php?menu=mapel&pesan=update");
    } else {
        echo "Gagal update data mapel";
    }
    exit();
}

?>