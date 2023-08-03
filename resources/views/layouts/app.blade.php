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

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    @auth

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-folder"></i>files</a>




                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}"><i class="fa-solid fa-house"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('file.index')}}"><i class="fa-regular fa-folder-open"></i>my files</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('file.public')}}"><i class="fa-solid fa-globe"></i>public files</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('file.create')}}"><i class="fa-solid fa-folder-plus"></i>Add files</a>
                        </li>

                    </ul>









                </div>
            </div>
            <div class="action">
                <div class="profile" onclick="menutoggle()">
                    <img src="{{asset('profilee') .'/'.Auth::user()->img}}" alt="">
                </div>
                <div class="menuu">
                    <h3>{{Auth::user()->name}}</h3>
                    <ul>
                        <li><i class="fa-solid fa-user"></i><a href="{{route('user.profile')}}">my profile</a></li>
                        {{-- <li><i class="fa-solid fa-user-pen"></i><a href="">Edit profile</a></li>
                        <li><i class="fa-solid fa-envelope"></i><a href="">inbox</a></li>
                        <li><i class="fa-solid fa-gear"></i><a href="">settings</a></li>
                        <li><i class="fa-solid fa-circle-question"></i><a href="">Help</a></li> --}}
                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="{{route('logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </ul>
                </div>

            </div>
        </nav>

    @endauth
        @yield('content')


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
