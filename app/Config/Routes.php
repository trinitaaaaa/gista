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
$routes->get('/form-tambah-data', 'Home::formTambahData');
$routes->post('/form-tambah-data', 'Home::tambahData');
$routes->get('/status-gunung', 'Home::statusgunung');
$routes->get('/status-jalur', 'Home::statusjalur');
$routes->get('/status-pos', 'Home::statuspos');
#ADMIN
$routes->get('/halaman-admin', 'Admin::halamanadmin');
#DATA GUNUNG
$routes->get('/data-gunung', 'Admin::datagunung');
$routes->post('/tambah-data-gunung', 'Admin::tambahdatagunung');
$routes->post('/update-data-gunung', 'Admin::updatedatagunung');
$routes->get('/delete-gunung/(:num)', 'Admin::deleteGunung/$1');
#DATA JALUR
$routes->get('/data-jalur', 'Admin::datajalur');
$routes->post('/tambah-data-jalur', 'Admin::tambahdatajalur');
$routes->post('/update-data-jalur', 'Admin::updatedatajalur');
$routes->get('/delete-jalur/(:num)', 'Admin::deleteJalur/$1');
#DATA POS
$routes->get('/data-pos', 'Admin::datapos');
$routes->post('/tambah-data-pos', 'Admin::tambahdatapos');
$routes->post('/update-data-pos', 'Admin::updatedatapos');
$routes->get('/delete-pos/(:num)', 'Admin::deletePos/$1');
#DATA MAKANAN
$routes->get('/data-makanan', 'Admin::datamakanan');
$routes->post('/tambah-data-makanan', 'Admin::tambahDataMakanan');
$routes->post('/update-data-makanan', 'Admin::updateDataMakanan');
$routes->get('/delete-makanan/(:num)', 'Admin::deleteMakanan/$1');
#DATA REKOMENDASI
$routes->get('/rekomendasi-gunung', 'Admin::rekomendasigunung');
$routes->get('/rekomendasi-jalur', 'Admin::rekomendasijalur');
$routes->get('/rekomendasi-pos', 'Admin::rekomendasipos');
$routes->get('/setujui-gunung/(:num)', 'Admin::setujuiGunung/$1');
$routes->post('/tolak-gunung/(:num)', 'Admin::tolakGunung/$1');
$routes->get('/setujui-jalur/(:num)', 'Admin::setujuiJalur/$1');
$routes->post('/tolak-jalur/(:num)', 'Admin::tolakJalur/$1');
$routes->get('/setujui-pos/(:num)', 'Admin::setujuiPos/$1');
$routes->post('/tolak-pos/(:num)', 'Admin::tolakPos/$1');
#DATA USER
$routes->get('/data-user', 'Admin::datauser');