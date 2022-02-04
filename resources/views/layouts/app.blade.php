<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ResumeManager</title>

    @routes

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

<body class="bg-dark">
    <div id="app" >
        <nav class="navbar navbar-ligth navbar-expand-md  shadow-sm">
            <div class="container">
                <a class="c-2 navbar-brand" href="{{ url('/') }}">
                   Resume Manager
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse bg-dark navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a class="c-2" href="{{ route('resumes.create') }}">
                            <i class="c-1 text-light far fa-file"></i>
                            New Resume
                            </a>
                        </li>

                        <li class="ml-md-2">
                            <a class="c-2" href="{{ route('resumes.index') }}">
                            <i class="c-1 text-light fas fa-list"></i>
                            View Resumes
                            </a>
                        </li>

                        <li class="ml-md-2">
                            <a class="c-2" href="{{ route('publications.create') }}">
                            <i class="c-1 text-light fas fa-globe"></i>
                            New Publication
                            </a>
                        </li>

                        <li class="ml-md-2">
                            <a class="c-2" href="{{ route('publications.index') }}">
                            <i class="c-1 text-light fas fa-list-alt"></i>
                            View Publications
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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


                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (session('alert'))
                    <alert
                        :messages="{{ json_encode(session('alert')['messages']) }}"
                        type={{ session('alert')['type'] }}
                    />
                @endif
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
