<?php 

namespace App\Controllers\Users\Siswa;

use App\Controllers\BaseController;

class SiswaController extends BaseController 
{
    protected ?int $id_siswa;
    protected array $shared;

    public function __construct()
    {
        $this->id_siswa = session('id_siswa');

        $this->shared = [
            'user'=> session('username'),
            'role'=> 'siswa',
            'id_siswa' => $this->id_siswa,
        ];
    }
    public function render(string $view, array $data = [])
    {
        return view($view, array_merge($this->shared, $data));
    }
}
?>