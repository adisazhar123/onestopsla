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

Route::get('/admin_peminjaman', function () {
    return view('admin.peminjaman');
});

Route::get('/admin_detail_peminjaman', function () {
    return view('admin.detail_peminjaman');
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

    Route::post('items', 'ItemsController@createItem');
    Route::put('items/{id}', 'ItemsController@updateItem');
//
//});
