<?php
/**
 * About page template
 */
?>

<x-app-layout>
    <livewire:user-navbar />
    <!-- Hero Section -->
    <div class="relative min-h-screen overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-teal-900/50 to-teal-800/50 z-10"></div>
            <img src="{{ asset('images/mountain-bg.jpg') }}" alt="Mountain Background" class="w-full h-full object-cover">
        </div>

        <!-- Purple Circle -->
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
            <div class="w-48 h-48 bg-purple-600 rounded-full shadow-2xl"></div>
        </div>

        <!-- Content -->
        <div class="relative z-30 container mx-auto px-4 h-screen flex items-center">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-7xl font-bold text-white mb-6 tracking-tight">About Us</h1>
                <p class="text-xl text-white/90">Discover the beauty of nature with us</p>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-white py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg mx-auto">
                    <h2 class="text-4xl font-bold mb-8 text-center text-gray-900">Welcome to Taman Wisata</h2>
                    
                    <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
                        <p class="text-xl text-gray-600 leading-relaxed mb-8">
                            Taman Wisata is more than just a destination – it's where nature meets adventure. 
                            We're dedicated to providing unforgettable experiences while preserving the natural 
                            beauty of our locations for future generations.
                        </p>

                        <p class="text-xl font-semibold text-gray-800 mb-6">
                            Since our establishment, we've been committed to:
                        </p>

                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Preserving natural environments</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Creating sustainable tourism</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Supporting local communities</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Promoting eco-education</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Mission & Vision Cards -->
                    <div class="grid md:grid-cols-2 gap-8 mt-12">
                        <!-- Mission Card -->
                        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-2xl shadow-xl p-8">
                            <h3 class="text-2xl font-bold mb-4 text-teal-900">Our Mission</h3>
                            <p class="text-teal-800">
                                To create memorable experiences while protecting and showcasing Indonesia's 
                                natural wonders, ensuring that future generations can enjoy these pristine 
                                environments just as we do today.
                            </p>
                        </div>

                        <!-- Vision Card -->
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl shadow-xl p-8">
                            <h3 class="text-2xl font-bold mb-4 text-purple-900">Our Vision</h3>
                            <p class="text-purple-800">
                                To be the leading sustainable tourism destination in Indonesia, setting 
                                the standard for environmental conservation and visitor experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 