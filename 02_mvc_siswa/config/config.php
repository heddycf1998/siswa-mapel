<?php
define('BASE_URL', '/latihan-php/mvc-siswa/public');

define('BASE_PATH', dirname(__DIR__));

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>