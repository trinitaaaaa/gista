<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/jalur/(:num)', 'Home::jalur/$1');
$routes->get('/kalori', 'Kalori::index');
$routes->get('/penginput', 'Penginput::index');
$routes->get('/login', 'Auth::login');
$routes->post('/proses_login', 'Auth::login_proses');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/form-tambah-data', 'Home::tambahData');
$routes->post('/form-tambah-data', 'Home::tambahData');
$routes->get('/status-gunung', 'Home::statusgunung');
$routes->get('/status-jalur', 'Home::statusjalur');
$routes->get('/status-pos', 'Home::statuspos');
#ADMIN
$routes->get('/halaman-admin', 'Admin::halamanadmin');
$routes->get('/data-gunung', 'Admin::datagunung');
$routes->post('/tambah-data-gunung', 'Admin::tambahdatagunung');
$routes->post('/update-data-gunung', 'Admin::updatedatagunung');
$routes->get('/data-jalur', 'Admin::datajalur');
$routes->get('/data-pos', 'Admin::datapos');
$routes->get('/rekomendasi-gunung', 'Admin::rekomendasigunung');
$routes->get('/rekomendasi-jalur', 'Admin::rekomendasijalur');
$routes->get('/rekomendasi-pos', 'Admin::rekomendasipos');
$routes->get('/data-user', 'Admin::datauser');
$routes->get('/data-makanan', 'Admin::datamakanan');
$routes->get('/delete-gunung/(:num)', 'Admin::deleteGunung/$1');
$routes->get('/setujui-gunung/(:num)', 'Admin::setujuiGunung/$1');
$routes->post('/tolak-gunung/(:num)', 'Admin::tolakGunung/$1');