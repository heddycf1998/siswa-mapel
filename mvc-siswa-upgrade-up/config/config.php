<?php
define('BASE_URL', '/latihan-php/mvc-siswa-upgrade-up/public');

define('BASE_PATH', dirname(__DIR__));

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload helper
require_once BASE_PATH . '/app/helper/Flash.php';
require_once BASE_PATH . '/app/helper/flash_helper.php';


?>