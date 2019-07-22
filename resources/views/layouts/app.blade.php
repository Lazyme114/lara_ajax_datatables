<!DOCTYPE html>
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

    <link rel="stylesheet" href="{{ asset('backend/Bootstrap-4-4.1.1/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/DataTables-1.10.18/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/AutoFill-2.3.3/css/autoFill.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/Buttons-1.5.6/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/ColReorder-1.5.0/css/colReorder.bootstrap4.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('backend/jQuery-3.3.1/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('backend/Bootstrap-4-4.1.1/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/datatables.js') }}"></script>
    <script src="{{ asset('backend/DataTables-1.10.18/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('backend/Buttons-1.5.6/js/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('backend/ColReorder-1.5.0/js/colReorder.bootstrap4.js') }}"></script>
</body>
</html>
