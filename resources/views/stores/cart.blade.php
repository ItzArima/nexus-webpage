@foreach(Cart::content() as $item)
    <h1>name: {{$item->name}}</h1>
    <h1>id: {{$item->id}}</h1>
    <h1>price: {{$item->price}}</h1>
@endforeach

<a href="{{route('store')}}">Continua a fare acquisti</a>