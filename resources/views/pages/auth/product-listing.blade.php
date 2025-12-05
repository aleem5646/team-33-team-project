@extends('layouts.customer-layout')
@section('title','Product Listing')
@section('content')
<section class="w-full px-4 py-8 space-y-6">

    <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between">
        <!-- Left Column: Categories -->
        <div class="w-full md:flex-1">
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ request()->fullUrlWithQuery(['category' => 1]) }}"
                   class="px-4 py-2 text-sm font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition uppercase"> Fashion
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 2]) }}"
                   class="px-4 py-2 text-sm font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition uppercase"> Beauty
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 3]) }}"
                   class="px-4 py-2 text-sm font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition uppercase"> Home Goods
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 4]) }}"
                   class="px-4 py-2 text-sm font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition uppercase"> Foods
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 5]) }}"
                   class="px-4 py-2 text-sm font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition uppercase"> Office Supplies
                </a>

                @if(request()->filled('category'))
                    <a href="{{ route('products.index', request()->except('category','page')) }}"
                       class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-600 text-sm font-bold hover:bg-gray-300 transition"
                       aria-label="Clear category"> ✕
                    </a>
                @endif
            </div>
        </div>

        <!-- Right Column: Search & Filters -->
        <div class="flex flex-col md:flex-row gap-4 items-start">
            <!-- Search Bar -->
            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-full md:w-64 rounded border border-[#7a7f63] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7a7f63] focus:border-green-500"
                >
                <button
                    type="submit"
                    class="rounded bg-[#989d7f] px-4 py-2 text-sm font-semibold text-black hover:bg-[#7a7f63]"
                > Search
                </button>
                <!-- Preserve other params -->
                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
                @if(request('filters'))
                    @foreach(request('filters') as $filter)
                        <input type="hidden" name="filters[]" value="{{ $filter }}">
                    @endforeach
                @endif
            </form>

            <!-- Filters & Sort -->
            <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-72 rounded border border-[#7a7f63] bg-white dark:bg-gray-800 dark:border-gray-600 p-3 space-y-3">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">

                <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                    <p class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide"> Filter & Sort </p>
                    <button type="submit" class="text-xs font-semibold text-[#989d7f] hover:text-[#7a7f63]"> Apply
                    </button>
                </div>

                <!-- Sort By -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Sort By Price</label>
                    <select name="sort" class="w-full rounded border-gray-300 text-sm focus:ring-[#989d7f] focus:border-[#989d7f] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <option value="">Default</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>

                <!-- Filters -->
                <div class="space-y-1">
                    <p class="text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Attributes</p>
                    <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
                       <input type="checkbox" name="filters[]" value="1"
                               {{ in_array(1, (array) request('filters')) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#989d7f] focus:ring-[#989d7f] dark:bg-gray-700 dark:border-gray-600"> Fair Trade
                    </label>

                    <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 cursor-pointer">
                        <input type="checkbox" name="filters[]" value="2"
                               {{ in_array(2, (array) request('filters')) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#989d7f] focus:ring-[#989d7f] dark:bg-gray-700 dark:border-gray-600"> Low Carbon
                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <article class="rounded-lg bg-[#989d7f] shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                <a href="{{ route('products.show', $product->productId ?? $product->id) }}" class="block">
                    <div class="bg-gray-100">
                        <img
                            src="{{ asset($product->image_url) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-56 object-cover"
                        >
                    </div>
                    <div class="p-4 space-y-2">
                        <h2 class="text-base font-semibold text-gray-900 line-clamp-2">
                            {{ $product->name }}
                        </h2>
                        @if($product->category)
                            <p class="text-xs font-semibold text-black uppercase tracking-wide">
                                {{ $product->category->name }}
                            </p>
                        @endif

                        @if(isset($product->price))
                            <p class="text-lg font-bold text-gray-900">
                                £ {{ number_format($product->price, 2) }}
                            </p>
                        @endif
                    </div>
                </a>
            </article>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 text-sm"> No products found! <!-- change in revised ver --> </p>
            </div>
        @endforelse
    </div>
    @if(method_exists($products, 'links'))
        <div class="pt-4">
            {{ $products->links() }}
        </div>
    @endif
</section>
@endsection
