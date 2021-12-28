<header>
    <div class="header-container">
        <div class="left">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
        </div>
        <div class="right">
            <nav>
                @foreach(config('header-links') as $item)
                    <a class="navlink {{Route::currentRouteName() === $item['href'] ? 'active' : ''}}" href="{{route($item['href'])}}">{{$item['text']}}</a>
                @endforeach
                <div class="basket">
                    <a href="{{route('cart')}}"><img src="{{asset('img/cart.png')}}" alt=""></a>
                    <p class="{{count(Cart::content()) != 0 ? 'visible' : 'hidden'}}"><strong><?php echo count(Cart::content())?></strong></p>
                </div>
            </nav>
        </div>
    </div>
</header>