<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Local Search Bar -->
    <div class="mb-6 max-w-lg">
        <input 
            wire:model.live.debounce.300ms="search"
            type="text" 
            placeholder="Cari taman wisata..." 
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent"
        >
    </div>

    <!-- Taman Wisata List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($tamanWisatas as $tamanWisata)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative h-48">
                    @if($tamanWisata->images->first())
                        <img 
                            src="{{ Storage::url($tamanWisata->images->first()->image_path) }}" 
                            alt="{{ $tamanWisata->name }}"
                            class="w-full h-full object-cover"
                        >
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                    <div class="absolute top-2 right-2">
                        <div class="bg-white/90 backdrop-blur-sm rounded-lg px-2 py-1 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="ml-1">{{ $tamanWisata->rating }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $tamanWisata->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $tamanWisata->location }}</p>
                    <div class="flex justify-between items-center">
                        <a 
                            href="{{ route('taman-wisata.show', $tamanWisata) }}" 
                            class="text-primary hover:text-primary/80"
                        >
                            Lihat Detail →
                        </a>
                        <a 
                            href="{{ $tamanWisata->whatsapp_link }}" 
                            target="_blank"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 flex items-center"
                        >
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.001 2C6.478 2 2 6.477 2 12c0 5.522 4.478 10 10.001 10 5.523 0 10-4.478 10-10 0-5.523-4.477-10-10-10zm4.927 14.218c-.203.565-1.159 1.104-1.585 1.185-.426.081-.831.098-1.336.034-.503-.064-1.046-.185-1.775-.466-1.045-.403-2.207-1.312-3.221-2.326-1.014-1.014-1.923-2.176-2.326-3.221-.281-.729-.402-1.272-.466-1.775-.064-.505-.047-.91.034-1.336.081-.426.62-1.382 1.185-1.585.565-.203.873.042 1.11.308.237.266.723.982.892 1.304.169.322.271.467.271.737 0 .27-.276.645-.416.853-.14.208-.292.346-.208.68.084.334.721 1.447 1.946 2.672 1.225 1.225 2.338 1.862 2.672 1.946.334.084.472-.068.68-.208.208-.14.583-.416.853-.416.27 0 .415.102.737.271.322.169 1.038.655 1.304.892.266.237.511.545.308 1.11z"/>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $tamanWisatas->links() }}
    </div>
</div> 