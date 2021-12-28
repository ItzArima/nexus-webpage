@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/vota.css')}}">

@section('content')
    <main>
        <div class="jumbo">
            <img src="{{asset('img/vote-banner.jpg')}}" alt="">
            <h1>VOTACI</h1>
        </div>
        <div class="vote-links-container">
            <div class="vote-container">
                <div class="vote-link">
                    <a href="https://www.minecraft-italia.it/server/nexuscraftnetwork" target="_blank"><img src="{{asset('img/mp.png')}}" alt=""></a>
                </div>
                <a class="title" href=""><h1>Minecraft MP</h1></a>
            </div>
            <div class="vote-container">
                <div class="vote-link">
                    <a href="https://www.minecraft-italia.it/server/nexuscraftnetwork" target="_blank">
                        <img src="{{asset('img/mcita-bg.jpg')}}" alt="">
                        <img class="absolute" src="{{asset('img/mcita-logo.jpg')}}" alt="">
                    </a>
                </div>
                <a class="title" href=""><h1>Minecraft Italia</h1></a>
            </div>    
        </div>
        <div class="your-vote">
            <h2>Il tuo Voto è Importante!</h2>
        </div>
    </main>
@endsection