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
    </body>
</html>