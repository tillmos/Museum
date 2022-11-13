<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Museum - {{ $title ?? ' ' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @auth
        Welcome, {{Auth::user()->name}}
        <br>
        <form method="POST" action="{{route('logout')}}" id="logout-form">
            @csrf
        <a href="{{route('logout')}}" onClick="event.preventDefault(); document.querySelector('#logout-form').submit();" class="hover:underline">Log out</a>
    </form>

        @else
        <a href="{{route('login')}}" class="hover:underilne">Log in</a>
        <a href="{{route('register')}}" class="hover:underilne">Register</a>
        @endauth
        
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>