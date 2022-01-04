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

Route::get('/home', 'PagesController@home')->name('home');
Route::get('/', 'PagesController@home')->name('home');

Route::get('/regole', 'PagesController@regole')->name('regole');

Route::get('/store', 'PagesController@store')->name('store');

Route::get('/vota', 'PagesController@vota')->name('vota');

Route::get('/ban', 'PagesController@ban')->name('ban');

Route::get('add/{id}/{name}/{price}', 'CartController@addItem')->name('add');

Route::get('basket', 'PagesController@cart')->name('basket');

Route::get('reset', 'CartController@reset')->name('reset');

Route::get('remove.{id}', 'CartController@removeItem')->name('remove');

Route::get('store/{mod}' , 'StoresController@modSelection')->name('modSelection');

Route::get('store/{mod}/{selection}' , 'StoresController@catSelection')->name('catSelection');

Auth::routes();

Route::get('/test' ,  function(){
    return view('layouts.app');
});

Route::resource('cart', 'ProductsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
