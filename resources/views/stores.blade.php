@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/store.css')}}">

@section('content')
<main>
    <div class="jumbo">
        <img src="{{asset('img/shop-banner.jpg')}}" alt="">
        <h1>Il Nostro Store</h1>
    </div>
    <div class="server-stores-container">
        @foreach (config('servers') as $key => $server)
            <div class="card">
                <a href="{{route('shop', ['id' => $key , 'server' => $server['title']])}}"></a>
                <div class="card-top">
                    <h2 style="color:{{$server['theme']}};">{{$server['title']}}</h2>
                </div>
                <div class="card-bottom">
                    <h1 style="color:{{$server['theme']}};">store</h1>
                </div>
            </div>
        @endforeach
    </div>
    <div class="payments">
        <h1>Pagamenti sicuri grazie a</h1>
        <a href="http://paypal.com/" target="_blank"><img src="{{asset('img/paypal.png')}}" alt=""></a>
    </div>
</main>
@endsection