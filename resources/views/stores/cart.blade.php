

@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

@section('content')
<main>
    <div class="cart-container">
        <div class="cart">
            @if(count(Cart::content()) == 0)
                <div class="left">
                    <div class="text">
                        <h1>Sembra che non ci sia nulla nel tuo carrello</h1>
                    </div>
                </div>
                <div class="right">
                    <div class="continue">
                        <a href="{{route('store')}}">continua a fare acquisti</a>
                    </div>
                </div>
            @else
                <div class="left">
                    @foreach(Cart::content() as $item)
                        <?php
                            if(!isset($total)){
                                $total = 0;
                            } 
                            $total = $total + $item->price; 
                            $total = number_format((float)$total, 2, '.', '');
                        ?> 
                        <div class="product">
                            <div class="name">
                                <h2>{{$item->name}}</h2>
                            </div>
                            <div class="price">
                                <h3>{{$item->price}}</h3>
                                <span>EUR</span>
                            </div>
                            <a href="{{route('remove' , $item->rowId)}}">Rimuovi dal Carrello</a>
                        </div>
                    @endforeach
                </div>
                <div class="right">
                    <div class="totale">
                        <h1>Totale: </h1>
                        <div class="price">
                            <h3>{{$total}}</h3>
                            <span>EUR</span>
                        </div>
                    </div>
                    <div class="continue">
                        <a href="{{route('store')}}">continua a fare acquisti</a>
                    </div>
                </div>
            @endif
        </div>
        
    </div>
</main>
@endsection

@section('scripts')
    <script>
        document.querySelector('.basket').classList.add('active');
    </script>
@endsection


