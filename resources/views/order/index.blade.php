@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>List Orders.</p>
@endsection

@section('content')
    {{--    {{$name}}--}}
    <a href="{{route('order.create')}}">Create</a>
    <table>
        <tr>
            <th>Status</th>
            <th>Costumer</th>
            <th>Prorduct</th>
            <th>Total</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tbody>


        @foreach($orders as $order)
            <tr>
                @if($order->order_status == 0)
                    <td>Pending</td>
                @else
                    <td>Finished</td>
                @endif
                <td>{{$order->costumer->name}}</td>
                <td>
                    {{--        <p>{{$order->products->name}}</p>--}}
                    @foreach($order->products as $product)
                        <li>{{$product->name . ' - '. $product->pivot->amount . ' - ' . $product->value}}</li>
                    @endforeach
                </td>
                <td>
                    {{$order->products->sum(function ($product) {
                        return $product->pivot->amount * $product->value;
                        })
                    }}
                </td>
                <td><a href="{{ route('order.show', $order->id )}}">View</a></td>
                <td><a href="{{ route('order.edit', $order->id )}}">Edit</a></td>
                    <td>
                        <form action="{{route('order.destroy', $order->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
            </tr>
        @endforeach


        </tbody>
    </table>
    {{--    Mostra a paginação--}}
    {{$orders->links()}}
@endsection
