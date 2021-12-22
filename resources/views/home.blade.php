@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('content')
    <main>
        <div class="jumbo-container">
            <img src="{{asset('img/hub.png')}}" alt="">
        </div>
    </main>
@endsection