@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('scripts')
<script src="https://mcapi.us/scripts/minecraft.min.js"></script>
<script src="{{asset('js/onlinePlayers.js')}}"></script>

@section('content')
    <main>
        <div class="home-links">
            <div class="links-centered">
                <a href="#servers">Modalita'</a>
                <a href="#social">Social</a>
                <a href="#staff">Staff</a>
            </div>
        </div>
        <div class="jumbo-container">
            <img src="{{asset('img/hub.png')}}" alt="">
            <div class="jumbo-text">
                <h1>NexusCraft</h1>
                <h3>Network</h3>
            </div>
            <div class="server-infos">
                <h3>Giocatori Online: <em id="onlinePlayers"></em></h3>
                <h3>Server IP: <em>mc.nexuscraft.it</em></h3>
                <h3>Stato Server: <em id="status"></em></h3>
            </div>
        </div>
        @include('sub-extensions.servers')
        @include('sub-extensions.social')
        @include('sub-extensions.carousel')
    </main>
@endsection