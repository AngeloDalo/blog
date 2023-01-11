<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ps-3 justify-content-between"
            style="position: fixed; top: 0; width: 100%">
            <a href="{{ url('/') }}" class="btn btn-outline-primary">
                <span>Blog</span>
            </a>
            <div class="d-flex">
                <a class="btn btn-danger text-white" href="{{ route('admin.posts.create') }}">
                    Add Post
                </a>
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
            </div>
        </nav>
        <main>
            <div class="container-fluid" style="padding-top: 6em;">
                <div class='row'>
                    <div class='col-9'>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
