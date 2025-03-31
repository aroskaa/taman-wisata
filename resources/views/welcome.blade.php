<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Add Alpine.js for slider functionality -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        <!-- Hero Slider Section -->
        <div x-data="{ 
            currentSlide: 0,
            slides: {{ App\Models\HeroSlider::orderBy('order')->get() }},
            
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            },
            
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            }
        }" class="relative h-screen">
            <!-- Slider container -->
            <div class="relative h-full overflow-hidden">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="currentSlide === index"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                         class="absolute inset-0">
                        <img :src="slide.image_url" :alt="slide.name" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                            <div class="text-center text-white">
                                <h1 x-text="slide.name" class="text-5xl font-bold mb-4"></h1>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Slider controls -->
            <button @click="prevSlide" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
            </button>
            <button @click="nextSlide" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
            </button>
        </div>
    </body>
</html>
