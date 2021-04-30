<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div class="flex flex-col">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg uppercase tracking-wider font-semibold text-gray-100 no-underline">
                        mh blog
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @if(Route::has('login'))
                            @auth
                                <a href="{{ route('home') }}" class="no-underline hover:underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="no-underline hover:underline">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="no-underline hover:underline">{{ __('Register') }}</a>
                                @endif
                            @endauth
                    @endif
                </nav>
            </div>
        </header>
        <div class="container mx-auto flex justify-center space-x-4">
            @yield('content')
        </div>
        @yield('comments')
        {{-- footer --}}
        <footer class="bg-blue-900 h-32 flex justify-center items-center">
            <p class="text-gray-100 sm:text-left">© 2021 All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
