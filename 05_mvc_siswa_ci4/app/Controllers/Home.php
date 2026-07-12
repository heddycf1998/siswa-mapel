<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        switch ($session->get('role')) {
            case 'admin':
                return redirect()->to('/admin');
            case 'guru':
                return redirect()->to('/guru');
            case 'siswa':
                return redirect()->to('/siswa');
            default :
                return redirect()->to('/login');
        }
    }
}