@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Edit Product.</p>
@endsection

@section('content')
    <form action="{{route("products.update", $product->id)}}" method="post">
        <input type="hidden" name="_method" value="patch">
        @csrf
        @include("product.form")
        <div>
            <a href="{{ URL::previous() }}">Back</a>
        </div>
    </form>
@endsection
