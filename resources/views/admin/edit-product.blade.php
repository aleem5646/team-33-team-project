@extends('layouts.customer-layout')
@section('title', 'Edit Product')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border border-black/5">
        <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight mb-8">Edit Product</h1>

        <form action="{{ route('admin.products.update', $product->productId) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Product Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Category</label>
                    <select name="categoryId" class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white appearance-none cursor-pointer">
                        @foreach($categories as $category)
                            <option value="{{ $category->categoryId }}" {{ $product->categoryId == $category->categoryId ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Price (£)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Carbon Impact</label>
                    <input type="number" step="0.1" name="carbon_impact" value="{{ old('carbon_impact', $product->carbon_impact) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="4" 
                    class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="border-t pt-6">
                <h3 class="text-xl font-bold uppercase text-black dark:text-white mb-4">Stock Management (Variants)</h3>
                <div class="space-y-4">
                    @foreach($product->variants as $variant)
                        <div class="flex items-center gap-4 bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <div class="flex-1 font-bold uppercase text-sm">{{ $variant->name }}: {{ $variant->value }}</div>
                            <div class="w-32">
                                <label class="block text-[10px] uppercase text-gray-400">Current Stock</label>
                                <input type="number" name="variants[{{ $variant->product_variantId }}][count]" value="{{ $variant->count }}" 
                                    class="w-full border border-black/10 rounded px-2 py-1 text-center dark:bg-gray-700">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm">Cancel</a>
                <button type="submit" class="bg-[#9ba389] hover:bg-[#8a916a] text-white px-8 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm shadow-md">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection