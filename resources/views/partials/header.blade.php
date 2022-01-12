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
                        <p id="navbarDropdown" class="nav-link dropdown-toggle">
                            {{ Auth::user()->name }} <span><img src="{{asset('img/chevron-down-solid.svg')}}" alt="" class="chevron"></span>
                        </p>
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
                </nav>
                <div class="basket">
                    <a href="{{route('basket')}}"><img src="{{asset('img/cart.png')}}" alt=""></a>
                    @if(DB::table('carts')->where('userId',Auth::user()->id)->count() > 0)
                        <p>{{DB::table('carts')->where('userId',Auth::user()->id)->count()}}</p>
                    @endif    
                </div>
            @endguest
        </div>
    </div>
</header>

<script>
    let element = document.getElementById('navbarDropdown');
    let chevron = document.querySelector('.chevron');
    let dropdown = document.querySelector('.dropdown');
    if(element != null){
        element.addEventListener('click' , function(){
            if(dropdown.classList.contains('display')){
                dropdown.classList.remove('display');
                chevron.classList.remove('rotate');
            }
            else{
                dropdown.classList.add('display');
                chevron.classList.add('rotate');
            }
        })
    }
</script>