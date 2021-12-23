@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@section('scripts')
<script src="https://mcapi.us/scripts/minecraft.min.js"></script>
<script src="{{asset('js/onlinePlayers.js')}}"></script>

@section('content')
    <main>
        <div class="jumbo-container">
            <img src="{{asset('img/hub.png')}}" alt="">
            <div class="jumbo-text">
                <h1>NexusCraft</h1>
                <h3>Network</h3>
            </div>
            <div class="online-players-container">
                <h3>Giocatori Online: <em id="onlinePlayers"></em></h3>
            </div>
        </div>
    </main>
@endsection