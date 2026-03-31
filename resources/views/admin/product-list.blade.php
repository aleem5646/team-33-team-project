@extends('layouts.customer-layout')
@section('title', 'Product List')

@section('content')

<div class="w-[90%] mx-auto py-10">

    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-bold">PRODUCT LIST</h1>

        <a href="{{ route('admin.products.add') }}"
           class="bg-green-600 text-white px-5 py-3 rounded hover:bg-green-700 transition">
            ADD PRODUCT
        </a>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md">

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-4 font-semibold">IMAGE</th>
                    <th class="p-4 font-semibold">TITLE</th>
                    <th class="p-4 font-semibold">CATEGORY</th>
                    <th class="p-4 font-semibold">PRICE</th>
                    <th class="p-4 font-semibold">STOCK</th>
                    <th class="p-4 font-semibold">ACTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr class="border-b">
                        <!-- IMAGE -->
                        <td class="p-4">
                            <img src="{{ asset('imgs/' . $product['image']) }}"
                                 class="w-16 h-16 rounded object-cover">
                        </td>

                        <!-- TITLE -->
                        <td class="p-4 font-semibold">
                            {{ $product['name'] }}
                        </td>

                        <!-- CATEGORY -->
                        <td class="p-4">
                            {{ $product['category'] ?? 'N/A' }}
                        </td>

                        <!-- PRICE -->
                        <td class="p-4">
                            £{{ number_format($product['price'], 2) }}
                        </td>

                        <!-- STOCK -->
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <button class="bg-gray-300 px-2 py-1 rounded">-</button>
                                <input type="text"
                                       value="{{ $product['stock'] ?? 10 }}"
                                       class="w-12 text-center border rounded bg-white">
                                <button class="bg-gray-300 px-2 py-1 rounded">+</button>
                            </div>
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-4">
                            <a href="{{ route('admin.products.edit', $product['id']) }}"
                               class="text-blue-600 hover:underline">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection
