<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- icon => fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <!-- vue.js, bootstrap -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- MDB bootstrap-->
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
        <!-- MDB Script -->
        <script src="{{ asset('js/mdb.umd.min.js') }}" defer></script>

        <!-- content css -->
        <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home/content.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modalMDB.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cursor.css') }}">
    </head>
    <body id="app">
    </body>
</html>
