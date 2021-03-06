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

Route::get('/','PageController@Login');
Route::get('/login', 'PageController@Login');
Route::post('/login', 'PageController@PostLogin');
Route::get('/logout', 'PageController@Logout');
Route::get('/admin/layanan', 'AdminController@Layanan');
Route::get('/admin/jabatan', 'AdminController@Jabatan');
Route::get('/admin/karyawan', 'AdminController@Karyawan');

Route::get('/pelanggan/layanan', 'PelangganController@Layanan');
Route::get('/pelanggan/tiket-gangguan', 'PelangganController@TiketGangguan');
Route::get('/pelanggan/laporan/layanan', 'PelangganController@LaporanLayanan');
Route::get('/pelanggan/download/layanan', 'PelangganController@DownloadLayanan');
Route::get('/pelanggan/laporan/restitusi', 'PelangganController@LaporanRestitusi'); 
Route::get('/pelanggan/download/restitusi', 'PelangganController@DownloadRestitusi');

Route::get('/karyawan/tiket', 'KaryawanController@TiketGangguan');
Route::get('/karyawan/aktivasi', 'KaryawanController@AktivasiPelanggan');
Route::get('/karyawan/pembayaran/restitusi', 'KaryawanController@PembayaranRestitusi');
Route::get('/karyawan/pemetaan-solusi', 'KaryawanController@PemetaanSolusi');
Route::get('/karyawan/laporan/tiket', 'KaryawanController@LaporanTiket');
Route::get('/karyawan/download/tiket', 'KaryawanController@DownloadTiket');
Route::get('/karyawan/laporan/restitusi', 'KaryawanController@LaporanRestitusi');
Route::get('/karyawan/download/restitusi', 'KaryawanController@DownloadRestitusi');

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
Route::resource('karyawan', 'KaryawanController');
Route::resource('pelanggan', 'PelangganController');