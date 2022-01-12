<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;
class PagesController extends Controller
{
    public function home(){
        return view('home');
    }

    public function regole(){
        return view('regole');
    }

    public function store(){
        return view('store');
    }

    public function vota(){
        return view('vota');
    }

    public function ban(){
        return view('ban');
    }

    public function cart(){
        $items = DB::table('carts')->where('userId',Auth::user()->id)->get();
        $total = 0;
        foreach(config('productsList') as $product){
            foreach($items as $item){
                if($item->productId == $product['id']){
                    $total = $total + $product['currentprice'];
                }
            }
        }
        $total = number_format((float) $total, 2 , '.' , ',');
        return view('stores.cart', compact('total'));
    }
}
