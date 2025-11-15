<?php
include '../auth.php';
include '../koneksi.php';
include $_SERVER['DOCUMENT_ROOT'] . '/latihan-php/procedural/nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mata Pelajaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="submit"] {
            margin-right: 5px
        }
    </style>
</head>
<body>
    <h2>Form Input Mata Pelajaran</h2>
    <form action="simpan_mapel.php" method="post">
        Nama : <input type="text" name="nama_mapel" required/><br/><br/>
        <input type="submit" value="Simpan"></input>
    </form>
    <br>
    <a href="../siswa/index.php">(Form Input Siswa)</a>
    <br>
    <h3>Data Mata Pelajaran :</h3>
    <?php 
    if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
        echo "<p style='color: green;'>Data berhasil ditambahkan</p>";
    }
    include "tampil_mapel.php"
    ?>

</body>
</html>