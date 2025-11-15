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
    <title>Form Siswa</title>
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
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>Form Input Siswa</h2>
    <form action="simpan.php" method="post">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required/><br/><br/>
        <label for="umur">Umur : </label>
        <input type="number" name="umur" id="umur" required/><br/><br/>
        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" required/><br/>
        <h4>Pilih Mata Pelajaran <a href="../mapel/index_mapel.php">(Edit)</a> </h4>
        <?php 
        $koneksi = new mysqli("localhost", "root", "", "db_siswa");
        $result = $koneksi->query("SELECT * FROM mapel");
        while ($row = $result->fetch_assoc()) {
            echo "<label>
                    <input type='checkbox' name='mapel[]' value='{$row['id_mapel']}'> {$row['nama']} 
                </label>
                <br/>" ;
        }
        ?>
        <input type="submit" value="Simpan"></input>
    </form>

    <h3>Data Siswa :</h3>
    <?php 
    if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
        echo "<p style='color: green;'>Data berhasil ditambahkan</p>";
    }
    if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapus') {
        echo "<p style='color: red;'>Data berhasil dihapus</p>";
    }if (isset($_GET['pesan']) && $_GET['pesan'] == 'update') {
        echo "<p style='color: purple;'>Data berhasil diupate</p>";
    }
    include "tampil.php"
    ?>

</body>
</html>