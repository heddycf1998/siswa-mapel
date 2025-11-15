<?php
class HomeController {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth");
            exit();
        }

        $role = $_SESSION['user']['role'];
        $this->redirectByRole($role);
    }

    public function redirectByRole($role) {
        switch ($role) {
            case 'admin':
            case 'guru':
                header("Location: " . BASE_URL . "/siswa");
                exit();
            case 'siswa':
                header("Location: " . BASE_URL . "/siswa/profil");
                exit();
            default:
                $error = new ErrorController();
                $error->forbidden();
                exit();
            }
    }
}

?>