@extends('layouts.customer-layout')
@section('title','Customer Management')

@section('content')
<section class="w-[90%] max-w-[1200px] mx-auto py-10 space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <h1 class="text-3xl font-bold uppercase text-black dark:text-white">Customer Management</h1>
            <form action="{{ route('admin.customers.index') }}" method="GET" class="mt-3">
                <label for="sort" class="text-sm font-semibold uppercase">Filter:</label>
                <select id="sort" name="sort" onchange="this.form.submit()"
                        class="ml-2 rounded border border-[#7a7f63] bg-[#d8e27a] px-3 py-2 text-sm font-semibold uppercase text-black focus:outline-none focus:ring-2 focus:ring-[#7a7f63]">
                    <option value="most_recent" {{ $sort === 'most_recent' ? 'selected' : '' }}>Most Recent</option>
                    <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Oldest</option>
                </select>
                @if($search !== '')
                    <input type="hidden" name="search" value="{{ $search }}">
                @endif
            </form>
        </div>

        <form action="{{ route('admin.customers.index') }}" method="GET" class="w-full md:w-[320px] flex gap-2">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search..."
                   class="w-full rounded border border-[#7a7f63] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#7a7f63]"
            >
            <input type="hidden" name="sort" value="{{ $sort }}">
            <button type="submit" class="rounded bg-[#989d7f] px-4 py-2 text-sm font-semibold text-black hover:bg-[#7a7f63]">
                Search
            </button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[720px] border-separate border-spacing-y-3">
            <thead>
                <tr class="bg-[#989d7f] text-black uppercase text-sm">
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Orders</th>
                    <th class="px-4 py-3 text-left">Join Date</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr class="bg-[#f0f0f0] dark:bg-gray-800">
                        <td class="px-4 py-3 font-semibold text-black dark:text-white">{{ $customer->getName() }}</td>
                        <td class="px-4 py-3 text-black dark:text-white">{{ $customer->email }}</td>
                        <td class="px-4 py-3 text-black dark:text-white">{{ $customer->orders_count }}</td>
                        <td class="px-4 py-3 text-black dark:text-white">{{ optional($customer->email_verified_at)->format('d M Y') ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.customers.show', $customer) }}"
                               class="inline-flex rounded bg-[#4d601f] px-4 py-2 text-sm font-semibold text-white hover:bg-[#3d4d1a]">
                                View/Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-600 dark:text-gray-300">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $customers->links() }}
    </div>
</section>
@endsection
