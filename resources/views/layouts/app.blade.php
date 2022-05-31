<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <header class="bg-light p-3 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="header-logo">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'JUTA') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex justify-content-between align-items-center">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{url('category')}}">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{url('cart')}}">Cart</a>
                            </li>
                          
                        </ul>
        
                        <div class="d-flex align-items-center ">
                            <div class="cart p-4">
                                <a href="cart.php" class="text-decoration-none fs-5" style="color:  black;" >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="badge bg-dark rounded-pill"></span>
                                </a>
                            </div>
                            @if (Route::has('login'))
                            <div class="d-flex">
                                @auth
                                    {{-- <a href="{{ url('/home') }}" class="nav-link">Home</a> --}}
                                @else
                                    <button class="btn">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </button>

                                    @if (Route::has('register'))
                                        <button class="btn">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </button>
                                    @endif
                                @endauth
                            </div>
                        @endif
                          
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <!-- Scripts -->
        
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
</body>
</html>
