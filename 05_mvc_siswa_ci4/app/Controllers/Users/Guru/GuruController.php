<?php

namespace App\Controllers\Users\Guru;

use App\Controllers\BaseController;

class GuruController extends BaseController 
{
    protected array $shared;
    public function __construct() 
    {
        $this->shared = [
            'user'=> session('username'),
            'role'=> 'guru',
        ];
    }

    protected function render(string $view, array $data = [])
    {
        return view($view, array_merge($this->shared, $data));
    }
}

?>