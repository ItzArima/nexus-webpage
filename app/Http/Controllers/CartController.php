<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cart as Cart;
use Illuminate\Support\Facades\Route;

class CartController extends Controller
{
    public function removeItem($id){
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
    }

    public function addItem($id,$name,$price){
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
    }

    public function reset(){
        Cart::destroy();
        return view('store');
    }
}
