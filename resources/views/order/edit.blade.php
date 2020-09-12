@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Edit Order.</p>
@endsection

@section('content')
    <form action="{{route("order.update", $order->id)}}" method="post">
        <input type="hidden" name="_method" value="patch">
        @csrf
        <div class="order">
            {{--            <label for="">Product:</label>--}}
            {{--            <select id="product_id">--}}
            {{--                @foreach($products as $product)--}}
            {{--                    <option value="{{$product->id}}">{{$product->name}}</option>--}}
            {{--                @endforeach--}}
            {{--            </select>--}}
            @foreach($order->products as $product)
                <label for="">Product:</label>
                <select name="product_id[]" id="">
                    @foreach($products as $prod)
                        @if($product->id == $prod->id)
                            <option value="{{$product->id}}"
                                    selected="{{isset($product->name) ? $prod->id == $product->id : false}}">{{$product->name}}</option>
                        @else
                            <option value="{{$prod->id}}">{{$prod->name}}</option>
                        @endif
                    @endforeach
                </select>
                <label for="">Amount:</label>
                <input type="number" name="amount[]" value="{{$product->pivot->amount}}"><br>
            @endforeach
        </div>

        <div>
{{--            {{$order}}--}}
            <label for="">Costumer:</label>
            <select name="costumer_id" id="">
{{--                @foreach($order->costumer_id as $cost)--}}
                    @foreach($costumers as $costumer)
                        @if($order->costumer->id == $costumer->id)
                            <option value="{{$order->costumer->id}}"
                                    selected="{{$order->costumer->id == $costumer->id ? $order->costumer->id : false}}">{{$order->costumer->name}}</option>
                        @else
                            <option value="{{$costumer->id}}">{{$costumer->name}}</option>
                        @endif
                    @endforeach
{{--                @endforeach--}}
            </select>
        </div>
        <div>
            <label for="">Status:</label>
            <select name="order_status" id="">
                <option value="0" selected="{{isset($order) ? $order->order_status == 0 : false}}">Pending</option>
                <option value="1" selected="{{isset($order) ? $order->order_status == 1 : false}}">Finished</option>
            </select>
        </div>
        <input type="submit" value="Submit">

        <div>
            <a href="{{ URL::previous() }}">Back</a>
        </div>
    </form>
@endsection
