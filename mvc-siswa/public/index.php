<?php 
require_once __DIR__ . '/../config/config.php';
require_once BASE_PATH . '/config/koneksi.php';
require_once BASE_PATH . '/app/model/Siswa.php';
require_once BASE_PATH . '/app/model/Mapel.php';

$menu = $_GET['menu'] ?? 'siswa';
$aksi = $_GET['aksi'] ?? 'list';


$public_routes = ['login', 'register', 'auth'];
if (!isset($_SESSION['user']) && !in_array($menu, $public_routes)) {
    header("Location: " . BASE_URL . "/index.php?menu=login&aksi=form");
    exit();
}

$view_file = '';
$layout = BASE_PATH . '/app/view/layout/dashboard.php';

switch ($menu) {
    case 'auth':
        require_once BASE_PATH . '/app/controller/AuthController.php';
        break;

    case 'login':
        if ($aksi === 'form') {
            $view_file = BASE_PATH . '/app/view/auth/login.php';
        } elseif ($aksi === 'register') {
            $view_file = BASE_PATH . '/app/view/auth/register.php';
        }
        break;

    case 'register':
        $view_file = BASE_PATH . '/app/view/auth/register.php';
        break;
    
    case 'siswa':
        if ($aksi === 'list') {
            $view_file = BASE_PATH . '/app/view/siswa/list.php';
        } elseif ($aksi === 'form') {
            if (isset($_GET['id'])) {
                $s = new Siswa();
                $data = $s->ambil($_GET['id']);
            }
            $view_file = BASE_PATH . '/app/view/siswa/form.php';
        } elseif ($aksi === 'simpan' || $aksi === 'update' || $aksi === 'hapus') {
            require_once BASE_PATH . '/app/controller/SiswaController.php';
        }
        break;
    
    case 'mapel':
        if ($aksi === 'list') {
            $view_file = BASE_PATH . '/app/view/mapel/list.php';
        } elseif ($aksi === 'form') {
            if (isset($_GET['id_mapel'])) {
                $s = new Mapel();
                $data = $s->ambil($_GET['id_mapel']);
            }
            $view_file = BASE_PATH . '/app/view/mapel/form.php';
        } elseif ($aksi === 'simpan' || $aksi === 'update' || $aksi === 'hapus') {
            require_once BASE_PATH . '/app/controller/MapelController.php';
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