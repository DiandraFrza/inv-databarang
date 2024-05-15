<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('user', 'User::index');
$routes->get('admin', 'AdminController::index', ['filter' => 'role:admin']);
$routes->post('admin', 'AdminController::index', ['filter' => 'role:admin']);
$routes->get('user_list', 'AdminController::userList', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'AdminController::detail/$1', ['filter' => 'role:admin']);
$routes->get('/barang', 'MasterDataController::index', ['filter' => 'role:admin']);
$routes->get('/barang/create', 'MasterDataController::create', ['filter' => 'role:admin']);
$routes->post('/barang/store', 'MasterDataController::store', ['filter' => 'role:admin']);
$routes->get('/barang/edit/(:num)', 'MasterDataController::edit/$1', ['filter' => 'role:admin']);
$routes->post('/barang/update/(:num)', 'MasterDataController::update/$1', ['filter' => 'role:admin']);
$routes->get('/barang/delete/(:num)', 'MasterDataController::delete/$1', ['filter' => 'role:admin']);
