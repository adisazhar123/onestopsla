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

Route::get('/admin_dashboard', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->group(function() {
    Route::get('/peminjaman', 'PagesController@adminLendsPage')->name('admin.manage.lends');

    Route::get('detail_peminjaman', function () {
        return view('admin.detail_peminjaman');
    });
});




Route::get('/admin_complaints', function () {
    return view('admin.complaints');
});

Route::get('/admin_detail_complaint', function () {
    return view('admin.detail_complaint');
});


//Items Route
//TODO: Add middleware

//Route::prefix('admin')->group(function() {
    Route::get('items', 'ItemsController@allItems');
    Route::get('available-items', 'ItemsController@getAvailableItems');
    Route::post('items', 'ItemsController@createItem');
    Route::put('items/{id}', 'ItemsController@updateItem');
//
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('peminjam')->group(function() {
   Route::get('barang', 'PeminjamsController@getAvailableAllItems');
});
