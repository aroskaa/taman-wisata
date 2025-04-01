@extends('layouts.admin')

@section('title', 'Add New Hero Slider')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6">
        <form action="{{ route('admin.hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" 
                           id="order" 
                           class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ $nextOrder }}" 
                           disabled>
                    <p class="mt-1 text-xs text-gray-500">Order number is automatically assigned</p>
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <div class="mt-1 border border-gray-300 border-dashed rounded-md p-1">
                        <div class="flex flex-col items-center">
                            <label for="image_url" class="w-full cursor-pointer">
                                <div class="flex items-center justify-center space-x-1">
                                    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="text-xs text-blue-600 hover:text-blue-500">Upload image</span>
                                </div>
                                <p class="text-xs text-center text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                
                                <input id="image_url" 
                                       name="image_url" 
                                       type="file" 
                                       accept="image/*" 
                                       class="sr-only"
                                       onchange="showPreview(event)">
                            </label>

                            <!-- Preview container with fixed width -->
                            <div id="imagePreview" class="mt-2 flex flex-wrap gap-2 w-full max-w-[200px]">
                            </div>
                        </div>
                    </div>
                    @error('image_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.hero-sliders.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showPreview(event) {
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';
    
    const file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative w-[200px] h-[200px]';
            
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-full object-cover bg-gray-50 rounded border border-gray-200';
            
            div.appendChild(img);
            previewContainer.appendChild(div);
        }
        
        reader.readAsDataURL(file);
    }
}
</script>
@endsection 