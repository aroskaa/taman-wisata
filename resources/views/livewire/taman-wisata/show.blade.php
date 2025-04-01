<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" wire:poll.5000ms="nextSlide">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Image Gallery -->
        <div class="relative h-[60vh]">
            @if($tamanWisata->images->count() > 0)
                <div class="relative w-full h-full">
                    <img 
                        src="{{ Storage::url($tamanWisata->images[$activeImage]->image_path) }}" 
                        alt="{{ $tamanWisata->name }}"
                        class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-500 ease-in-out"
                    >
                </div>
                <!-- Thumbnail Navigation -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    @foreach($tamanWisata->images as $index => $image)
                        <button 
                            wire:click="setActiveImage({{ $index }})"
                            class="w-16 h-16 rounded-lg overflow-hidden {{ $activeImage === $index ? 'ring-2 ring-primary' : '' }} hover:opacity-75 transition-opacity"
                        >
                            <img 
                                src="{{ Storage::url($image->image_path) }}" 
                                alt=""
                                class="w-full h-full object-cover"
                            >
                        </button>
                    @endforeach
                </div>

                <!-- Slideshow Controls -->
                <button 
                    wire:click="toggleSlideshow"
                    class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm p-2 rounded-lg hover:bg-white/90 transition-colors"
                >
                    @if($isSliding)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </button>
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-2xl font-bold mb-2">{{ $tamanWisata->name }}</h1>
                    <p class="text-gray-600">{{ $tamanWisata->location }}</p>
                </div>
                <div class="flex items-center bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="ml-1 text-lg font-semibold">{{ $tamanWisata->rating }}</span>
                </div>
            </div>

            <div class="prose max-w-none mb-6">
                <h2 class="text-xl font-semibold mb-2">Deskripsi</h2>
                <p class="text-gray-600">{{ $tamanWisata->description }}</p>
            </div>

            <div class="flex justify-end">
                <a 
                    href="{{ $tamanWisata->whatsapp_link }}" 
                    target="_blank"
                    class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 flex items-center text-lg"
                >
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.001 2C6.478 2 2 6.477 2 12c0 5.522 4.478 10 10.001 10 5.523 0 10-4.478 10-10 0-5.523-4.477-10-10-10zm4.927 14.218c-.203.565-1.159 1.104-1.585 1.185-.426.081-.831.098-1.336.034-.503-.064-1.046-.185-1.775-.466-1.045-.403-2.207-1.312-3.221-2.326-1.014-1.014-1.923-2.176-2.326-3.221-.281-.729-.402-1.272-.466-1.775-.064-.505-.047-.91.034-1.336.081-.426.62-1.382 1.185-1.585.565-.203.873.042 1.11.308.237.266.723.982.892 1.304.169.322.271.467.271.737 0 .27-.276.645-.416.853-.14.208-.292.346-.208.68.084.334.721 1.447 1.946 2.672 1.225 1.225 2.338 1.862 2.672 1.946.334.084.472-.068.68-.208.208-.14.583-.416.853-.416.27 0 .415.102.737.271.322.169 1.038.655 1.304.892.266.237.511.545.308 1.11z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div> 