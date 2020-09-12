@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>List Product.</p>
@endsection

@section('content')
    <a href="{{route('products.create')}}">Create</a>
    <form action="{{route("products.index")}}" method="get">
        @csrf
        <label for="">Search:</label>
        <input type="text" name="search">
        <input type="submit" value="Pesquisar">
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Photo</th>
            <th>Value</th>
            <th>Category</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach($products as $prod)
            <tr>
                <td>{{ $prod->name }}</td>
                <td>{{ $prod->description }}</td>
                <td>{{ $prod->amount }}</td>
                <td>{{ $prod->photo }}</td>
                <td>{{ $prod->value }}</td>
                <td>{{ $prod->category->name }}</td>
                <td><a href="{{ route('products.show', $prod->id )}}">View</a></td>
                <td><a href="{{ route('products.edit', $prod->id )}}">Edit</a></td>
                <td>
                    <form action="{{route('products.destroy', $prod->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
{{--    Mostra a paginação--}}
   {{$products->links()}}
@endsection
