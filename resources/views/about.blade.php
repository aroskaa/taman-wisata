<?php
/**
 * About page template
 */
?>

<x-app-layout>
    <livewire:user-navbar />
    <!-- Hero Section -->
    <div class="relative h-[600px] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/mountain-bg.jpg') }}" alt="Mountain Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/10 backdrop-blur-sm"></div>
        </div>

        <!-- Purple Circle -->
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="w-48 h-48 bg-purple-600 rounded-full shadow-lg"></div>
        </div>

        <!-- Content -->
        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-4xl">
                <h1 class="text-5xl font-bold text-white mb-6">About Us</h1>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-lg">
                <h2 class="text-3xl font-bold mb-6">Welcome to Taman Wisata</h2>
                
                <p class="mb-6">
                    Taman Wisata is more than just a destination – it's where nature meets adventure. 
                    We're dedicated to providing unforgettable experiences while preserving the natural 
                    beauty of our locations for future generations.
                </p>

                <p class="mb-6">
                    Since our establishment, we've been committed to:
                </p>

                <ul class="list-disc pl-6 mb-6">
                    <li>Preserving natural environments</li>
                    <li>Creating sustainable tourism opportunities</li>
                    <li>Supporting local communities</li>
                    <li>Providing exceptional visitor experiences</li>
                    <li>Promoting environmental education</li>
                </ul>

                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p class="mb-6">
                    To create memorable experiences while protecting and showcasing Indonesia's 
                    natural wonders, ensuring that future generations can enjoy these pristine 
                    environments just as we do today.
                </p>

                <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                <p class="mb-6">
                    To be the leading sustainable tourism destination in Indonesia, setting 
                    the standard for environmental conservation and visitor experience.
                </p>
            </div>
        </div>
    </div>
</x-app-layout> 