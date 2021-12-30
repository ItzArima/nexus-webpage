

@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

@section('content')
<main>
    <div class="cart-container">
        <div class="cart">
            @if(count(Cart::content()) == 0)

            <h1>Seems that you have no products in your cart</h1>
            @else
            @foreach(Cart::content() as $item)
                <div class="product-row">
                    <div class="name">
                        <h1>name: {{$item->name}}</h1>
                    </div>
                    <div class="id">
                        <h1>id: {{$item->id}}</h1>
                    </div>
                    <div class="price">
                        <h1>price: {{$item->price}}</h1>
                    </div>
                    <a href="{{route('remove' , $item->rowId)}}">remove</a>
                </div>
            @endforeach
            @endif
        </div>
        <div class="checkout">
            <a href="{{route('store')}}">continua a fare acquisti</a>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        document.querySelector('.basket').classList.add('active');
    </script>
@endsection


