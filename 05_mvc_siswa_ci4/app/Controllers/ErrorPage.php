<?php

/**
 * ErrorPage Controller
 * 
 * Mengelola tampilan halaman error seperti Forbidden (403)
 * 
 * @author Heddy
 * @version 1.0
 */

namespace App\Controllers;

use App\Controllers\BaseController;

class ErrorPage extends BaseController
{
    /**
     * Halaman Forbidden (403)
     * Muncul saat user tidak memiliki izin/role yang benar
     */
    public function forbidden()
    {
        // Ambil instance session
        $session = session();

        // Jika sudah login → arahkan sesuai role
        if (!$session->has('logged_in')) {
            $url = '/login';
            $text = 'Kembali ke Login';
        } else {
            switch ($session->get('role')) {
                case 'admin':
                    $url = '/admin';
                    $text = 'Ke Dashboard Admin';
                    break;
                case 'guru':
                    $url = '/guru';
                    $text = 'Ke Dashboard Guru';
                    break;
                case 'siswa':
                    $url = '/siswa';
                    $text = 'Ke Dashboard Siswa';
                    break;
                default:
                    $url = '/login';
                    $text = 'Kembali ke Login';
                    break;
            }
        }

        // Kirim data tombol ke view forbidden.php
        return view('errors/forbidden', [
            'buttonUrl' => $url,
            'buttonText' => $text,
        ]);
    }
}
