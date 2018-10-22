<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" type="image/ico" href="{{ asset('') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('') }}">

    <!-- Styles -->
    @yield('css')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
