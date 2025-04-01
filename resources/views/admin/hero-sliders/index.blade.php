@extends('layouts.admin')

@section('title', 'Hero Sliders')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Hero Sliders</h2>
            <a href="{{ route('admin.hero-sliders.create') }}" 
               class="bg-blue-500 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex items-center space-x-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Add New Slider</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($sliders as $slider)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $slider->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $slider->image_url) }}" alt="{{ $slider->name }}" class="h-12 w-20 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $slider->order }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.hero-sliders.edit', $slider) }}" 
                                       class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('admin.hero-sliders.destroy', $slider) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this slider?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 