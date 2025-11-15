<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
$cek = $query->num_rows;

if ($cek > 0) {
    $user = $query->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Password Salah. <a href='login.php'>Coba Lagi</a>";
    }
    
} else {
    echo "Gagal Login <a href='login.php'>Coba Lagi !</a>";
}

?>