@extends('layouts.customer-layout')
@section('title','Product Listing')
@section('content')
<section class="w-full px-4 py-8 space-y-6">

    <div class="flex flex-col gap-6 md:flex-row md:items-start md:justify-between">
        <div class="space-y-3">
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ request()->fullUrlWithQuery(['category' => 1]) }}"
                   class="px-5 py-5 text-2xl font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition"> FASHION
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 2]) }}"
                   class="px-5 py-5 text-2xl font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition"> BEAUTY
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 3]) }}"
                   class="px-5 py-5 text-2xl font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition"> HOME GOODS
                </a>
                <a href="{{ request()->fullUrlWithQuery(['category' => 4]) }}"
                   class="px-5 py-5 text-2xl font-medium rounded bg-[#989d7f] text-black hover:bg-[#7a7f63] transition">  FOODS
                </a>

                @if(request()->filled('category'))
                    <a href="{{ route('products.index', request()->except('category','page')) }}"
                       class="flex items-center justify-center h-12 w-12 rounded-full bg-[#989d7f] text-black text-2xl font-bold hover:bg-[#7a7f63] transition"
                       aria-label="Clear category"> ×
                    </a>
                @endif
            </div>
        </div>
        <div class="w-full md:w-80 space-y-3">
            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search products..."
                    class="w-full rounded border border-[#7a7f63] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7a7f63] focus:border-green-500"
                >
                <button
                    type="submit"
                    class="rounded bg-[#989d7f] px-4 py-2 text-sm font-semibold text-black hover:bg-[#7a7f63]"
                > Search
                </button>
            </form>

            <form action="{{ route('products.index') }}" method="GET" class="rounded border border-[#7a7f63] bg-white p-3 space-y-3">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-semibold text-gray-900"> Filter </p>
                    <button type="submit" class="text-sm font-semibold text-[#989d7f] hover:text-[#7a7f63]"> Apply
                    </button>
                </div>

                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm text-black-700">
                       <input type="checkbox" name="filters[]" value="1"
                               {{ in_array(1, (array) request('filters')) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500"> Fair Trade
                    </label>

                    <label class="flex items-center gap-2 text-sm text-black-700">
                        <input type="checkbox" name="filters[]" value="2"
                               {{ in_array(2, (array) request('filters')) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500"> Low Carbon
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
                            src="{{ asset('imgs/'.$product->image_url) }}"
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
