<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Posts') }}</title>
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @yield('script')
  </head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="padding: 0 !important">
            <div class="container">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="mb-2 navbar-nav ml-auto w-100 justify-content-between align-items-center ">
                        <!-- Authentication Links -->
                        @guest
                            <a class="btn btn-outline-primary" href="{{ url('/') }}">
                                <span>HOME</span>
                            </a>
                            <div class="d-flex">
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary" href="{{ route('login') }}" style="color: #000000"><i
                                            class="bi bi-box-arrow-in-right"></i>
                                        {{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="btn btn-outline-primary" href="{{ route('register') }}" style="color: #000000"><i
                                                class="bi bi-pencil-square"></i> {{ __('Register') }}</a>
                                    </li>
                                @endif
                            </div>
                        @else
                        <!--MENU DOPO LOGGATO-->
                            <a class="btn btn-outline-primary" href="{{ url('/') }}">
                                <span>HOME</span>
                            </a>
                            <li class="">
                                <a id="navbarDropdown" class="btn btn-outline-primary"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }}
                                </a>

                                <div class="" aria-labelledby="navbarDropdown">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.posts.index') }}">
                                        Dashboard
                                    </a>
                                    <a class="btn btn-outline-primary" href="{{ route('logout') }}"
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

        <main id="app">
            @yield('content')
        </main>
    </div>
</body>

</html>
