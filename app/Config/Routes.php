<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/auth/login', 'AuthController::index');
$routes->get('/auth/register', 'AuthController::register');
$routes->post('/auth/register/save', 'AuthController::register_save');
$routes->post('/login/check', 'AuthController::check');
$routes->get('/auth/logout', 'AuthController::logout');
// Login terlebih dahulu
$routes->group('', ['filter' => 'ceklogin'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/alternatif', 'AlternatifController::index');
    $routes->post('/alternatif/save', 'AlternatifController::save');
    $routes->get('/alternatif/get/show', 'AlternatifController::show_update');
    $routes->post('/alternatif/update', 'AlternatifController::update_alternatif');
    $routes->get('/alternatif/delete/(:num)', 'AlternatifController::delete_alternatif/$1');

    $routes->get('/kriteria', 'KriteriaController::index');
    $routes->get('/kriteria/get/show', 'KriteriaController::show_kriteria');

    $routes->get('/penilaian', 'PenilaianController::index');
    $routes->get('/penilaian/alternatif/get/(:any)', 'PenilaianController::get/$1');
    $routes->post('penilaian/save', 'PenilaianController::save');
    $routes->get('/penilaian/get/show', 'PenilaianController::show_update');
    $routes->post('/penilaian/update', 'PenilaianController::update_penilaian');
    $routes->get('/penilaian/delete/(:num)', 'PenilaianController::delete_penilaian/$1');

    $routes->get('/metode', 'MetodeController::index');
    $routes->get('/metode/normalisasi', 'MetodeController::normalisasi');
    $routes->get('/metode/normalisasi/terbobot', 'MetodeController::normalisasi_terbobot');
    $routes->get('/metode/normalisasi/ranking', 'MetodeController::rangking');
    $routes->get('/metode/invoice', 'MetodeController::invoice');
    $routes->get('/metode/timing', 'MetodeController::timing');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}