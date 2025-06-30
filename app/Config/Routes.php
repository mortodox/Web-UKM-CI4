<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kegiatan', 'Kegiatan::index');
$routes->get('/kegiatan/create', 'Kegiatan::create');
$routes->post('/kegiatan/store', 'Kegiatan::store');
$routes->get('/kegiatan/edit/(:num)', 'Kegiatan::edit/$1');
$routes->post('/kegiatan/update/(:num)', 'Kegiatan::update/$1');
$routes->get('/kegiatan/delete/(:num)', 'Kegiatan::delete/$1');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::process');
$routes->get('logout', 'Auth::logout');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/create', 'Artikel::create');
$routes->post('/artikel/store', 'Artikel::store');
$routes->get('/artikel/detail/(:num)', 'Artikel::detail/$1');
$routes->get('/artikel/edit/(:num)', 'Artikel::edit/$1');
$routes->post('/artikel/update/(:num)', 'Artikel::update/$1');
$routes->get('/artikel/delete/(:num)', 'Artikel::delete/$1');
$routes->get('/kalender', 'Kegiatan::kalender');
$routes->get('/', 'HomePublic::index');
$routes->get('/galeri', 'Galeri::index');
$routes->setAutoRoute(false); // atau true jika kamu mengandalkan otomatis
$routes->get('/public/artikel', 'PublicArtikel::index');
$routes->get('/artikel/(:num)', 'PublicArtikel::detail/$1');
$routes->get('/public/kalkulator', 'Kalkulator::index');
$routes->post('kalkulator/hitung', 'Kalkulator::hitung');
$routes->get('/public/peta', 'Peta::index');
$routes->get('/public/arsip', 'Arsip::index');
$routes->get('/public/tentang', 'Tentang::index');
$routes->get('/logout', 'Auth::logout');
