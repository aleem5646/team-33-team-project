@extends('layout')
@section('title','Order List')

@section('content')

<div class="w-[90%] mx-auto py-10">

    <div class="mt-6">
        <h2 class="font-extrabold text-xl tracking-wide text-black inline-block border-b-4 border-black pb-1">
            ORDER LIST
        </h2>

        <div class="mt-3 flex items-center gap-3">
            <div class="inline-flex items-center bg-[#e5f2a6] border-2 border-gray-800">
                <span class="px-3 py-1 text-sm font-bold text-black">FILTER:</span>
                <select class="bg-[#e5f2a6] pr-8 pl-2 py-1 text-sm font-bold text-black focus:outline-none">
                    <option>ALL</option>
                    <option>DELIVERING</option>
                    <option>IN PROGRESS</option>
                    <option>DELIVERED</option>
                    <option>RETURNED</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-5 border-2 border-gray-800 bg-white overflow-x-auto">
        <div class="grid grid-cols-5 min-w-[720px] bg-[#969f82] text-black font-bold text-sm border-b-2 border-gray-800">
            <div class="p-3">ORDER</div>
            <div class="p-3">DATE</div>
            <div class="p-3">STATUS</div>
            <div class="p-3">TOTAL</div>
            <div class="p-3 text-center">ACTIONS</div>
        </div>

        <div class="grid grid-cols-5 min-w-[720px] items-center border-b-2 border-gray-800">
            <div class="p-3">
                <div class="w-20 bg-[#e5f2a6] border-2 border-gray-800 text-[10px] font-bold text-black text-center py-2 leading-tight">
                    ORDER<br>ID
                </div>
            </div>
            <div class="p-3">
                <input value="21/10/2025" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="Delivering" class="w-32 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="£26.98" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3 flex justify-center">
                <button class="w-28 py-2 bg-[#2f3817] text-white font-bold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                    VIEW
                </button>
            </div>
        </div>

        <div class="grid grid-cols-5 min-w-[720px] items-center border-b-2 border-gray-800">
            <div class="p-3">
                <div class="w-20 bg-[#e5f2a6] border-2 border-gray-800 text-[10px] font-bold text-black text-center py-2 leading-tight">
                    ORDER<br>ID
                </div>
            </div>
            <div class="p-3">
                <input value="11/11/2023" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="In Progress" class="w-32 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="£65.89" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3 flex justify-center">
                <button class="w-28 py-2 bg-[#2f3817] text-white font-bold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                    VIEW
                </button>
            </div>
        </div>

        <div class="grid grid-cols-5 min-w-[720px] items-center border-b-2 border-gray-800">
            <div class="p-3">
                <div class="w-20 bg-[#e5f2a6] border-2 border-gray-800 text-[10px] font-bold text-black text-center py-2 leading-tight">
                    ORDER<br>ID
                </div>
            </div>
            <div class="p-3">
                <input value="28/03/2024" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="Delivered" class="w-32 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="£155.45" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3 flex justify-center">
                <button class="w-28 py-2 bg-[#2f3817] text-white font-bold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                    VIEW
                </button>
            </div>
        </div>

        <div class="grid grid-cols-5 min-w-[720px] items-center">
            <div class="p-3">
                <div class="w-20 bg-[#e5f2a6] border-2 border-gray-800 text-[10px] font-bold text-black text-center py-2 leading-tight">
                    ORDER<br>ID
                </div>
            </div>
            <div class="p-3">
                <input value="26/05/2023" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="Returned" class="w-32 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3">
                <input value="£0.00" class="w-28 h-7 border-2 border-gray-600 px-2 text-sm bg-white" />
            </div>
            <div class="p-3 flex justify-center">
                <button class="w-28 py-2 bg-[#2f3817] text-white font-bold text-sm border-2 border-[#1f250f] hover:bg-[#222a10] transition">
                    VIEW
                </button>
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