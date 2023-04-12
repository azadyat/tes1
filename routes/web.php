<?php

use App\model\Mitra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/landing', function () {
    return view('user.landing');
});

Route::post('/proses-register', 'CustomerController@store')->name('store.penonton');
Route::get('/penonton', 'CustomerController@konser')->name('konser');
Route::get('/proses-delete-penonton/{id}', 'CustomerController@destroy')->name('delete_penonton');
Route::get('/proses-edit-penonton/{id}/', 'CustomerController@edit')->name('edit_penonton');
Route::put('/proses-update-penonton/{id}', 'CustomerController@update')->name('update_penonton');
Route::get('/masuk/{id}', 'CustomerController@masuk')->name('masuk');
Route::get('/data', 'PrintController@data')->name('data');
Route::get('/belum', 'PrintController@printreport')->name('belum');
Route::get('/sudah', 'PrintController@printreport1')->name('sudah');






// batass






//halaman depan
Route::get('/', 'UserController@index')->name('show_user');


Route::get('/daftar', 'CustomerController@index')->name('show_register');



// halaman admin

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\HomeController@index')->name('admin');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
