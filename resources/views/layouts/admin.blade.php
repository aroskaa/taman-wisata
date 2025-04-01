<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add Alpine.js for dropdown functionality -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left side -->
                <div class="flex">
                    <!-- Logo/Brand -->
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-lg font-bold text-gray-800">Admin</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-12">
                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex items-center px-1 pt-1 {{ request()->routeIs('admin.dashboard') || request()->is('admin') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-b-2 border-transparent' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('admin.hero-sliders.index') }}"
                           class="inline-flex items-center px-1 pt-1 {{ request()->routeIs('admin.hero-sliders.*') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-b-2 border-transparent' }}">
                            Hero Slider
                        </a>

                        <a href="{{ route('admin.taman-wisatas.index') }}"
                           class="inline-flex items-center px-1 pt-1 {{ request()->routeIs('admin.taman-wisatas.*') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:border-gray-300 hover:text-gray-700 border-b-2 border-transparent' }}">
                            Taman Wisata
                        </a>
                    </div>
                </div>

                <!-- Right side -->
                <div class="flex items-center">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                             style="display: none;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Page Title -->
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">@yield('title')</h1>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Main Content -->
        @yield('content')
    </main>

    <!-- Remove default navigation -->
    <style>
        .hidden[style*="display: block"] {
            display: none !important;
        }
    </style>
</body>
</html> 