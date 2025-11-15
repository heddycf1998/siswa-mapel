<?php
// Authentication = cek apakah itu adalah kamu, contoh : login + register + logout
require_once BASE_PATH . "/app/model/User.php";

$userModel = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['aksi'] === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userModel->getByUsername($username);
        
        // $user = [
        // 'id' => 123,
        // 'username' => 'dontol',
        // 'password' => '$2y$10$wS2Wb.tK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5IuN3/wF.', // INI ADALAH HASH PASSWORD, BUKAN 'konkonkon'
        // 'email' => 'dontol@contoh.com',
        // ];
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: ". BASE_URL . "/index.php");
            exit();
        } else {
            header("Location: ". BASE_URL . "/index.php?menu=login&aksi=form&error=Username atau Password salah");
            exit();
        }
    } elseif($_POST['aksi'] === 'register') {
        $username = $_POST['username'];

        if ($_POST['password'] !== $_POST['confirm_password']) {
            header("Location: ". BASE_URL . "/index.php?menu=login&aksi=register&error=Password tidak sama");
            exit();
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($userModel->create($username, $password)) {
            header("Location: ". BASE_URL . "/index.php?menu=login&aksi=form&success=Registrasi berhasil, silahkan login");
            exit();
        } else {
            header("Location: ". BASE_URL . "/index.php?menu=login&aksi=register&error=Gagal membuat akun");
            exit();
        }
    }   
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'logout') {
    session_destroy();
    header("Location: ". BASE_URL . "/index.php?menu=login&aksi=form");
    exit();
}

?>