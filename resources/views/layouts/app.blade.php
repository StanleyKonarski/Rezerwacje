<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Other Links (Datepicker) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Domki Niechorze</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                                </li>
                            @endif
                        @else
                            @can('isAdmin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/home') }}">Panel Administracyjny</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/view-up-res') }}">Nadchodzące rezerwacje</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/archiwum') }}">Archiwum</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="">Statystyki</a>
                                </li>
                            @elsecan('isUser')
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/home') }}">Mój Panel</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/view-up-res-u') }}">Moje rezerwacje</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/add') }}">Zarezerwuj</a>
                                </li>
                             @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Wyloguj się
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--
        <main class="py-4">
            @yield('content')
        </main>
    -->
    </div>
<!--</body>
</html> -->
