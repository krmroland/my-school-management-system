<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My School</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>
     window.MySchool= {!! json_encode(app("my_school")) !!}
    </script>
</head>
<body>
    <div id="app" >
        @include('layouts.nav')
        @yield('content')
    </div>

   
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
