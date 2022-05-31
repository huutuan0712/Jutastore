<header class="bg-light p-3 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="header-logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        JUTA
                    </a>
                </div>
            </div>
            <div class="col-md-8 d-flex justify-content-between align-items-center">
               <div class="search-bar">
                   <form action="{{url('searchproduct')}}" method="POST">
                    @csrf
                       <div class="input-group ">
                           <input type="search" class="form-control" id="search-product" name="product_name"  placeholder="Search">
                           <button type="submit" class="input-group-text" ><i class="fa fa-search"></i></button>
                         </div>
                   </form>
               </div>
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
                <div class="">
                    <a href="{{url('cart')}}" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge badge-pill bg-danger cart-count">0</span>
                    </a>
                </div>
                <div class="dropdown text-end">
                    @guest
             
                                @if (Route::has('login'))
                                <button class="btn">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </button>
                            @endif
                    
                            @if (Route::has('register'))
                                <button class="btn">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            @endif
                   
                    @else
                            <div class="flex-shrink-0 dropdown">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                                <li><a class="dropdown-item" href="{{url('my-orders')}}">My Orders</a></li>
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                                </ul>
                            </div>
                    @endguest
                   
                  </div>
                </div>
            </div>
        </div>
    </div>
</header>
    
