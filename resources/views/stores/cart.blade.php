

@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

@section('content')
<main>
    <div class="cart-container">
        <div class="cart">
            @if(DB::table('carts')->where('userId' , Auth::user()->id)->count() == 0)
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
                    @foreach(DB::table('carts')->where('userId' , Auth::user()->id)->get() as $item)
                        <div class="product">
                            <div class="name">
                                <h2></h2>
                            </div>
                            <div class="price">
                                <h3></h3>
                                <span>EUR</span>
                            </div>
                            <form action="{{action('ProductsController@destroy' , $item->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">Rimuovi dal carrello</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="right">
                    <div class="totale">
                        <h1>Totale: </h1>
                        <div class="price">
                            <h3></h3>
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


