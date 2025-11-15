<?php 
require_once __DIR__ . '/../config/config.php';
require_once BASE_PATH . '/config/koneksi.php';
require_once BASE_PATH . '/config/autoload.php';
require_once BASE_PATH . '/app/helper/pagination.php';
require_once BASE_PATH . '/app/middleware/AuthMiddleware.php';
require_once BASE_PATH . '/app/middleware/GuestMiddleware.php';
require_once BASE_PATH . '/app/middleware/RoleMiddleware.php';

// Ambil URL
$request = $_SERVER['REQUEST_URI']; 
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$path = str_replace($scriptName, '' ,$request); 
$path = parse_url($path, PHP_URL_PATH);
$segments = explode('/', trim($path, '/'));

// middleware-an | Load daftar middleware
$middlewares = require BASE_PATH . '/config/middleware.php';

// middleware-an | Buat mapping type -> class
$middlewareMap = [
    'auth' => AuthMiddleware::class,
    'guest' => GuestMiddleware::class,
    'role' => RoleMiddleware::class
];

// middleware-an | Tentukan route saat ini
$controllerSegment = strtolower($segments[0] ?? '');
$actionSegment = strtolower($segments[1] ?? '');

$fullRoute = $controllerSegment;
if (!empty($actionSegment)) {
    $fullRoute .= '/' . $actionSegment;
}

// middleware-an | Cek setiap rule middleware
foreach ($middlewares as $rule) {
    $pattern = strtolower($rule['pattern']);
    $middlewareType = $rule['middleware'];

    if (
        fnmatch(strtolower($pattern), $fullRoute) || 
        fnmatch(strtolower($pattern),$controllerSegment . '/*')
        ) {
            if (is_array($middlewareType)) {
                foreach ($middlewareType as $type => $allowedRoles) {
                    if (isset($middlewareMap[$type])) {
                        $middlewareMap[$type]::handle($allowedRoles);
                    }
                }
            } else {
                $type = strtolower($middlewareType);
                if (isset($middlewareMap[$type])) {
                    $middlewareMap[$type]::handle();
                }
            }
    } 
}

// Controller | Default ke HomeController@index
$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
$action = $segments[1] ?? 'index';
$param = $segments[2] ?? null;

// Routing
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $param ? $controller->$action($param) : $controller->$action();
    } else {
        $error = new ErrorController();
        $error->notFound();
    }
} else {
    $error = new ErrorController();
    $error->notFound();
}


?>