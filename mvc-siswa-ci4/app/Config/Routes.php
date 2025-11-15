<?php

use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Siswa
$routes->get('/siswa', 'SiswaController::index');
$routes->get('/siswa/create', 'SiswaController::create');
$routes->post('/siswa/store', 'SiswaController::store');
$routes->get('/siswa/edit/(:num)', 'SiswaController::edit/$1');
$routes->post('/siswa/update/(:num)', 'SiswaController::update/$1');
$routes->post('/siswa/delete/(:num)', 'SiswaController::delete/$1');
$routes->get('/siswa/reset-password/(:num)', 'SiswaController::resetPassword/$1');

// Mapel
$routes->get('/mapel', 'MapelController::index');
$routes->get('/mapel/create', 'MapelController::create');
$routes->post('/mapel/store', 'MapelController::store');
$routes->get('/mapel/edit/(:num)', 'MapelController::edit/$1');
$routes->post('/mapel/update/(:num)', 'MapelController::update/$1');
$routes->post('/mapel/delete/(:num)', 'MapelController::delete/$1');

// Auth
$routes->get('/login', 'UserController::login');
$routes->post('/login/process', 'UserController::loginProcess');
$routes->get('/logout', 'UserController::logout');
// $routes->get('/register', 'UserController::register');
// $routes->post('/register/process', 'UserController::registerProcess');

// Change Password
$routes->get('/change-password', 'UserController::showChangePasswordForm');
$routes->post('/change-password', 'UserController::updatePassword');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Admin
$routes->get('/admin/create', 'AdminController::create');
$routes->post('/admin/store', 'AdminController::store');

// Sekali Jalan :
// $routes->get('/sync-user', 'SyncUser::index');

// Admin Only
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('create', 'AdminController::create');
    $routes->post('store', 'AdminController::store');
});

// Guru Only
$routes->group('guru', ['filter' => 'role:guru'], function ($routes) {
    $routes->get('dashboard', 'GuruController::dashboard');
});

// Siswa Only
$routes->group('siswa', ['filter' => 'role:siswa'], function ($routes) {
    $routes->get('dashboard', 'SiswaController::dashboard');
});

$routes->get('/access-denied', 'AccessDenied::index');
