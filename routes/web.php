<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
//anggota
Route::get('anggota/tampil', [AnggotaController::class, 'tampilanggota'])->name('tampilanggota')->middleware('auth');
Route::get('anggota/tambah', [AnggotaController::class, 'tambahanggota'])->name('tambahanggota')->middleware('auth');
Route::post('anggota/simpan', [AnggotaController::class, 'simpananggota'])->name('simpananggota')->middleware('auth');

Route::get('anggota/ubah/{id_anggota}', [AnggotaController::class, 'ubahanggota'])->name('ubahanggota')->middleware('auth');
Route::post('anggota/update', [AnggotaController::class, 'updateanggota'])->name('updateanggota')->middleware('auth');

Route::get('anggota/hapus/{id_anggota}', [AnggotaController::class, 'hapusanggota'])->name('hapusanggota')->middleware('auth');

//buku
Route::get('buku/tampil', [BukuController::class, 'tampilbuku'])->name('tampilbuku')->middleware('auth');
Route::get('buku/tambah', [BukuController::class, 'tambahbuku'])->name('tambahbuku')->middleware('auth');
Route::post('buku/simpan', [BukuController::class, 'simpanbuku'])->name('simpanbuku')->middleware('auth');

Route::get('buku/ubah/{id_buku}', [BukuController::class, 'ubahbuku'])->name('ubahbuku')->middleware('auth');
Route::post('buku/update', [BukuController::class, 'updatebuku'])->name('updatebuku')->middleware('auth');

Route::get('buku/hapus/{id_buku}', [BukuController::class, 'hapusbuku'])->name('hapusbuku')->middleware('auth');

//RIWAYAT PINJAM
Route::get('pinjam/tampil', [PinjamController::class, 'tampilpinjam'])->name('tampilpinjam')->middleware('auth');
Route::get('pinjam/tambah', [PinjamController::class, 'tambahpinjam'])->name('tambahpinjam')->middleware('auth');
Route::post('pinjam/simpan', [PinjamController::class, 'simpanpinjam'])->name('simpanpinjam')->middleware('auth');
Route::get('pinjam/kembali/{id_pinjaman}', [PinjamController::class, 'kembalipinjam'])->name('kembalipinjam')->middleware('auth');
Route::post('kembali/ajukan', [PinjamController::class, 'ajukankembali'])->name('ajukankembali')->middleware('auth');

//notifikasi
Route::get('/pesan','NotifController@index');
Route::get('/pesan/sukses','NotifController@sukses');
Route::get('/pesan/peringatan','NotifController@peringatan');
Route::get('/pesan/gagal','NotifController@gagal');

Route::get('/login', function () {
    return view('login');
  });