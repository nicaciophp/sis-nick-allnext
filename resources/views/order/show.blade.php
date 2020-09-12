<b>Amount:</b>{{$order->products->sum(function ($product) {
                        return $product->pivot->amount;
                        })
                    }}<br>
<b>Product:</b>
{{--    {{$order->products}}--}}
    @foreach($order->products as $ord)
        <li>{{$ord->name." - ".$ord->pivot->amount}}</li>
    @endforeach
<br>
    <b>Costumer:</b>{{$order->costumer->name}}<br>
    <b>Total:</b>{{$order->products->sum(function ($product) {
                        return $product->pivot->amount * $product->value;
                        })
                    }}
