<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function modSelection($mod){
        foreach(config('stores') as $store){
            if($store['mod'] == $mod){
                $categories = $store['categories'];
                return view('store', compact('categories' , 'mod'));
            }
        }
    }

    public function catSelection($mod,$selection){
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
    }
}
