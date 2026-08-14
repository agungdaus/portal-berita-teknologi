<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

// Frontend
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:num)', 'Artikel::detail/$1');
$routes->get('search', 'Artikel::search');

// Admin Auth (no auth filter)
$routes->get('admin/login', 'Admin\Auth::index');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin (protected)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('artikel', 'Admin\Artikel::index');
    $routes->get('artikel/new', 'Admin\Artikel::new');
    $routes->post('artikel/create', 'Admin\Artikel::create');
    $routes->get('artikel/edit/(:num)', 'Admin\Artikel::edit/$1');
    $routes->post('artikel/update/(:num)', 'Admin\Artikel::update/$1');
    $routes->get('artikel/delete/(:num)', 'Admin\Artikel::delete/$1');
});
