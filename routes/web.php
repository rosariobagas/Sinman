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
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/rankingMakanan', 'RekomendasiController@ranking');

Route::get('/profile/updateProfile', function () {
    return view('updateProfile');
});

Route::get('/daftarMakanan/tambahMakanan', function () {
    return view('tambahMakanan');
});

Route::get('/rankingMakanan/ubahKriteria', function () {
    return view('ubahKriteria');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/menuHarian', function () {
    $makanan = DB::table('makanan')->get();
    return view('menuHarian', ['makanan' => $makanan]);
});

Route::get('/daftarMakanan', function(){
    $makanan = DB::table('makanan')->get();

    return view('daftarMakanan', ['makanan' => $makanan]);
});



Route::get('/logout', 'profileController@logOut');


Route::get('/daftar', function () {
    return view('daftar');
});
Route::get('/daftarMakanan/{id}', 'MakananController@makanan')->name('makanan');
Route::get('/daftarMakanan/{id}/edit', 'MakananController@linkMakanan')->name('editMakanan');
Route::get('/daftarMakanan/{id}/hapus', 'MakananController@hapusMakanan');
Route::post('/daftarMakanan/{id}/edit/updateMakanan', 'MakananController@updateMakanan')->name('updateMakanan');
Route::post('/daftarMakanan/tambahMakanan/proses', 'MakananController@tambahMakanan')->name('tambahMakanan');

Route::post('/menuHarian/proses', 'MenuController@tambahMenu')->name('tambahMenu');

Route::post('/rankingMakanan/ubahKriteria/proses', 'RekomendasiController@index')->name('kriteria');

Route::post('/tambah', 'profileController@tambah')->name('tambah');
Route::post('/profile/updateProfile/proses', 'profileController@updateUser')->name('updateUser');
Route::post('/loginPost', 'profileController@loginPost')->name('loginPost');
