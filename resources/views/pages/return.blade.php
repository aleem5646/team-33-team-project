@extends('layouts.customer-layout')
@section('title','Return Item')

@section('content')
<div class="max-w-[900px] mx-auto p-5 font-sans">
    {{-- Form --}}
    @if(session('status'))
        <p class="text-green-600">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('returns.submit') }}" enctype="multipart/form-data" class="bg-[#f9f9f9] p-5 rounded-lg mb-[30px] flex justify-between gap-5">
        @csrf

        {{-- Left side: text fields --}}
        <div class="flex-[2]">
            <label for="order_number" class="block mt-[15px] font-bold">Return An Item</label>
            <div class="flex gap-2">
                <input type="text" name="order_number" id="order_number" required placeholder="Order Number *" class="flex-1 p-2.5 mt-[5px] border border-[#ccc] rounded-[5px]">
                <button type="button" id="checkOrderBtn" class="mt-[5px] bg-[#989d7f] text-white px-4 py-2.5 rounded-md hover:bg-[#7a7f63]">Check</button>
            </div>
            <p id="orderMsg" class="text-sm mt-1"></p>

            {{-- Items Container (Hidden by default) --}}
            <div id="itemsContainer" class="hidden mt-4 border p-3 rounded bg-white shadow-sm">
                <p class="font-bold mb-2 text-sm text-gray-700">Select Item to Return:</p>
                <div id="itemsList"></div>
            </div>

            <label for="comment" class="block mt-[15px] font-bold">Reason for Return</label>
            <textarea name="comment" id="comment" rows="5" required placeholder="Comment *" class="w-full p-2.5 mt-[5px] border border-[#ccc] rounded-[5px]"></textarea>

            <label class="block mt-5 font-bold">
                <input type="checkbox" name="terms" required class="mr-2.5">
                I confirm I have read all the terms.
            </label>

            <button type="submit" class="mt-5 bg-[#69714a] text-white px-5 py-2.5 border-none rounded-md cursor-pointer hover:bg-[#555b3e]">Submit Return</button>
        </div>

        {{-- Right side: upload box --}}
        <div class="flex-1 bg-[#dee1d4] border border-[#ccc] rounded-lg p-5 shadow-[0_2px_6px_rgba(0,0,0,0.1)] min-h-[250px] flex flex-col items-center justify-center">
            <label class="block mt-[15px] font-bold mb-[15px]"><strong>Upload File</strong> <em>(optional)</em></label> 
            <input type="file" name="file" class="block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-[#989d7f] file:text-white
              hover:file:bg-[#7a7f63]
              cursor-pointer
            "/>
        </div>
    </form>
</div>

<script>
    const checkBtn = document.getElementById('checkOrderBtn');
    const orderInput = document.getElementById('order_number');
    const orderMsg = document.getElementById('orderMsg');
    const itemsContainer = document.getElementById('itemsContainer');
    const itemsList = document.getElementById('itemsList');

    checkBtn.addEventListener('click', async () => {
        const orderId = orderInput.value;
        if (!orderId) {
            orderMsg.textContent = 'Please enter an order number.';
            orderMsg.className = 'text-sm mt-1 text-red-600';
            return;
        }

        orderMsg.textContent = 'Checking...';
        orderMsg.className = 'text-sm mt-1 text-gray-600';
        itemsContainer.classList.add('hidden');
        itemsList.innerHTML = '';

        try {
            const response = await fetch('{{ route("returns.check_order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ order_number: orderId })
            });

            const data = await response.json();

            if (data.valid) {
                orderMsg.textContent = 'Order found! Please select an item.';
                orderMsg.className = 'text-sm mt-1 text-green-600';
                itemsContainer.classList.remove('hidden');

                if (data.items.length === 0) {
                     itemsList.innerHTML = '<p class="text-sm text-red-500">No items found in this order.</p>';
                } else {
                    data.items.forEach(item => {
                        const div = document.createElement('div');
                        div.className = 'flex items-center gap-2 mb-2 p-2 hover:bg-gray-50 rounded';
                        div.innerHTML = `
                            <input type="radio" name="order_item_id" value="${item.id}" required id="item_${item.id}" class="accent-[#69714a]">
                            <label for="item_${item.id}" class="text-sm cursor-pointer w-full">
                                <span class="font-semibold">${item.name}</span> 
                                <span class="text-gray-500">- £${item.price} (Qty: ${item.quantity})</span>
                            </label>
                        `;
                        itemsList.appendChild(div);
                    });
                }
            } else {
                orderMsg.textContent = data.message || 'Order not found.';
                orderMsg.className = 'text-sm mt-1 text-red-600';
            }
        } catch (error) {
            console.error(error);
            orderMsg.textContent = 'Error checking order. Please try again.';
            orderMsg.className = 'text-sm mt-1 text-red-600';
        }
    });
</script>

@endsection
