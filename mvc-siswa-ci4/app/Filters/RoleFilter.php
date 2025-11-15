<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('role');

        if (!$role) {
            return redirect()->to('/login');
        }

        if (!in_array($role, $arguments)) {
            return redirect()->to('/access-denied');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $argument = null) {}
}
