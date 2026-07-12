<?php
namespace App\Controllers\Users\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController 
{
    protected array $shared;
    public function __construct()
    {
        $this->shared = [
            'user'=> session('username'),
            'role'=> 'admin',
        ];
    }

    protected function render(string $view, array $data = [])
    {
        return view($view, array_merge($this->shared, $data));
    }
}
?>