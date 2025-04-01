<nav class="fixed w-full bg-white/80 backdrop-blur-sm z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="/" class="text-xl font-bold">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-[60px] h-[60px]">
                </a>
                
                <!-- Nav Links -->
                <div class="hidden md:flex items-center space-x-8 ml-10">
                    <a href="{{ route('taman-wisata.index') }}" class="text-gray-700 hover:text-gray-900">Taman Wisata</a>
                </div>
                <div class="hidden md:flex items-center space-x-8 ml-10">
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-gray-900">About</a>
                </div>
            </div>

            <!-- Search Bar -->
            @unless($hideSearch)
            <div class="flex-1 max-w-lg mx-8 relative">
                <div class="relative pt-2.5">
                    <input 
                        wire:model.live.debounce.300ms="search"
                        wire:keydown.enter="redirectToSearch"
                        type="text" 
                        placeholder="Cari taman wisata..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
                    >
                    
                    @if($showSearchResults && count($searchResults) > 0)
                        <div class="absolute w-full mt-1 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                            @foreach($searchResults as $result)
                                <a href="{{ route('taman-wisata.show', $result) }}" class="block p-3 hover:bg-gray-100">
                                    <div class="font-medium">{{ $result->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $result->location }}</div>
                                </a>
                            @endforeach
                            @if($search)
                                <a 
                                    wire:click="redirectToSearch"
                                    class="block p-3 text-center text-primary hover:bg-gray-100 cursor-pointer"
                                >
                                    Lihat semua hasil
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            @endunless

            <!-- User Dropdown -->
            <div class="flex items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav> 