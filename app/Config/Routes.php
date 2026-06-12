<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('home', 'Home::index');
$routes->group('pelanggan', ['namespace' => 'App\Controllers\Pelanggan'], function($routes) {
    $routes->get('pelanggan/dashboard', 'Pelanggan\DashboardController::index');

    $routes->get('dashboard', 'DashboardController::index');

    $routes->get('catering', 'Catering::index');

    $routes->get('catering/pesan/(:num)', 'Catering::pesan/$1');

    $routes->post('catering/simpan', 'Catering::simpan');

    $routes->get('catering/bayar-dp/(:num)', 'Catering::bayarDP/$1');

    $routes->post('catering/proses-dp', 'Catering::prosesDP');

    $routes->get('catering/menu/(:num)', 'Catering::menu/$1');

    $routes->post('catering/tambah-keranjang', 'Catering::tambahKeranjang');

    $routes->get('catering/keranjang', 'Catering::keranjang');

    $routes->get(
    'catering/reset-keranjang',
    'Catering::resetKeranjang'
    );

    $routes->get(
        'catering/hapus-keranjang/(:num)',
        'Catering::hapusKeranjang/$1'
    );

    $routes->get(
    'catering/checkout',
    'Catering::checkout'
    );
    $routes->get('catering/checkout', 'Catering::checkout');
    $routes->post('catering/proses-checkout', 'Catering::prosesCheckout');

    $routes->get('catering/pesanan-saya', 'Catering::pesananSaya');
    $routes->get('catering/detail-pesanan/(:num)', 'Catering::detailPesanan/$1');

    $routes->get(
    'catering/riwayat',
    'Catering::riwayat'
    );

    $routes->get(
    'catering/pelunasan/(:num)',
    'Catering::pelunasan/$1'
    );

    $routes->post(
    'catering/proses-pelunasan',
    'Catering::prosesPelunasan'
    );
});

 $routes->get('pelanggan/profil', 'Pelanggan\ProfilController::index');

    $routes->post(
        'pelanggan/profil/update',
        'Pelanggan\ProfilController::update'
    );

$routes->group('admin',['namespace' => 'App\Controllers\Admin'],function($routes){

    $routes->get('dashboard','DashboardController::index');

    $routes->get('paket', 'PaketController::index');

    $routes->post(
        'paket/simpan',
        'PaketController::simpan'
    );

    $routes->post(
        'paket/update/(:num)',
        'PaketController::update/$1'
    );
    $routes->get(
    'paket/hapus/(:num)',
    'PaketController::hapus/$1'
    );

    $routes->get('menu', 'MenuController::index');

    $routes->post('menu/simpan', 'MenuController::simpan');

    $routes->post(
        'menu/update/(:num)',
        'MenuController::update/$1'
    );

    $routes->get(
        'menu/hapus/(:num)',
        'MenuController::hapus/$1'
    );

    $routes->get(
    'pemesanan',
    'PemesananController::index'
);

$routes->post(
    'pemesanan/update-status/(:num)',
    'PemesananController::updateStatus/$1'
);

$routes->get(
    'pembayaran',
    'PembayaranController::index'
);

});

$routes->group('owner',['namespace' => 'App\Controllers\Owner'], function($routes){

    $routes->get(
        'dashboard',
        'DashboardController::index'
    );

    $routes->get(
    'pemesanan',
    'LaporanPemesananController::index'
    );

    $routes->get(
    'pendapatan',
    'LaporanPendapatanController::index'
    );

    $routes->get(
    'laporan/export-pemesanan',
    'LaporanPemesananController::exportPemesanan'
    );

    $routes->get(
    'pendapatan/export-excel',
    'LaporanPendapatanController::exportExcel'
);


});
$routes->get('login', 'AuthController::login');
$routes->get('register', 'AuthController::register');
$routes->post('register-proses', 'AuthController::prosesRegister');
$routes->post('login-proses', 'AuthController::prosesLogin');
$routes->get(
    'logout',
    'AuthController::logout'
);
$routes->get('hash', 'AuthController::hash');