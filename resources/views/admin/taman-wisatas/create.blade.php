@extends('layouts.admin')

@section('title', 'Add New Taman Wisata')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6">
        <form action="{{ route('admin.taman-wisatas.store') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ old('location') }}" required>
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating (0-5)</label>
                    <input type="text" 
                           name="rating" 
                           id="rating" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           value="{{ old('rating', 0) }}" 
                           required
                           oninput="formatRating(this)">
                    <p class="mt-1 text-xs text-gray-500">Enter a value between 0 and 5</p>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- WhatsApp Admin -->
                <div>
                    <label for="wa_admin" class="block text-sm font-medium text-gray-700">WhatsApp Admin</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            +62
                        </span>
                        <input type="text" 
                               name="wa_admin" 
                               id="wa_admin"
                               class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                               placeholder="8123456789" 
                               value="{{ old('wa_admin') }}" 
                               required
                               maxlength="13"
                               pattern="[0-9]{10,13}"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Enter 10-13 digits number</p>
                    @error('wa_admin')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Images (Max 7)</label>
                    <div class="mt-1 border border-gray-300 border-dashed rounded-md p-1">
                        <div class="flex flex-col items-center">
                            <label for="images" class="w-full cursor-pointer">
                                <div class="flex items-center justify-center space-x-1">
                                    <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="text-xs text-blue-600 hover:text-blue-500">Upload images</span>
                                </div>
                                <p class="text-xs text-center text-gray-500">PNG, JPG, GIF up to 2MB (Maximum 7 images)</p>
                                
                                <input id="images" 
                                       name="images[]" 
                                       type="file" 
                                       multiple 
                                       accept="image/*" 
                                       class="sr-only"
                                       onchange="showPreview(event)">
                            </label>

                            <!-- Preview container with fixed width -->
                            <div id="imagePreview" class="mt-2 flex flex-wrap gap-2 w-full">
                            </div>
                        </div>
                    </div>
                    @error('images')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.taman-wisatas.index') }}" 
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function formatRating(input) {
    // Remove any non-digit characters
    let value = input.value.replace(/[^\d]/g, '');
    
    // Allow empty value
    if (!value) {
        input.value = '';
        return;
    }
    
    // Limit to 2 digits max
    value = value.substring(0, 2);
    
    // If first digit is greater than 5, set it to 5
    if (value[0] > 5) {
        value = '5' + value.substring(1);
    }
    
    // If there's more than 1 digit, format as decimal
    if (value.length > 1) {
        value = value[0] + '.' + value.substring(1);
    }
    
    input.value = value;
}

function showPreview(event) {
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = '';
    
    const files = event.target.files;
    
    for (let i = 0; i < Math.min(files.length, 7); i++) {
        const file = files[i];
        if (file.type.startsWith('image/')) {
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
}
</script>
@endsection 