<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    {{--  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">  --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div id="app">
        <!-- nav -->
        @include('partials/nav')
        <!-- nav end -->

        <main class="py-4">
            @yield('content')
        </main>

        <!-- footer -->
        @include('partials/footer')
        <!-- footer end -->

    </div>

    {{--  <script src="{{ asset('js/plugins/jquery-3.4.1.min.js') }}" defer></script>  --}}
    <script src="{{ asset('js/plugins/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/jquery.slimScroll.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/imagesloaded.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/isotope.pkgd.min.js') }}" defer></script>
    {{--  <script src="{{ asset('js/plugins/slick.min.js') }}" defer></script>  --}}
    <script src="{{ asset('js/plugins/main.js') }}" defer></script>
    <script src="{{ asset('js/plugins/material-components-web.min.js') }}" defer></script>

</body>
</html>
