<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="antialiased">
        <!-- Navigation -->
        <nav class="fixed w-full bg-white/80 backdrop-blur-sm z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <a href="/" class="text-xl font-bold">Logo</a>
                        
                        <!-- Nav Links -->
                        <div class="hidden md:flex items-center space-x-8 ml-10">
                            <a href="#" class="text-gray-700 hover:text-gray-900">TENTANG KAMI</a>
                            <a href="#" class="text-gray-700 hover:text-gray-900">AKTIVITAS</a>
                            <a href="#" class="text-gray-700 hover:text-gray-900">LAYANAN</a>
                            <a href="#" class="text-gray-700 hover:text-gray-900">PORTOFOLIO</a>
                        </div>
                    </div>

                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-primary/90">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Slider -->
        <livewire:hero-slider />

        @livewireScripts
    </body>
</html>
