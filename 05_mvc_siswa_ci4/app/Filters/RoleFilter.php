<?php

/**
 * RoleFilter
 * 
 * Filter untuk membatasi akses halaman berdasarkan role user
 * Digunakan untuk :
 * - Mengecek apakah user sudah login
 * - Validasi role yang memiliki izin akses
 * - Redirect ke halaman forbidden jika tidak punya izin
 * 
 * @author Heddy
 * 
 * @version 1.0
 */

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Jika belum login
        if (!$session->has('role')) {
            return redirect()->to('/login');
        }

        // Ambil role user
        $role = $session->get('role');
        $allowedRoles = $arguments ?? [];

        // Cek apakah role diperbolehkan
        if (!in_array($role, $allowedRoles)) {
            return redirect()->to('/forbidden'); // halaman error sederhana
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $argument = null)
    {
        // Tidak ada proses khusus setelah request
    }
}
