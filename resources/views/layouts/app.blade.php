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
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg uppercase tracking-wider font-semibold text-gray-100 no-underline">
                        mh blog
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        @if (session('success'))
            <p class="mt-6 mx-12 bg-green-300 text-green-700 px-4 py-3 rounded-lg">{{ session('success') }}</p>
        @endif
        @auth
            <div class="flex w-10/12">
                <nav class="list-none w-2/12 mx-auto mt-10 font-medium ml-12">
                <li>
                    <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">
                        Categories
                    </a>
                </li>
                <li class="mt-4">
                    <a class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">Posts</a>
                </li>
                </nav>
                <div class="flex-1">
                    @yield('content')
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    </div>
</body>
</html>
