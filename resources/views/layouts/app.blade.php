<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic Page Title -->
    <title>
        {{ config('app.name', 'SyntaxFix') }} | @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/png">

    <!-- CSS & JS via Vite -->
    
    <!-- Livewire Styles -->
    @stack('assets')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased overflow-x-hidden w-full">
    <div class="min-h-screen bg-gray-100">

        <!-- Breeze Navigation -->
        <header class="sticky top-0 z-50 bg-white">
            @include('layouts.navigation')
        </header>

        <!-- Page Header -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <div class="flex">
            {{-- Sidebar --}}
            @hasSection('sidebar')
            @yield('sidebar')
            <main class="flex-1 p-6">
                @yield('content')
            </main>
            @else
            <div class="hidden md:block fixed top-16 left-0 h-screen w-64 bg-white shadow-md">
                @livewire('component.forum-category-sidebar')
            </div>
            <main class="flex-1 md:ml-64 p-6">
                @yield('content')
            </main>
            @endif

            {{-- Main Content --}}
        </div>

    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
