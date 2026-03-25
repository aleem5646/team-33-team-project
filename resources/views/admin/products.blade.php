@extends('layouts.customer-layout')
@section('title', 'Product Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight">Product Management</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
            <!-- Add Product Button -->
            <a href="{{ route('admin.products.create') }}" class="bg-[#9ba389] hover:bg-[#8a916a] text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm shadow-md">
                Add Product
            </a>

            <!-- Search Bar -->
            <form action="{{ route('admin.products.index') }}" method="GET" class="relative w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." 
                    class="w-full md:w-64 border-2 border-black/20 rounded-lg px-4 py-2 focus:outline-none focus:border-[#9ba389] transition-colors dark:bg-gray-700 dark:text-white">
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Product Rows -->
    <div class="space-y-4 max-w-5xl mx-auto">
        <!-- Header Row -->
        <div class="flex flex-row items-center bg-[#9ba389] p-4 rounded-lg text-white font-bold uppercase tracking-wider text-xs md:text-sm">
            <div class="w-[30%] text-center">Product Name</div>
            <div class="w-[20%] text-center">Category</div>
            <div class="w-[15%] text-center">Price</div>
            <div class="w-[15%] text-center">Stock</div>
            <div class="w-[20%] text-center">Actions</div>
        </div>

        @forelse($products as $product)
            <div class="flex flex-row items-center bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border border-black/5 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <!-- Name Column -->
                <div class="w-[30%] text-center flex justify-center text-sm md:text-lg font-bold text-gray-800 dark:text-white uppercase tracking-tight">
                    {{ $product->name }}
                </div>

                <!-- Category Column -->
                <div class="w-[20%] text-center flex justify-center text-gray-600 dark:text-gray-300 font-bold uppercase text-xs md:text-sm">
                    {{ $product->category->name ?? 'N/A' }}
                </div>

                <!-- Price Column -->
                <div class="w-[15%] text-center flex justify-center text-gray-800 dark:text-white font-bold text-sm md:text-base">
                    £{{ number_format($product->price, 2) }}
                </div>

                <!-- Stock Column -->
                <div class="w-[15%] text-center flex justify-center text-gray-500 dark:text-gray-400 font-medium text-xs md:text-sm">
                    {{ $product->variants->sum('count') }} total
                </div>

                <!-- Actions Column -->
                <div class="w-[20%] text-center flex justify-center gap-2">
                    <a href="{{ route('admin.products.edit', $product->productId) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-[10px] md:text-xs font-bold uppercase transition duration-300">
                        Edit
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->productId) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-[10px] md:text-xs font-bold uppercase transition duration-300">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg text-center text-gray-500 shadow-sm border border-black/5">
                No products found matching your criteria.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->appends(request()->query())->links() }}
    </div>

    <!-- Back to Dashboard Button -->
    <div class="mt-8 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm">
            Back to Dashboard
        </a>
    </div>
</div>
@endsection