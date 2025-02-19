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
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
<div id="app">
    <div>
        @include('partials.nav')
    </div>
    <div>
        @include('partials.banner')
    </div>

{{--    @auth--}}
{{--        @if(auth()->user()->role === 'admin')--}}
{{--            <!-- Перевіряємо роль користувача -->--}}
{{--            @include('partials.Admin.admin') <!-- Відображаємо бічну панель, якщо користувач - адмін -->--}}
{{--        @endif--}}
{{--    @endauth--}}

    <main class="py-4">
        @yield('content')
    </main>
</div>
@yield('scripts') <!-- Вставляємо скрипти сюди -->
</body>
</html>
