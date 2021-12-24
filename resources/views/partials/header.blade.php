<header>
    <div class="header-container">
        <div class="left">
            <div class="logo">
                <a href="#"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
        </div>
        <div class="right">
            <nav>
                @foreach(config('header-links') as $item)
                    <a class="{{Route::currentRouteName() === $item['href'] ? 'active' : ''}}" href="{{route($item['href'])}}">{{$item['text']}}</a>
                @endforeach
            </nav>
        </div>
    </div>
</header>