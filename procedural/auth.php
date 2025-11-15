<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['username'])) {
    // coba cek bagian ini, apakah bisa atau gak ?
    header("Location: /latihan-php/procedural/login.php");
    exit();
}

?>