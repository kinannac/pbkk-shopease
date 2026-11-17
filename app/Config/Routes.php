<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// ====================================================================
// AUTHENTICATION (Login, Register, Logout)
// ====================================================================
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::store');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->post('logout', 'AuthController::logout');


// ====================================================================
// DASHBOARD UTAMA (Eksplisit di luar grup agar tidak kena bug 404)
// ====================================================================
$routes->get('admin', 'Admin\DashboardController::index', ['filter' => 'auth:admin']);
$routes->get('operator', 'Operator\DashboardController::index', ['filter' => 'auth:operator']);


// ====================================================================
// GROUP ROUTE ADMIN (Khusus untuk sub-menu)
// ====================================================================
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    // Modul Kategori
    $routes->get('categories', 'CategoryController::index');
    $routes->get('categories/create', 'CategoryController::create');
    $routes->post('categories/store', 'CategoryController::store');
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'CategoryController::update/$1');
    $routes->get('categories/delete/(:num)', 'CategoryController::delete/$1');
    
    $routes->get('products', 'ProductController::index');
    $routes->get('products/create', 'ProductController::create');
    $routes->post('products/store', 'ProductController::store');
    $routes->get('products/delete/(:num)', 'ProductController::delete/$1');
});