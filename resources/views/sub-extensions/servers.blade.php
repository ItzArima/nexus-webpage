<div class="servers-container">
    <div class="servers-banner">
        <img src="{{asset('img/banner.jpg')}}" alt="">
        <h1>Le Nostre Modalita'</h1>
        <img class="animation" src="{{asset('img/animation.gif')}}" alt="">
    </div>
    @foreach (config('servers') as $server)
        <div class="server">
            <img src="{{asset($server['image'])}}" alt="">
            <div class="server-text-container">
                <div class="card">
                    <h1 style="color:{{$server['theme']}};">{{$server['title']}}</h1>
                    <p><strong>{{$server['desc']}}</strong></p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    let server = document.getElementsByClassName("server");
    for(let i=0;i<server.length;i++){
        if(i%2 === 0){ 
            server[i].classList.add("reverse");
        }
    }
</script>
