<?php

class GuestMiddleware {
    public static function handle() {
        // Kalo user udah login, jangan biarkan dia ke /auth/*
        if (isset($_SESSION['user'])) {
            $role = $_SESSION['user']['role'];

            if ($role === 'siswa') {
                header("Location: " . BASE_URL . "/siswa/profil");
                exit();
            }

            if ($role === 'admin' || $role === 'guru') {
                header("Location:" . BASE_URL . "/siswa");
                exit();
            }
        }
    }
}

?>