<?php

use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// Siswa
// $routes->get('/siswa', 'SiswaController::index');
// $routes->get('/siswa/create', 'SiswaController::create');
// $routes->post('/siswa/store', 'SiswaController::store');
// $routes->get('/siswa/edit/(:num)', 'SiswaController::edit/$1');
// $routes->post('/siswa/update/(:num)', 'SiswaController::update/$1');
// $routes->post('/siswa/delete/(:num)', 'SiswaController::delete/$1');
// $routes->get('/siswa/reset-password/(:num)', 'SiswaController::resetPassword/$1');

// Mapel
// $routes->get('/mapel', 'MapelController::index');
// $routes->get('/mapel/create', 'MapelController::create');
// $routes->post('/mapel/store', 'MapelController::store');
// $routes->get('/mapel/edit/(:num)', 'MapelController::edit/$1');
// $routes->post('/mapel/update/(:num)', 'MapelController::update/$1');
// $routes->post('/mapel/delete/(:num)', 'MapelController::delete/$1');

// Auth
// $routes->get('/login', 'UserController::login');
// $routes->post('/login/process', 'UserController::loginProcess');
// $routes->get('/logout', 'UserController::logout');
// $routes->get('/register', 'UserController::register');
// $routes->post('/register/process', 'UserController::registerProcess');

// Change Password
// $routes->get('/change-password', 'UserController::showChangePasswordForm');
// $routes->post('/change-password', 'UserController::updatePassword');

// Dashboard
// $routes->get('/dashboard', 'Dashboard::index');

// Admin
// $routes->get('/admin/create', 'AdminController::create');
// $routes->post('/admin/store', 'AdminController::store');

// Sekali Jalan :
// $routes->get('/sync-user', 'SyncUser::index');

// Admin
$routes->group('admin', [
    'namespace' => 'App\Controllers\Users\Admin\Pages',
    'filter' => 'role:admin',
], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('mapel', 'Mapel::index');
    $routes->get('mapel/create', 'Mapel::create');
    $routes->post('mapel/store', 'Mapel::store');
    $routes->get('mapel/edit/(:num)', 'Mapel::edit/$1');
    $routes->post('mapel/update/(:num)', 'Mapel::update/$1');
    $routes->post('mapel/delete/(:num)', 'Mapel::delete/$1');

    $routes->get('siswa', 'Siswa::index');
    $routes->get('siswa/create', 'Siswa::create');
    $routes->post('siswa/store', 'Siswa::store');
    $routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
    $routes->post('siswa/update/(:num)', 'Siswa::update/$1');
    $routes->post('siswa/delete/(:num)', 'Siswa::delete/$1');

    $routes->get('aktivasi', 'Aktivasi::index');
    $routes->post('aktivasi/massal', 'Aktivasi::aktivasi');
    $routes->post('aktivasi/(:num)?', 'Aktivasi::aktivasi/$1');
    
    $routes->get('reset-password', 'ResetPassword::index');
    $routes->post('reset-password', 'ResetPassword::resetPassword');
});

// Guru
$routes->group('guru', [
    'namespace' => 'App\Controllers\Users\Guru\Pages',
    'filter' => 'role:guru',
], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('mapel', 'Mapel::index');
    $routes->get('siswa', 'Siswa::index');

    $routes->get('ubah-password', 'ChangePassword::index');
    $routes->post('ubah-password', 'ChangePassword::changePassword');
});

// Siswa
$routes->group('siswa', [
    'namespace' => 'App\Controllers\Users\Siswa\Pages',
    'filter' => 'role:siswa',
], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('mapel', 'Mapel::index');
    $routes->get('profil', 'Profil::index');
    $routes->get('profil/edit', 'Profil::edit');
    $routes->post('profil/update', 'Profil::update');

    $routes->get('ubah-password', 'ChangePassword::index');
    $routes->post('ubah-password', 'ChangePassword::changePassword');
});

// $routes->get('/access-denied', 'AccessDenied::index');

// login
$routes->get('/login', 'Auth\Login::index', ['filter' => 'guest']);
$routes->post('/login/process', 'Auth\Login::process', ['filter' => 'guest'] );
$routes->get('/logout', 'Auth\Login::logout');

// forbidden
$routes->get('/forbidden', 'ErrorPage::forbidden');

// Root
$routes->get('/', 'Home::index');
