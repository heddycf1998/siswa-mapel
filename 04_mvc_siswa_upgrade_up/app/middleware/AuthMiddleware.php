<?php

class AuthMiddleware {
    public static function handle() {
        // Kalo user belum login, redirect ke login
        if (empty($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth");
            exit();
        }
    }
}

?>