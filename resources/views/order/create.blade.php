@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>Create Order.</p>
@endsection

@section('content')
    @foreach ($errors->all() as $message)
        <p>{{$message}}</p>
    @endforeach
    <form action="{{route("order.store")}}" method="post">
        @csrf
        @include("order.form")
    </form>
    <div>
        <a href="{{ URL::previous() }}">Back</a>
    </div>
@endsection
