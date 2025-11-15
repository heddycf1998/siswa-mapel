<?php
class ErrorController {
    // 400 - Permintaan tidak valid
    public function badRequest() {
        http_response_code(400);
        require_once BASE_PATH . '/app/view/error/400.php';
    }

    // 403 - Akses ditolak / terlarang
    public function forbidden() {
        http_response_code(403);
        require_once BASE_PATH . '/app/view/error/403.php';
    }

    // 404 - Halaman tidak ditemukan
    public function notFound() {
        http_response_code(404);
        require_once BASE_PATH . '/app/view/error/404.php';
    }

    // 500 - Kesalahan servel internal
    public function internalServerError() {
        http_response_code(500);
        require_once BASE_PATH . '/app/view/error/500.php';
    }

    
}

?>