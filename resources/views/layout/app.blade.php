<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nexuscraft</title>
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Custom CSS -->
        @yield('CSS')

        <!-- Carousel Style -->
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css" />

        <!-- Carousel Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"> </script>

    </head>
    <body>
        <!-- Header -->
        @include('partials.header')

        <!-- Main -->
        @yield('content')

        <!-- Footer -->
        @include('partials.footer')

        <!-- Scripts -->
        @yield('scripts')
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
</html>