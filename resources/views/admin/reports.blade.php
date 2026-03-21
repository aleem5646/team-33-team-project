@extends('layouts.customer-layout')
@section('title','Admin Reports')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Admin Reports</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-300">
            Back to Dashboard
        </a>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Total Sales -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-l-4 border-green-500">
            <p class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Total Sales</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mt-1">£{{ number_format($totalSales, 2) }}</h3>
        </div>

        <!-- Total Orders -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <p class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Number of Orders</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mt-1">{{ $totalOrders }}</h3>
        </div>

        <!-- CO2 Saved -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-l-4 border-emerald-500">
            <p class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">CO2 Saved (kg)</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mt-1">{{ number_format($totalCO2Saved, 2) }}</h3>
        </div>

        <!-- Total Customers -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border-l-4 border-purple-500">
            <p class="text-sm text-gray-500 dark:text-gray-400 font-medium uppercase tracking-wider">Total Customers</p>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mt-1">{{ $totalCustomers }}</h3>
        </div>
    </div>

    <!-- Additional Metrics -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Additional Performance Metrics</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Average Order Value</p>
                <h4 class="text-xl font-bold text-gray-800 dark:text-white">£{{ number_format($averageOrderValue, 2) }}</h4>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Total Items Sold</p>
                <h4 class="text-xl font-bold text-gray-800 dark:text-white">{{ $totalItemsSold }} units</h4>
            </div>
        </div>
    </div>
</div>
@endsection
