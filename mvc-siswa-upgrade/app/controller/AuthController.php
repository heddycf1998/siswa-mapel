<?php
// Authentication = cek apakah itu adalah kamu, contoh : login + register + logout
require_once BASE_PATH . "/app/model/User.php";

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getByUsername($username);
                
            // $user = [
                // 'id' => 123,
                // 'username' => 'dontol',
                // 'password' => '$2y$10$wS2Wb.tK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5IuN3/wF.', // INI ADALAH HASH PASSWORD, BUKAN 'konkonkon'
                // 'email' => 'dontol@contoh.com',
                // ];
                
                
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['username'];
                header("Location: ". BASE_URL . "/siswa/list");
                exit();
            } else {
                header("Location: ". BASE_URL . "/login/form?error=Username atau Password salah");
                exit();
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];

            if ($_POST['password'] !== $_POST['confirm_password']) {
                header("Location: ". BASE_URL . "/register?error=Password tidak sama");
                exit();
            }

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->userModel->create($username, $password)) {
                header("Location: ". BASE_URL . "/login/form?success=Registrasi berhasil, silahkan login");
                exit();
            } else {
                header("Location: ". BASE_URL . "/register?error=Gagal membuat akun");
                exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: ". BASE_URL . "/login/form");
        exit();
    }
}

?>