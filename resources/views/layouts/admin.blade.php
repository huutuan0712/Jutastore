<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    {{-- bootrap --}}
   
    <!-- Styles -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
   
    <link href="{{ asset('admin/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   
    <div class="wrapper">
        @include('layouts.inc.sidebar')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
        <!-- Scripts -->
        <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
            <script>
                swal("{{session('status')}}");
            </script>
        @endif
        @yield('scripts')
</body>
</html>
