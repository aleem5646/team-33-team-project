@extends('layout')
@section('title','Admin Dashboard')

@section('content')

<div class="w-[90%] mx-auto py-10">

    <div class="flex justify-between items-center gap-4 mt-6 flex-col md:flex-row">
        <h2 class="font-extrabold text-xl tracking-wide text-black">
            ORDER DETAILS
        </h2>

        <div class="flex flex-wrap gap-2 justify-end">
            <button class="px-4 py-2 bg-[#2f3817] text-white font-semibold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                Mark as Shipped
            </button>
            <button class="px-4 py-2 bg-[#2f3817] text-white font-semibold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                Cancel Order
            </button>
            <button class="px-4 py-2 bg-[#2f3817] text-white font-semibold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                Refund
            </button>
            <button class="px-4 py-2 bg-[#2f3817] text-white font-semibold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                Edit
            </button>
            <button class="px-4 py-2 bg-[#2f3817] text-white font-semibold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                Save
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        <div>
            <label class="block font-bold text-black mb-1">Email*</label>
            <input
                type="email"
                value="name@example.com"
                class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
            />

            <h3 class="font-bold text-black mt-4 mb-2">Shipping Address</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <input
                        type="text"
                        placeholder="First Name"
                        class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        placeholder="Last Name"
                        class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                    />
                </div>
            </div>

            <div class="mt-3">
                <input
                    type="text"
                    placeholder="Address"
                    class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                />
            </div>

            <div class="mt-3">
                <input
                    type="text"
                    placeholder="Apartment, suite, etc (optional)"
                    class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                <div>
                    <input
                        type="text"
                        placeholder="City"
                        class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                    />
                </div>
                <div>
                    <input
                        type="text"
                        placeholder="Postcode"
                        class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white"
                    />
                </div>
            </div>
        </div>

        <div class="space-y-4">

            <div class="border-2 border-gray-700 bg-white">
                <div class="grid grid-cols-4 bg-[#969f82] text-black font-bold text-sm border-b-2 border-gray-700">
                    <div class="p-3 border-r-2 border-gray-700">Product Name</div>
                    <div class="p-3 border-r-2 border-gray-700">Quantity</div>
                    <div class="p-3 border-r-2 border-gray-700">Price Per Item</div>
                    <div class="p-3">Total</div>
                </div>
                <div class="h-20"></div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-black mb-1">Order Status</label>
                    <input type="text" class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white" />
                </div>
                <div>
                    <label class="block font-bold text-black mb-1">Payment Status</label>
                    <input type="text" class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white" />
                </div>

                <div>
                    <label class="block font-bold text-black mb-1">Delivery Status</label>
                    <input type="text" class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white" />
                </div>
                <div>
                    <label class="block font-bold text-black mb-1">Tracking Number</label>
                    <input type="text" class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white" />
                </div>

                <div class="col-span-2">
                    <label class="block font-bold text-black mb-1">Notes (requests)</label>
                    <input type="text" class="w-full h-8 border-2 border-gray-700 px-2 text-sm bg-white" />
                </div>
            </div>
        </div>
    </div>

    <button
        class="fixed bottom-6 right-6 w-12 h-12 rounded bg-[#86b26a] border-2 border-gray-800 shadow-lg flex items-center justify-center hover:scale-105 transition"
    >
        <span class="text-2xl">💬</span>
    </button>

</div>

@endsection