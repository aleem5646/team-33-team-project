@extends('layouts.customer-layout')
@section('title', 'Customer Details')

@section('content')

@php
$statusLabel = $customer->email_verified_at ? 'Active' : 'Inactive';

$statusClasses = $customer->email_verified_at
    ? 'bg-green-100 text-green-700 ring-green-600/20 dark:bg-green-500/10 dark:text-green-300'
    : 'bg-gray-100 text-gray-700 ring-gray-500/20 dark:bg-gray-500/10 dark:text-gray-300';
@endphp


<section class="w-[90%] max-w-[1200px] mx-auto py-10">

    <div class="flex flex-col gap-4 lg:flex-row lg:justify-between">

        <div>
            <p class="text-sm font-semibold uppercase text-[#4d601f] dark:text-[#d8e27a]">
                Admin
            </p>

            <h1 class="text-3xl font-bold text-black dark:text-white mt-1">
                Customer Details
            </h1>

            <p class="text-sm text-gray-600 dark:text-gray-300">
                Review customer profile, order activity, and saved address information.
            </p>
        </div>


        <div class="flex flex-wrap gap-3">

            @if (Route::has('admin.customers.edit'))
                <a href="{{ route('admin.customers.edit', $customer->getKey()) }}"
                   class="inline-flex items-center rounded-xl border border-[#7a7f63]
                          bg-white px-4 py-2 text-sm font-semibold text-black
                          hover:bg-[#f4f6da] dark:bg-gray-800 dark:text-white">
                    Edit Customer
                </a>
            @else
                <button disabled
                        class="inline-flex items-center rounded-xl border border-gray-200
                               bg-gray-100 px-4 py-2 text-sm text-gray-400">
                    Edit Customer
                </button>
            @endif


            @if (Route::has('admin.customers.destroy'))
                <form action="{{ route('admin.customers.destroy', $customer->getKey()) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this customer?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="inline-flex items-center rounded-xl bg-red-600
                                   px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">
                        Delete Customer
                    </button>
                </form>
            @else
                <button disabled
                        class="inline-flex items-center rounded-xl bg-red-200
                               px-4 py-2 text-sm text-red-100">
                    Delete Customer
                </button>
            @endif


            <a href="{{ route('admin.customers.index') }}"
               class="inline-flex items-center rounded-xl bg-[#989d7f]
                      px-4 py-2 text-sm font-semibold text-black dark:text-white">
                Back to Customers List
            </a>

        </div>
    </div>


    <div class="grid gap-6 mt-6 xl:grid-cols-[minmax(0,2fr)_minmax(320px,1fr)]">

        
        <div class="space-y-6">

        
            <div class="bg-white p-6 rounded-xl shadow-sm dark:bg-gray-800">

                <div class="flex justify-between border-b pb-4 mb-4">

                    <div>
                        <h2 class="text-xl font-semibold text-black dark:text-white">
                            Customer Information
                        </h2>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Personal and account details for this customer.
                        </p>
                    </div>

                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                 {{ $statusClasses }}">
                        {{ $statusLabel }}
                    </span>
                </div>


                <div class="grid sm:grid-cols-2 gap-4">

                    <div class="border p-4 rounded">
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p class="font-semibold">{{ $customer->getName() }}</p>
                    </div>

                    <div class="border p-4 rounded">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-semibold break-all">{{ $customer->email }}</p>
                    </div>

                    <div class="border p-4 rounded">
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="font-semibold">
                            {{ $customer->phone ?: 'Not provided' }}
                        </p>
                    </div>

                    <div class="border p-4 rounded">
                        <p class="text-sm text-gray-500">Account Created Date</p>
                        <p class="font-semibold">
                            {{ optional($customer->created_at)->format('d M Y')
                                ?? optional($customer->email_verified_at)->format('d M Y')
                                ?? 'Not available' }}
                        </p>
                    </div>

                </div>
            </div>


      
            <div class="bg-white p-6 rounded-xl shadow-sm dark:bg-gray-800">

                <div class="flex justify-between border-b pb-4 mb-4">

                    <div>
                        <h2 class="text-xl font-semibold text-black dark:text-white">
                            Orders
                        </h2>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Recent order activity and purchase totals.
                        </p>
                    </div>

                    <span class="bg-[#d8e27a] px-3 py-1 text-xs font-semibold rounded">
                        {{ $customerStats['total_orders'] }} Total
                    </span>
                </div>


                <div class="border rounded overflow-hidden">
                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="p-3 text-left text-xs">Order ID</th>
                                    <th class="p-3 text-left text-xs">Date</th>
                                    <th class="p-3 text-left text-xs">Status</th>
                                    <th class="p-3 text-left text-xs">Total Amount</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($customer->orders as $order)
                                    <tr class="border-t">

                                        <td class="p-3 font-semibold">
                                            #{{ $order->orderId }}
                                        </td>

                                        <td class="p-3">
                                            {{ optional($order->created_at)->format('d M Y') ?? 'N/A' }}
                                        </td>

                                        <td class="p-3">
                                            <span class="px-2 py-1 text-xs bg-gray-100 rounded">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>

                                        <td class="p-3 font-semibold">
                                            ${{ number_format((float) $order->total_price, 2) }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-6 text-center text-gray-500">
                                            No orders found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>



        <div class="space-y-6">

        
            <div class="grid sm:grid-cols-3 xl:grid-cols-1 gap-4">

                <div class="bg-white p-5 rounded shadow dark:bg-gray-800">
                    <p class="text-sm text-gray-500">Total Orders</p>
                    <p class="text-3xl font-bold">
                        {{ $customerStats['total_orders'] }}
                    </p>
                </div>

                <div class="bg-white p-5 rounded shadow dark:bg-gray-800">
                    <p class="text-sm text-gray-500">Total Spent</p>
                    <p class="text-3xl font-bold">
                        ${{ number_format($customerStats['total_spent'], 2) }}
                    </p>
                </div>

                <div class="bg-white p-5 rounded shadow dark:bg-gray-800">
                    <p class="text-sm text-gray-500">Last Order Date</p>
                    <p class="text-lg font-bold">
                        {{ optional($customerStats['last_order_date'])->format('d M Y') ?? 'No orders yet' }}
                    </p>
                </div>

            </div>


        
            <div class="bg-white p-6 rounded shadow dark:bg-gray-800">

                <div class="border-b pb-4 mb-4">
                    <h2 class="text-xl font-semibold">Addresses</h2>
                    <p class="text-sm text-gray-500">
                        Saved delivery and contact location details.
                    </p>
                </div>


                @forelse ($customerAddresses as $address)

                    <div class="border p-4 rounded mb-4">

                        <p class="text-sm text-gray-500">Street</p>
                        <p class="font-semibold">
                            {{ $address['street'] ?: 'Not provided' }}
                        </p>

                        <div class="grid sm:grid-cols-3 gap-4 mt-3">

                            <div>
                                <p class="text-sm text-gray-500">City</p>
                                <p class="font-semibold">
                                    {{ $address['city'] ?: 'Not provided' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">State</p>
                                <p class="font-semibold">
                                    {{ $address['state'] ?: 'Not provided' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Zip</p>
                                <p class="font-semibold">
                                    {{ $address['zip'] ?: 'Not provided' }}
                                </p>
                            </div>

                        </div>
                    </div>

                @empty
                    <div class="border border-dashed p-6 text-center text-gray-500">
                        No addresses found.
                    </div>
                @endforelse

            </div>
        </div>

    </div>

</section>

@endsection