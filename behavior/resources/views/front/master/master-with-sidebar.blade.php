<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LaraDev - @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @hasSection('css')
            @yield('css')
        @endif
    </head>
<body>

@include('front.includes.header')

    <div class="container py-3">
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-4">
                {{-- @yield('sidebar') --}}
                @section('sidebar')
                    <h1>Ultimos Postados</h1>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Adipisci saepe neque et impedit?</li>
                        <li>Expedita voluptatibus quisquam ipsam omnis.</li>
                        <li>In at rem fugiat illo?</li>
                        <li>Necessitatibus ipsa expedita officiis nemo.</li>
                    </ul>
                @show
            </div>
        </div>
    </div>

@include('front.includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>

@hasSection('js')
    @yield('js')
@endif
</body>
</html>