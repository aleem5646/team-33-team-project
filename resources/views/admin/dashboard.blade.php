@extends('layouts.customer-layout')
@section('title','Admin Dashboard')

@section('content')
    <style>
        .admin-box {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
            border-radius: 40px;
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .admin-box:hover {
            opacity: 0.9;
        }
        .admin-text {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            letter-spacing: 0.05em;
            /* Black text border */
            text-shadow: 
                -1px -1px 0 #000,  
                 1px -1px 0 #000,
                -1px  1px 0 #000,
                 1px  1px 0 #000;
        }
        .bg-olive { background-color: #9ba389; }
        .bg-lime { background-color: #f1fdba; }

        /* Dark mode overrides */
        @media (prefers-color-scheme: dark) {
            .bg-olive { background-color: #5d6352; }
            .bg-lime { background-color: #8a916a; }
            .admin-text { color: #e5e7eb; }
        }
        
        /* Support for manual .dark class toggle if project uses it */
        .dark .bg-olive { background-color: #5d6352; }
        .dark .bg-lime { background-color: #8a916a; }
        .dark .admin-text { color: #e5e7eb; }
    </style>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">
            <!-- PRODUCTS -->
            <a href="{{ route('products.index') }}" class="admin-box bg-olive">
                <span class="admin-text">PRODUCTS</span>
            </a>

            <!-- CUSTOMERS -->
            <a href="{{ route('admin.customers.index') }}" class="admin-box bg-lime">
                <span class="admin-text">CUSTOMERS</span>
            </a>

            <!-- ORDERS -->
            <a href="#" class="admin-box bg-lime">
                <span class="admin-text">ORDERS</span>
            </a>

            <!-- REPORTS -->
            <a href="{{ route('admin.reports') }}" class="admin-box bg-olive">
                <span class="admin-text">REPORTS</span>
            </a>
        </div>
    </div>
@endsection