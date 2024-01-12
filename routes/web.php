<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/login', 'loginProses')->name('loginProses');
    Route::get('/logout', 'logout')->name('logout');

    Route::middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
        Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        Route::controller(\App\Http\Controllers\LayananController::class)->group(function () {
            Route::get('/layanan', 'index')->name('layanan');
            Route::post('/tambah-layanan', 'tambahLayanan')->name('tambahLayanan');
            Route::get('/hapus-layanan', 'hapusLayanan')->name('hapusLayanan');
        });

        Route::controller(\App\Http\Controllers\ParfumController::class)->group(function () {
            Route::get('/parfum', 'index')->name('parfum');
            Route::post('/parfum', 'tambahParfum')->name('tambahParfum');
        });

        Route::controller(\App\Http\Controllers\PelangganController::class)->group(function () {
            Route::get('/pelanggan', 'index')->name('pelanggan');
            Route::post('/pelanggan', 'tambahPelanggan')->name('tambahPelanggan');
            Route::post('/tambah-pelanggan-ajax', 'tambahPelangganAjax')->name('tambahPelangganAjax');
            Route::get('/get-pelanggan', 'getPelanggan')->name('getPelanggan');
        });

        Route::controller(\App\Http\Controllers\PembayaranController::class)->group(function () {
            Route::get('/pembayaran', 'index')->name('pembayaran');
            Route::post('/pembayaran', 'tambahPembayaran')->name('tambahPembayaran');
        });

        Route::controller(\App\Http\Controllers\DiskonController::class)->group(function () {
            Route::get('/diskon', 'index')->name('diskon');
            Route::post('/diskon', 'tambahDiskon')->name('tambahDiskon');
        });

        Route::controller(\App\Http\Controllers\OutletController::class)->group(function () {
            Route::get('/outlet', 'index')->name('outlet');
            Route::get('/gunakan-outlet', 'gunakanOutlet')->name('gunakanOutlet');
        });

        Route::controller(\App\Http\Controllers\TransaksiController::class)->group(function () {
            Route::get('/buat-transaksi', 'buatTransaksi')->name('buatTransaksi');
            Route::get('/list-transaksi', 'listTransaksi')->name('listTransaksi');
            Route::get('/histori-transaksi', 'historiTransaksi')->name('historiTransaksi');
            Route::get('/lihat-transaksi/{orderNumber}', 'lihatTransaksi');
            Route::post('/create-transaksi', 'createTransaksi')->name('createTransaksi');
            Route::get('/cetak-struk/{transaksi_id}', 'cetakStruk')->name('cetakNotaTransaksi');
        });

        Route::controller(\App\Http\Controllers\PegawaiController::class)->group(function () {
            Route::get('/pegawai', 'index')->name('pegawai');
            Route::post('/tambah-pegawai', 'create')->name('tambahPegawai');
        });
    });
});
