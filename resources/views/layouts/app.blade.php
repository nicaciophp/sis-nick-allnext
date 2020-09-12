<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('styles/app.css') }}">
    <script src="{{URL::asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
</head>
<body>
@section('sidebar')
    <h1>Nick products system.</h1>
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
