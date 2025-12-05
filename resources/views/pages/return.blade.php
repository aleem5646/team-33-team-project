@extends('layouts.customer-layout')
@section('title','Return Item')

@section('content')
<div class="w-[90%] max-w-[1000px] mx-auto py-8 font-sans">
    {{-- Form --}}
    @if(session('status'))
        <p class="text-green-600 mb-4 text-base font-bold">{{ session('status') }}</p>
    @endif

    <form id="returnForm" class="bg-[#f9f9f9] dark:bg-gray-800 p-6 rounded-xl shadow-sm flex flex-col md:flex-row gap-6">
        @csrf

        {{-- Left side: text fields --}}
        <div class="flex-1 flex flex-col gap-4">
            <div>
                <label for="order_number" class="block font-bold text-base text-gray-800 dark:text-gray-300 mb-1">Return An Item</label>
                <div class="flex gap-2">
                    <input type="text" name="order_number" id="order_number" required placeholder="Enter Order Number" class="flex-1 p-3 border border-gray-300 dark:border-gray-600 rounded-lg text-base focus:outline-none focus:border-[#69714a] dark:bg-gray-700 dark:text-white">
                    <button type="button" id="checkOrderBtn" class="bg-[#989d7f] text-white px-6 py-3 rounded-lg text-base font-semibold hover:bg-[#7a7f63] transition-colors">Check</button>
                </div>
                <p id="orderMsg" class="text-sm mt-1"></p>
            </div>

            {{-- Items Container (Hidden by default) --}}
            <div id="itemsContainer" class="hidden border border-gray-300 dark:border-gray-600 p-4 rounded-xl bg-white dark:bg-gray-700 shadow-sm">
                <p class="font-bold mb-3 text-base text-gray-800 dark:text-white">Select Item to Return:</p>
                <div id="itemsList" class="space-y-2"></div>
            </div>

            <div>
                <label for="comment" class="block font-bold text-base text-gray-800 dark:text-gray-300 mb-1">Reason for Return</label>
                <textarea name="comment" id="comment" rows="5" required placeholder="Please describe why you are returning this item..." class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg text-base focus:outline-none focus:border-[#69714a] resize-none dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-gray-100 rounded-lg transition-colors">
                <input type="checkbox" name="terms" id="terms" required class="w-5 h-5 accent-[#69714a]">
                <span class="text-base text-gray-700 dark:text-gray-300">I confirm I have read all the terms.</span>
            </label>

            <button type="submit" class="bg-[#69714a] text-white w-full py-3 rounded-lg text-lg font-bold hover:bg-[#555b3e] transition-all shadow-md hover:shadow-lg mt-2">Submit Return Request</button>
            <p id="submitMsg" class="text-center text-sm"></p>
        </div>

        {{-- Right side: upload box --}}
        <div class="flex-1 bg-[#dee1d4] dark:bg-gray-700 border-2 border-[#ccc] dark:border-gray-600 rounded-xl p-4 shadow-inner min-h-[450px] flex flex-col relative overflow-hidden" id="uploadContainer">
            
            {{-- Initial Label --}}
            <div id="uploadLabel" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center">
                <label for="fileInput" class="cursor-pointer flex flex-col items-center justify-center w-full h-full border-4 border-dashed border-[#989d7f]/50 rounded-xl hover:bg-white/20 transition-all group">
                    <svg class="w-16 h-16 text-[#69714a] mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    <span class="block font-bold text-xl text-[#4a503a] dark:text-white mb-1">Upload Proof (optional)</span>
                    <span class="text-[#69714a] dark:text-gray-300 text-base mb-4">Images or PDF (Max 2MB)</span>
                    <span class="bg-[#69714a] text-white px-6 py-2 text-base font-semibold rounded-full shadow-md group-hover:bg-[#555b3e] transition-colors">Browse Files</span>
                </label>
            </div>

            {{-- Image Preview Carousel --}}
            <div id="previewContainer" class="hidden absolute inset-0 flex flex-col bg-[#dee1d4]">
                
                {{-- Main Image Area --}}
                <div class="flex-1 relative p-4 flex items-center justify-center overflow-hidden">
                    <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-full object-contain shadow-xl rounded-lg bg-white">
                    
                    {{-- Navigation Arrows --}}
                    <button type="button" id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 text-gray-800 w-10 h-10 rounded-full hover:bg-white shadow-lg flex items-center justify-center transition-all hover:scale-110 hidden z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button type="button" id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 text-gray-800 w-10 h-10 rounded-full hover:bg-white shadow-lg flex items-center justify-center transition-all hover:scale-110 hidden z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

                {{-- Bottom Control Bar --}}
                <div class="h-16 bg-white/90 backdrop-blur-sm border-t border-gray-200 flex items-center justify-between px-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
                    <span id="imageCounter" class="bg-gray-800 text-white text-sm font-mono px-3 py-1 rounded-full"></span>
                    
                    <div class="flex gap-3">
                        <label for="fileInput" class="cursor-pointer flex items-center gap-2 bg-[#69714a] text-white px-4 py-2 rounded-lg hover:bg-[#555b3e] transition-colors font-semibold shadow-sm text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Add More
                        </label>
                        
                        <button type="button" id="clearBtn" class="flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors font-semibold shadow-sm text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Clear All
                        </button>
                    </div>
                </div>
            </div>

            <input type="file" name="file[]" id="fileInput" multiple accept="image/*" class="hidden">
        </div>
    </form>
</div>

<script>
    const returnForm = document.getElementById('returnForm');
    const checkBtn = document.getElementById('checkOrderBtn');
    const orderInput = document.getElementById('order_number');
    const orderMsg = document.getElementById('orderMsg');
    const itemsContainer = document.getElementById('itemsContainer');
    const itemsList = document.getElementById('itemsList');
    const submitMsg = document.getElementById('submitMsg');

    // Upload Logic
    const fileInput = document.getElementById('fileInput');
    const uploadLabel = document.getElementById('uploadLabel');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const imageCounter = document.getElementById('imageCounter');
    const clearBtn = document.getElementById('clearBtn');

    let currentFiles = [];
    let currentIndex = 0;

    // Handle File Selection (Append Mode)
    fileInput.addEventListener('change', (e) => {
        const newFiles = Array.from(e.target.files).filter(file => file.type.startsWith('image/'));
        if (newFiles.length > 0) {
            currentFiles = [...currentFiles, ...newFiles];
            currentIndex = currentFiles.length - newFiles.length; // Jump to first new image
            showPreview();
        }
        // Reset input so same file can be selected again if needed
        fileInput.value = ''; 
    });

    function showPreview() {
        if (currentFiles.length === 0) {
            resetUpload();
            return;
        }

        uploadLabel.classList.add('hidden');
        previewContainer.classList.remove('hidden');
        
        updateImage();
        updateControls();
    }

    function updateImage() {
        if (currentFiles.length === 0) return;
        
        // Safety check for index
        if (currentIndex >= currentFiles.length) currentIndex = 0;
        if (currentIndex < 0) currentIndex = currentFiles.length - 1;

        const file = currentFiles[currentIndex];
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
        imageCounter.textContent = `${currentIndex + 1} / ${currentFiles.length}`;
    }

    function updateControls() {
        if (currentFiles.length > 1) {
            prevBtn.classList.remove('hidden');
            nextBtn.classList.remove('hidden');
        } else {
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
        }
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + currentFiles.length) % currentFiles.length;
        updateImage();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % currentFiles.length;
        updateImage();
    });

    clearBtn.addEventListener('click', () => {
        currentFiles = [];
        resetUpload();
    });

    function resetUpload() {
        uploadLabel.classList.remove('hidden');
        previewContainer.classList.add('hidden');
        previewImage.src = '';
        fileInput.value = '';
    }

    // Order Check Logic
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
                        div.className = 'flex items-center gap-3 mb-2 p-3 border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-md transition-colors';
                        div.innerHTML = `
                            <input type="radio" name="order_item_id" value="${item.id}" required id="item_${item.id}" class="w-5 h-5 accent-[#69714a]">
                            <label for="item_${item.id}" class="text-base cursor-pointer w-full flex flex-col">
                                <span class="font-bold text-gray-800 dark:text-white">${item.name}</span> 
                                <span class="text-gray-500 dark:text-gray-300 text-sm">Price: £${item.price} &bull; Qty: ${item.quantity}</span>
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

    // Form Submission (AJAX)
    returnForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(returnForm);
        
        // Append files manually from our array
        // First remove any existing 'file[]' entries that might be empty from the input
        formData.delete('file[]');
        
        currentFiles.forEach(file => {
            formData.append('file[]', file);
        });

        submitMsg.textContent = 'Submitting...';
        submitMsg.className = 'mt-2 text-sm text-gray-600';

        try {
            const response = await fetch('{{ route("returns.submit") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (response.ok) {
                // Success - Reload to show flash message or just show it here
                // Since the controller redirects back with status, we can reload
                window.location.reload();
            } else {
                const data = await response.json();
                submitMsg.textContent = data.message || 'Error submitting return.';
                submitMsg.className = 'mt-2 text-sm text-red-600';
            }
        } catch (error) {
            console.error(error);
            submitMsg.textContent = 'An error occurred. Please try again.';
            submitMsg.className = 'mt-2 text-sm text-red-600';
        }
    });
</script>

@endsection
