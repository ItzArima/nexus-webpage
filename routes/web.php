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
    $text = 'no errors';
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

Route::get('add/{id}/{name}/{price}', function($id,$name,$price){
    $check = 0;
    $text = 'no errors';
    foreach(config('stores') as $product){
        foreach($product['categories'] as $category){
            foreach($category as $product){
                if($product['id'] == $id && $product['currentprice'] !== $price){
                    $text = 'pls do note change the parameters 1';
                    $check = 1;
                    return view('store' , compact('text'));
                }
                else if($product['id'] == $id && $product['name'] !== $name){
                    $text = 'pls do note change the parameters 2';
                    $check = 1;
                    return view('store' , compact('text'));
                }
            }
        }
    }
    foreach(Cart::content() as $item){
        if($item->id == $id){
            $check = 1;
            $text = "already in cart";
            return view('store' , compact('text'));
        }
    }
    if($check==0){
        Cart::add($id,$name,1,$price,0);
        return view('store');       
    }
})->name('add');

Route::get('cart', function(){
    return view('stores.cart');
})->name('cart');

Route::get('reset', function(){
    Cart::destroy();
    return view('store');
})->name('reset');

Route::get('remove.{id}', function($id){
    $check = 0;
    foreach(Cart::content() as $item){
        if($item->rowId == $id){
            $check = 1;
            Cart::remove($id);
            return view('stores.cart');
        }
    }
    if($check == 0){
        return view('stores.cart');
    }
})->name('remove');

Route::get('store/{mod}' , function($mod){
    foreach(config('stores') as $store){
        if($store['mod'] == $mod){
            $categories = $store['categories'];
            return view('store', compact('categories' , 'mod'));
        }
    }
})->name('modSelection');

Route::get('store/{mod}/{selection}' , function($mod,$selection){
    foreach(config('stores') as $store){
        if($store['mod'] == $mod){
            $categories = $store['categories'];
            foreach($categories as $key=>$products){
                if($key == $selection){
                    return view('store' , compact('products' , 'categories' , 'mod' , 'selection'));
                }
            }
        }
    }
})->name('catSelection');
