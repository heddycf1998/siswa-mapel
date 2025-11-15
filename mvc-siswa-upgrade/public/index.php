<?php 
require_once __DIR__ . '/../config/config.php';
require_once BASE_PATH . '/config/koneksi.php';
require_once BASE_PATH . '/config/autoload.php';

// Tujuan : fokus alur CRUD + URL rapih

// Ambil URL
// $request = /latihan-php/mvc-siswa-upgrade/public/login/form
$request = $_SERVER['REQUEST_URI']; 

// $_SERVER['SCRIPT_NAME'] = /latihan-php/mvc-siswa-upgrade/public/index.php
// dirname($_SERVER['SCRIPT_NAME']) = /latihan-php/mvc-siswa-upgrade/public
// str_replace() : buat jaga-jaga biar semua pakai / (Linux Style)
// $scriptName = /latihan-php/mvc-siswa-upgrade/public
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

// $request = /latihan-php/mvc-siswa-upgrade/public/login/form
// $scriptName = /latihan-php/mvc-siswa-upgrade/public
// $path = /login/form
// index.php tidak keliahan karena .htaccess
$path = str_replace($scriptName, '' ,$request); 

// misal : /login/form?username=abc
// hasil : /login/form
// $path = /login/form
$path = parse_url($path, PHP_URL_PATH);

// trim($path, '/') = login/form (hapus '/' di depan dan belakang)
// explode('/', ... )) = ["login", "form"] (pecah jadi array)
// $segments = ["login", "form"]
$segments = explode('/', trim($path, '/'));

// $segments[0] = login (biasanya controller)
// $segments[1] = login (biasanya method / action)
$menu = $segments[0] ?? 'siswa';
$aksi = $segments[1] ?? 'list';

// Proteksi Login
// "Kalau belum login DAN halaman yang dituju bukan login/register/auth, maka…"
$public_routes = ['login', 'register', 'auth'];
if (!isset($_SESSION['user']) && !in_array($menu, $public_routes)) {
    header("Location: " . BASE_URL . "/login/form");
    exit();
}

$view_file = '';
$layout = BASE_PATH . '/app/view/layout/dashboard.php';

// Routing
switch ($menu) {
    case 'auth':
        // Begitu PHP nemu new AuthController(), dia bilang:
        // “Eh, class AuthController ini belum didefinisiin. Tanya autoloader deh.”
        $controller = new AuthController();
        $controller->$aksi();
        break;

    case 'login':
        switch ($aksi) {
            case 'form':
                $view_file = BASE_PATH . '/app/view/auth/login.php';
                break;
            
            case 'register' :
                $view_file = BASE_PATH . '/app/view/auth/register.php';
                break;
        }
        $layout = BASE_PATH . '/app/view/layout/auth.php';
        break;

    case 'register':
        $view_file = BASE_PATH . '/app/view/auth/register.php'; // cuman form doank
        $layout = BASE_PATH . '/app/view/layout/auth.php'; // tempat ganti-ganti form nya
        break;
    
    case 'siswa':
        $controller = new SiswaController(); // sudah ada
        switch ($aksi) {
            case 'list':
                $view_file = BASE_PATH . "/app/view/siswa/list.php";
                break;
            case 'form':
                $id = $segments[2] ?? null;
                if($id) {
                    $s = new Siswa();
                    $data = $s->ambil($id);
                }
                $view_file = BASE_PATH . "/app/view/siswa/form.php";
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                $view_file = BASE_PATH . "/app/view/404.php";
                break;
        }
        break;
    
    case 'mapel':
        $controller = new MapelController(); // Dah ada
        switch ($aksi) {
            case 'list':
                $view_file = BASE_PATH . "/app/view/mapel/list.php";
                break;
            case 'form':
                $id = $segments[2] ?? null;
                if($id) {
                    $m = new Mapel();
                    $data = $m->ambil($id);
                }
                $view_file = BASE_PATH . "/app/view/mapel/form.php";
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                $view_file = BASE_PATH . "/app/view/404.php";
                break;
        }
        break;

    default:
        $view_file = BASE_PATH . '/app/view/404.php';
        break;
}

if (in_array($menu, ['login', 'register'])) {
    include BASE_PATH . '/app/view/layout/auth.php';
} else {
    include BASE_PATH . '/app/view/layout/dashboard.php';
}

?>