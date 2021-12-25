<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/regole', function () {
    return view('regole');
})->name('regole');

Route::get('/stores', function () {
    return view('stores');
})->name('stores');

Route::get('/vota', function () {
    return view('vota');
})->name('vota');

Route::get('/ban', function () {
    return view('ban');
})->name('ban');

Route::get('/stores/shop/{name}{id}', function ($id,$name) {
    return view('stores.shop',compact('name','id'));
})->name('shop');
