<?php
// Authentication = cek apakah itu adalah kamu, contoh : login + register + logout
require_once BASE_PATH . "/app/model/User.php";

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
        
    }

    public function index() {
        $this->loginForm();
    }

    public function loginForm() {
        $view_file = BASE_PATH . '/app/view/auth/login.php';
        include BASE_PATH . '/app/view/layout/auth.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getByUsername($username);
                
            // $user = [
                // 'id' => 6,
                // 'username' => 'dontol',
                // 'password' => '$2y$10$wS2Wb.tK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5I.aK0.2Y2Z6P.5Q5IuN3/wF.', // INI ADALAH HASH PASSWORD, BUKAN 'konkonkon'
                // 'role' => 'admin',
                // ];
                
                
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id_siswa' => $user['id_siswa']
                ];
                if ($user['role'] === 'admin' || $user['role'] === 'guru') {
                    Flash::set('success', 'Login Berhasil, Selamat Datang ' . $user['username']);
                    header("Location: ". BASE_URL . "/siswa");
                    exit();
                } elseif ($user['role'] === 'siswa') {
                    Flash::set('success', 'Login Berhasil, Selamat Datang ' . $user['username']);
                    header("Location: ". BASE_URL . "/siswa/profil");
                    exit();
                }
                
            } else {
                Flash::set('error', 'Username atau Password salah');
                header("Location: ". BASE_URL . "/auth");
                exit();
            }
        }
    }

    public function registerForm() {
        $view_file = BASE_PATH . '/app/view/auth/register.php';
        include BASE_PATH . '/app/view/layout/auth.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];

            if ($_POST['password'] !== $_POST['confirm_password']) {
                Flash::set('error', 'Password tidak sama');
                header("Location: ". BASE_URL . "/auth/registerForm");
                exit();
            }

            $existingUser = $this->userModel->getByUsername($username);
            if ($existingUser) {
                Flash::set('error', 'Username sudah dipakai');
                header("Location: " . BASE_URL . "/auth/registerForm");
                exit();
            }

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->userModel->create($username, $password)) {
                Flash::set('success', 'Registrasi berhasil, silahkan login');
                header("Location: ". BASE_URL . "/auth");
                exit();
            } else {
                Flash::set('error', 'Gagal membuat akun, coba lagi');
                header("Location: ". BASE_URL . "/auth/registerForm");
                exit();
            }
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        Flash::set('info', 'Anda sudah berhasil logout');
        header("Location: ". BASE_URL . "/auth");
        exit();
    }
}

?>