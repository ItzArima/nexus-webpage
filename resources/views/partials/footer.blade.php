<footer>
    <div class="footer-top">
        <div class="footer-left">
            <div class="logo">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-sections-container">
                <div class="footer-links">
                @foreach(config('header-links') as $item)
                    <a class="{{Route::currentRouteName() === $item['href'] ? 'active' : ''}}" href="{{route($item['href'])}}">{{$item['text']}}</a>
                @endforeach
                </div>
            </div>
            <div class="social-links">
                <div class="social-text">
                    <h1>Hai bisogno di assistenza?</h1>
                    <h3>Contattaci sui nostri social.</h3>
                </div>
                <a href="https://discord.gg/n3Nr7twtps" target="_blank"><img src="{{asset('img/discord-brands.png')}}" alt=""></a>
                <a href="https://www.instagram.com/nexuscraft_official/" target="_blank"><img src="{{asset('img/instagram-brands.png')}}" alt=""></a>
                <a href="https://t.me/nexuscraft" target="_blank"><img src="{{asset('img/telegram-plane-brands.png')}}" alt=""></a>
            </div>
        </div>
    </div>    
    <div class="footer-bottom">
        <p>Template made with <a href="https://laravel.com">Laravel</a>.</p>
        <p>All rights reserved by &copy; <a href="">NexusCraft</a> 2013-<?php echo(date('Y'));?></p>
    </div>
</footer>