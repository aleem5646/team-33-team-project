@extends('layouts.customer-layout')
@section('title','Customer Details')

@section('content')
<section class="w-[90%] max-w-[900px] mx-auto py-10 space-y-6">
    <div class="flex items-center justify-between gap-3">
        <h1 class="text-3xl font-bold text-black dark:text-white">Customer Details</h1>
        <a href="{{ route('admin.customers.index') }}" class="rounded bg-[#989d7f] px-4 py-2 text-sm font-semibold text-black hover:bg-[#7a7f63]">
            Back to Customers
        </a>
    </div>

    <div class="rounded-lg border border-[#7a7f63] bg-white dark:bg-gray-800 p-6 space-y-4">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-300">Name</p>
            <p class="text-lg font-semibold">{{ $customer->getName() }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-300">Email</p>
            <p class="text-lg font-semibold">{{ $customer->email }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-300">Orders</p>
            <p class="text-lg font-semibold">{{ $customer->orders_count }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-300">Join Date</p>
            <p class="text-lg font-semibold">{{ optional($customer->email_verified_at)->format('d M Y') ?? 'N/A' }}</p>
        </div>
        <div>
            <a href="{{ route('profile.edit') }}" class="inline-flex rounded bg-[#4d601f] px-4 py-2 text-sm font-semibold text-white hover:bg-[#3d4d1a]">
                Edit Profile Fields
            </a>
        </div>
    </div>
</section>
@endsection
