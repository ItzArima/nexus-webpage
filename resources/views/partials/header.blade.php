<header>
    <div class="header-container">
        <div class="left">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
        </div>
        <div class="right">
            <nav>
                <div class="app-links">
                @foreach(config('header-links') as $item)
                    <a class="navlink {{Route::currentRouteName() === $item['href'] ? 'active' : ''}}" href="{{route($item['href'])}}">{{$item['text']}}</a>
                @endforeach
                </div>
                @guest
                <div class="login">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
                @else
                    <div class="authenticated">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                       </div>
                    </div>
                    <div class="basket">
                        <a href="{{route('basket')}}"><img src="{{asset('img/cart.png')}}" alt=""></a>
                        @if(DB::table('carts')->where('userId',Auth::user()->id)->count() > 0)
                            <p>{{DB::table('carts')->where('userId',Auth::user()->id)->count()}}</p>
                        @endif    
                    </div>
                @endguest
            </nav>
        </div>
    </div>
</header>

<script>
    let element = document.getElementById('navbarDropdown');
    let dropdown = document.querySelector('.dropdown');
    element.addEventListener('click' , function(){
        if(dropdown.classList.contains('display')){
            dropdown.classList.remove('display');
        }
        else{
            dropdown.classList.add('display');
        }
    })
</script>