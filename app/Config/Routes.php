<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//routes login
$routes->get('/', 'Home::index');


//routes Dashboard
$routes->get('Dashboard', 'DashboardAdmin::index');
// Routes for Form Pendaftaran Pelanggan
$routes->get('/FormPendaftaranPelanggan', 'AdvancedForm::index');
$routes->post('/FormPendaftaranPelanggan', 'AdvancedForm::processForm');

//rooutes Form Pemesanan Layanan
$routes->get('/FormPemesananLayanan', 'ValidationForm::index');
$routes->post('/FormPemesananLayanan', 'ValidationForm::processLayanan');

//rooutes admin produk
$routes->get('/LaporanTransaksi', 'TableDynamics::index');
$routes->get('/LaporanTransaksi(:num)', 'TableDynamics::destroy/$1');

// route logout
$routes->get('/logout', 'Auth::logout');
// route user
$routes->get('/DahboardUser', 'User::index');



