@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Create Product.</p>
@endsection

@section('content')
    @foreach ($errors->all() as $message)
    <p>{{$message}}</p>
    @endforeach
    <form action="{{route("products.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        @include("product.form")
    </form>
    <div>
        <a href="{{ URL::previous() }}">Back</a>
    </div>
@endsection
