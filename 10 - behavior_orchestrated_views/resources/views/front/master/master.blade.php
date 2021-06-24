<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraDev - @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

@include('front.includes.header')
@yield('content')
@include('front.includes.footer')

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>