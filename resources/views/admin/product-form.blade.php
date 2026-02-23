@extends('layouts.customer-layout')
@section('title', $mode === 'edit' ? 'Edit Product' : 'Add Product')

@section('content')

<div class="w-[90%] mx-auto py-10">

    <h1 class="text-3xl font-bold mb-10">
        {{ $mode === 'edit' ? 'EDIT PRODUCT' : 'ADD PRODUCT' }}
    </h1>

    <div class="bg-gray-100 p-8 rounded-lg shadow-md text-gray-800">

        <form class="space-y-6">

            <!-- Image Upload -->
            <div>
                <label class="block font-semibold mb-2">Product Image</label>
                <input type="file" class="border p-3 w-full rounded bg-white">
            </div>

            <!-- Title -->
            <div>
                <label class="block font-semibold mb-2">Title</label>
                <input type="text"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update title"
                       value="{{ $product['name'] ?? '' }}">
            </div>

            <!-- Category -->
            <div>
                <label class="block font-semibold mb-2">Category</label>
                <input type="text"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update category"
                       value="{{ $product['category'] ?? '' }}">
            </div>

            <!-- Price -->
            <div>
                <label class="block font-semibold mb-2">Price</label>
                <input type="number"
                       step="0.01"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update price"
                       value="{{ $product['price'] ?? '' }}">
            </div>

            <!-- Stock -->
            <div>
                <label class="block font-semibold mb-2">Stock</label>
                <input type="number"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update stock"
                       value="{{ $product['stock'] ?? '' }}">
            </div>

            <!-- Variant -->
            <div>
                <label class="block font-semibold mb-2">Variant</label>
                <input type="text"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update variant"
                       value="{{ $product['variant'] ?? '' }}">
            </div>

            <!-- Filter -->
            <div>
                <label class="block font-semibold mb-2">Filter</label>
                <input type="text"
                       class="border p-3 w-full rounded bg-white"
                       placeholder="Add/update filter"
                       value="{{ $product['filter'] ?? '' }}">
            </div>

            <!-- Submit -->
            <button class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">
                {{ $mode === 'edit' ? 'UPDATE' : 'ADD' }}
            </button>

        </form>

    </div>

</div>

@endsection
