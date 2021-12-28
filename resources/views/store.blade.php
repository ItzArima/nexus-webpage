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
        <div class="left">
            <div class="products-container">
                @foreach(config('stores') as $key => $product)
                    <div class="product">
                        <h1>{{$product['title']}}</h1>
                        <p>{{$product['price']}}</p>
                        
                        <form action="{{route('add', ['id' => $product['id'] ,'name' => $product['title'], 'price' => $product['price']])}}" method="GET">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </div>
                @endforeach
            </div>  
        </div>  
        <div class="right">
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <p>numero prodotti: <?php echo count(Cart::content())?></p>
            <p>error handler: {{isset($text) ? $text : 'no errors'}}</p>
            <a href="{{route('reset')}}" style="color:red; text-decoration:none;"><h1>reset cart</h1></a>
        </div>
    </div>
</main>
@endsection

@section('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=AU8LBwK9_UZ33DlNxakVespnI40Xdlw2C_qIKelfP7D8PycnMjJ3XzMNMkwG1ZhxRN5P3Ci5G33rXjj-&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    let navlink = document.getElementsByClassName('navlink');
    navlink[2].classList.add('active');
    let card = document.getElementById('total')
    let value = 0;
    
    function select(price,id){
        value = price
        console.log(value)
        card.innerHTML = value;
        console.log(id)
        let product = document.getElementsByClassName('product')
        for(let i=0;i<product.length;i++){
            if(product[i].classList.contains('active')){
                product[i].classList.remove('active')
            }
        }
        product[id].classList.add('active')
    }

    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'horizontal',
          label: 'buynow',
          
        },

        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    "amount":{
                        "value":value
                    }
                }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                
                // Full available details
                window.alert('Pagamento completato')
            });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();

    
        
    
</script>

@endsection
