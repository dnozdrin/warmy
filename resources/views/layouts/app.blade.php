<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            @include('partials.nav')
        </div>
    </div>
    @include('partials.messages')
    <div class="container">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </div>
</body>
</html>