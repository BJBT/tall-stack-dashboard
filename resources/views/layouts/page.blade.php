<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <div class="h-screen flex overflow-hidden bg-white">
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
{{--                <div class="flex">--}}
{{--                    <img class="h-10 mx-2 my-2 px-2 py-2" src="{{asset('fluvvia.png')}}" alt="Fluvvia Cafe and Bar" />--}}
{{--                </div>--}}
                @yield('content')
            </div>
        </div>
        @livewireScripts
    </body>
</html>
