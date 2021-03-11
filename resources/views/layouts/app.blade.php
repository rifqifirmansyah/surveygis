<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
            rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
        @livewireStyles

    </head>

    <body>
        <div class="app" id="app">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container">
                    <img class="logo" src="{{ asset('img/logo.png') }}">
                    
                    <ul class="navbar-nav ml-auto">
                        <a class="nav" href="{{('/data-survey')}}">Data Survey</a>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Halo, {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <main>
                @yield('content')
                {{ isset($slot) ? $slot : null }}
            </main>

            <footer class="bg-dark text-white text-md-start">
                <div class="container p-4">
                    <div class="row">
                        <div class="">
                            <div id="footer">
                                <img class="logo" src="{{ asset('img/logo.png') }}">
                                <p class="mt-3">Jl. Parangtritis 97 RT 57 RW 15, Brontokusuman, Mergangsan, DI
                                    Yogyakarta
                                    55143</p>
                                <p>Telp : (0274) 6055655</p>
                                <p>WA Area Jogja : 00000000000</p>
                                <p class="mt-3">Email : Cs@LifeMedia.id </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        <a class="text-white">Build With Love by UMY Intern Team</a>
                    </div>
            </footer>
        </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
        <script>
            AOS.init({
                duration: 1000,
            });
        </script>
        @stack('scripts')

    </body>

</html>