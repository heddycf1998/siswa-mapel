<?php
class Flash {
    // Untuk pesan sekali tampil (error, success)
    public static function set($key, $message)  {
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
                $msg = $_SESSION['flash'][$key];
                unset($_SESSION['flash'][$key]); // supaya cuma sekali
                return $msg;
            }
            return null;
    }

    // Gak Pake ini - Lom pake yang dibawah ini
    // untuk old input
    // public static function setOld($data) {
    //     $_SESSION['old'] = $data;
    // }

    // public static function old($key, $default = '') {
    //     return $_SESSION['old'][$key] ?? $default;
    // }

    // public static function clearOld() {
    //     unset($_SESSION['old']);
    // }
}

?>