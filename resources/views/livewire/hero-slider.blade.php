<div class="relative h-screen">
    <!-- Slider container -->
    <div class="relative h-full overflow-hidden">
        @foreach($sliders as $index => $slider)
            <div 
                wire:key="slide-{{ $index }}"
                class="absolute inset-0 w-full h-full transition-all duration-500 ease-in-out transform"
                style="opacity: {{ $currentSlide === $index ? '1' : '0' }}; z-index: {{ $currentSlide === $index ? '10' : '0' }};"
            >
                <img 
                    src="/storage/{{ $slider->image_url }}" 
                    alt="{{ $slider->name }}" 
                    class="w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <div class="text-center text-white">
                        <h1 class="text-5xl font-bold mb-4">{{ $slider->name }}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navigation arrows -->
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between items-center px-4">
        <button 
            wire:click="prevSlide"
            class="p-2 rounded-full bg-white/30 hover:bg-white/50 transition-all"
        >
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button 
            wire:click="nextSlide"
            class="p-2 rounded-full bg-white/30 hover:bg-white/50 transition-all"
        >
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Slide indicators -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        @foreach($sliders as $index => $slider)
            <button 
                wire:key="indicator-{{ $index }}"
                wire:click="$set('currentSlide', {{ $index }})"
                class="w-3 h-3 rounded-full transition-all duration-300 {{ $currentSlide === $index ? 'bg-white scale-110' : 'bg-white/50 hover:bg-white/75' }}"
                aria-label="Go to slide {{ $index + 1 }}"
            ></button>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        let interval;
        
        function startAutoAdvance() {
            interval = setInterval(() => {
                @this.nextSlide();
            }, 3000); // Change slide every 3 seconds
        }

        window.addEventListener('initSliderAutoAdvance', () => {
            clearInterval(interval);
            startAutoAdvance();
        });

        startAutoAdvance();
    });
</script>
