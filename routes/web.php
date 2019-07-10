<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'PageController@Login');
Route::get('/admin/layanan', 'AdminController@Layanan');
Route::get('/admin/jabatan', 'AdminController@Jabatan');
Route::get('/admin/karyawan', 'AdminController@Karyawan');

Route::get('/pelanggan/layanan', 'PelangganController@Layanan');
Route::get('/pelanggan/tiket-gangguan', 'PelangganController@TiketGangguan');
Route::get('/pelanggan/laporan/layanan', 'PelangganController@LaporanLayanan');
Route::get('/pelanggan/laporan/restitusi', 'PelangganController@LaporanRestitusi'); 

Route::get('/karyawan/tiket', 'KaryawanController@TiketGangguan');
Route::get('/karyawan/aktivasi', 'KaryawanController@AktivasiPelanggan');
Route::get('/karyawan/pembayaran/restitusi', 'KaryawanController@PembayaranRestitusi');
Route::get('/karyawan/pemetaan-solusi', 'KaryawanController@PemetaanSolusi');
Route::get('/karyawan/laporan/tiket', 'KaryawanController@LaporanTiket');
Route::get('/karyawan/laporan/restitusi', 'KaryawanController@LaporanRestitusi');

Route::resource('jabatan', 'JabatanController');
Route::resource('ticket', 'TicketController');
Route::resource('jenis-keluhan', 'JenisKeluhanController');
Route::resource('jenis-solusi', 'JenisSolusiController');
Route::resource('detil-solusi', 'DetilSolusiController');
Route::resource('ba-solusi', 'BASolusiController');
Route::resource('ba-selesai', 'BASelesaiController');
Route::resource('layanan', 'LayananController');
Route::resource('kontrak', 'KontrakController');
Route::resource('detil-kontrak', 'DetilKontrakController');
Route::resource('restitusi', 'RestitusiController');
Route::resource('bukti-transfer', 'BuktiTransferController');