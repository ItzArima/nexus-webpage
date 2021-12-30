<div class="servers-container" id="servers">
    <div class="servers-banner">
        <img src="{{asset('img/banner.jpg')}}" alt="">
        <h1>Le Nostre Modalita'</h1>
        <img class="animation" src="{{asset('img/animation.gif')}}" alt="">
    </div>
    <div class="server-cards">
        @foreach (config('servers') as $server)
            <div class="col" ontouchstart="this.classList.toggle('hover');">
                <input type="checkbox" id="{{$server['id']}}">
                <label for="{{$server['id']}}">
                <div class="container">
                    <div class="front" style="background-image: url({{asset($server['image'])}});">
                        <div class="inner">
                            <h1 style="color: {{$server['theme']}}">{{$server['title']}}</h1>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                        <p>{{$server['desc']}}</p>
                        </div>
                    </div>
                </div></label>
            </div>
        @endforeach
    </div>
</div>

<script>
    let server = document.getElementsByClassName("server");
    for(let i=0;i<server.length;i++){
        if(i%2 === 0){ 
            server[i].classList.add("reverse");
        }
    }
</script>
