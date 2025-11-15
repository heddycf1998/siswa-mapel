<?php

namespace App\Controllers;

class AccessDenied extends BaseController
{
    public function index()
    {
        echo "Akses ditolak. Kamu tidak punya izin.";
    }
}
