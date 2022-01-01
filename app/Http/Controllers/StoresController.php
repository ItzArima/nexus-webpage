<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function modSelection($mod){
        foreach(config('stores') as $store){
            if($store['mod'] == $mod){
                $categories = $store['categories'];
                $toshop = 1;
                return view('store', compact('categories' , 'mod' , 'toshop'));
            }
        }
    }

    public function catSelection($mod,$selection){
        foreach(config('stores') as $store){
            if($store['mod'] == $mod){
                $categories = $store['categories'];
                foreach($categories as $key=>$products){
                    if($key == $selection){
                        $toshop = 1;
                        return view('store' , compact('products' , 'categories' , 'mod' , 'selection' , 'toshop'));
                    }
                }
            }
        }
    }
}
