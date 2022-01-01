<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('stores.cart');
    }
}
