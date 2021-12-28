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

Route::get('/store', function () {
    $text = '';
    return view('store' , compact('text'));
})->name('store');

Route::get('/vota', function () {
    return view('vota');
})->name('vota');

Route::get('/ban', function () {
    return view('ban');
})->name('ban');

Route::get('/test', function () {
    return view('stores.test');
})->name('test');

Route::get('add{id}.{name}.{price}', function($id,$name,$price){
    $check = 0;
    $text = '';
    foreach(Cart::content() as $item){
        if($item->id == $id){
            $check = 1;
            $text = "already in cart";
            return view('store' , compact('text'));
        }
    }
    foreach(config('stores') as $product){
        if($product['id'] == $id && $product['price'] !== $price){
            $check = 1;
            $text = 'pls do not change parameters';
            return view('store' , compact('text'));
        }
    }
    if($check==0){
        Cart::add($id,$name,1,$price,0);

        return view('stores.cart');
    }
})->name('add');

Route::get('cart', function(){
    return view('stores.cart');
})->name('cart');

Route::get('reset', function(){
    Cart::destroy();
    return view('store');
})->name('reset');
