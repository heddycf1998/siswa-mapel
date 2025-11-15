<?php
class RoleMiddleware {
    public static function handle($allowedRoles = []) {
        $userRole = $_SESSION['user']['role'] ?? null;

        // Belum Login
        if (!$userRole) {
            Flash::set("error", "Silahkan Login terlebih dahulu");
            header("Location: " . BASE_URL . "/auth");
            exit();
        }

        // Role tidak cocok
        if (!in_array($userRole, $allowedRoles)) {
            // Panggil ErrorController -> forbidden
            $error = new ErrorController();
            $error->forbidden();
            exit();
        }
    }
}

?>