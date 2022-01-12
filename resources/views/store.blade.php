@extends('layout.app')

@section('CSS')
<link rel="stylesheet" href="{{asset('css/store.css')}}">

@section('content')
<main>
    <div class="jumbo">
        <img src="{{asset('img/shop-banner.jpg')}}" alt="">
        <h1>Il Nostro Store</h1>
    </div>
    <div class="shop-container">
        <div class="products-container">
            <div class="server-selection"  id="shop">
                <div class="selection-centered">
                    @foreach(config('stores') as $server)
                        <a href="{{route('modSelection' , ['mod' => $server['mod']])}}">{{$server['mod']}}</a>   
                    @endforeach
                </div>
            </div>
            <div class="shop-viewport">
                @if(isset($products))
                    <div class="back">
                        <a href="{{route('modSelection' , ['mod' => $server['mod']])}}">Go Back</a>
                    </div>
                @endif    
                <div class="products-viewport">
                @guest
                    <div class="shop-start-page">
                        <img src="{{asset('img/shop_start.jpg')}}" alt="">
                        <div class="text">
                            <h1>Esegui l'accesso per proseguire</h1>
                        </div>
                    </div>
                @else
                    @if(!isset($categories))
                        <div class="shop-start-page">
                            <img src="{{asset('img/shop_start.jpg')}}" alt="">
                            <div class="text">
                                <h1>Seleziona una Modalità</h1>
                            </div>
                        </div>
                    @elseif(isset($categories) && !isset($products))
                        <h1 class="sel-title">Seleziona La Categoria</h1>
                        <div class="category-selector">
                            @foreach($categories as $key => $category)
                                <div class="category">
                                    <div class="title">
                                        <h2>{{$key}}</h2>
                                    </div>
                                    <a href="{{route('catSelection' , ['mod' => $mod , 'selection' => $key])}}" ></a>
                                    <div class="hover">
                                        <h3>Seleziona</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif 
                    @if(isset($products))
                        @foreach($products as $product)
                            <div class="product">
                                <div class="image">
                                    <img src="{{asset($product['image'])}}" alt="">
                                </div>
                                <h2>{{$product['name']}}</h2>
                                <div class="price">
                                    @if($product['fullprice'] != '')
                                        <p>{{$product['fullprice']}}</p>
                                    @endif
                                    <h3>{{$product['currentprice']}}</h3>
                                    <span>{{$product['currency']}}</span>
                                </div>
                                <form action="{{url('cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="productId" value="{{$product['id']}}">
                                    <button type="submit">Aggiungi al carrello</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                @endif    
                </div>
            </div>
        </div> 
    </div>
    @if(isset($text))
        <div class="error-popup" id="error">
            <p>error handler: {{$text}}</p>
        </div>
    @endif
</main>
@endsection

@section('scripts')
@if(isset($text))
    <script>
        setTimeout(remove=>{
            document.getElementById('error').classList.add('none')
        },5000)
    </script>
@endif

@if(isset($toshop))
    <script>
        window.scrollTo(0 , 416)
    </script>
@endif
<script>
    let navlink = document.getElementsByClassName('navlink');
    navlink[2].classList.add('active');
    let card = document.getElementById('total')
    let value = 0;
</script>    
@endsection
