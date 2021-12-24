<div class="carousel-container">
    <div class="desc-container">
        <h1>I nostri <em>Staffer</em></h1>
    </div>
    <div class="gallery js-flickity"
        data-flickity-options='{ "wrapAround": true }'>
        @foreach (config('staff') as $staffer)
            <div class="gallery-cell">
                <img src="{{asset($staffer['avatar'])}}" width="30%" />
                <div class="cell-text">
                    <h1>{{$staffer['nick']}}</h1>
                    <h3>{{$staffer['role']}}</h3>
                </div>
            </div>
        @endforeach
    </div>
</div>

