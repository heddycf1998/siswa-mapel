<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        $session = session();

        if ($session->get('logged_in')) {
            switch ($session->get('role')) {
                case 'admin' :
                    return redirect()->to('/admin');
                case 'guru':
                    return redirect()->to('/guru');
                case 'siswa':
                    return redirect()->to('/siswa');
        }
    }
}
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
    {
    }

}