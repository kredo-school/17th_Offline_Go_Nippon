<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&family=Kosugi+Maru&family=Nunito:wght@400;600&display=swap" rel="stylesheet">


    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Font Awesome -->
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>

{{-- Google Fontsの Source Serif Pro --}}
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">

{{-- Leaflet  --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- D3.js --}}
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm fixed-top py-1" style="background-color:#fbefe5;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/image_480.png') }}" alt="Logo" width="50" class="me-2">
                    <span class="brand-text fw-bold fs-1 ms-2">Go Nippon!</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center gap-1">
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        {{-- @else --}}
                                <li class="nav-item">
                                <a href="" class="nav-link fs-2" style="color:#9F6B46;">
                                    <i class="fa-solid fa-circle-plus"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link fs-2" style="color:#9F6B46;">
                                    <i class="fa-regular fa-comment "></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link fs-3" style="color:#9F6B46;">
                                    <i class="fa-regular fa-heart fa-lg"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <button class="btn shadow-none nav-link d-flex align-items-center"
                                    id="account-dropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color:#9F6B46;">
                                    {{-- @if (Auth::user()->avatar) --}}
                                        <img src="https://placehold.co/40x40" class="rounded-circle" alt="user">
                                    {{-- @else --}}
                                        {{-- <i class="fa-solid fa-circle-user"></i> --}}
                                    {{-- @endif --}}
                                </button>

                                <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-2"
                                    aria-labelledby="account-dropdown">
                                    {{-- @can('admin') --}}
                                        <a href="#" class="dropdown-item"><i class="fa-solid fa-lock me-2"></i></i>Admin</a>
                                    {{-- @endcan --}}

                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item"><i class="fa-solid fa-user me-2"></i>Profile</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" class="dropdown-item text-danger"><i
                                            class="fa-solid fa-right-from-bracket me-2"></i> {{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>
                                    <a href="#" class="dropdown-item"><i class="fa-solid fa-toggle-on me-2"></i>Notification</a>
                                </div>
                            </li>
                        {{-- @endguest --}}
                    </ul>
                </div>  
            </div>
        </nav>

        <main class="mt-5 py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
