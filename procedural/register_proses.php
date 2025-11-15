<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$cek = $koneksi->query("SELECT * FROM user WHERE username = '$username'");

if($cek->num_rows > 0) {
    echo "Username sudah terpakai. <a href='register.php'>Coba Lagi</a>";
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$simpan = $koneksi->query("INSERT INTO user (username, password) VALUES ('$username', '$hash')");

if($simpan) {
    echo "Daftar Berhasil, Silahkan <a href='login.php'>Login</a>";
} else {
    echo "Silahkan Coba Lagi";
}

?>