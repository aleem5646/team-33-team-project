@extends('layouts.customer-layout')
@section('title', 'Add New Product')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border border-black/5">
        <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight mb-8">Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Product Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <select name="categoryId" required class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white appearance-none cursor-pointer">
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->categoryId }}" {{ old('categoryId') == $category->categoryId ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoryId') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Price (£)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Carbon Impact</label>
                    <input type="number" step="0.1" name="carbon_impact" value="{{ old('carbon_impact', 0) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="4" 
                    class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm">Cancel</a>
                <button type="submit" class="bg-[#9ba389] hover:bg-[#8a916a] text-white px-8 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm shadow-md">Create Product</button>
            </div>
        </form>
    </div>
</div>
@endsection