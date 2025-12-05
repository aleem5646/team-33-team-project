@extends('layouts.customer-layout')
@section('title','Home')

@section('content')

    <div class="w-[90%] max-w-[1200px] mx-auto py-10">
        <div class="flex gap-10 justify-center items-start flex-col md:flex-row">
            
            <div class="flex-1 p-5 bg-[#92b09a] text-white min-h-[400px] flex flex-col justify-center rounded-lg">
                <h3 class="text-[1.2rem] mb-[15px]">CONTACT INFO</h3>
                <p>(email address, phone number, address, etc..)</p>
                <!-- Using placeholder icons/emojis as per the wireframe text -->
                <p>📞 +44 7777 777777</p>
                <p>✉️ name@solara.com</p>
                <p>📍 Aston St, Birmingham B4 7ET</p>
            </div>

            <div class="flex-1 p-5 bg-[#f9f9f9] rounded-lg">
                <form action="#" method="POST">
                    <div class="mb-[15px]">
                        <label for="name" class="block mb-[5px] font-bold">Name*</label>
                        <input type="text" id="name" name="name" placeholder="name...." required class="w-full p-[10px] border border-[#ccc] rounded text-base">
                    </div>
                    <div class="mb-[15px]">
                        <label for="email" class="block mb-[5px] font-bold">Email*</label>
                        <input type="email" id="email" name="email" placeholder="name@example.com" required class="w-full p-[10px] border border-[#ccc] rounded text-base">
                    </div>
                    <div class="mb-[15px]">
                        <label for="subject" class="block mb-[5px] font-bold">Subject*</label>
                        <input type="text" id="subject" name="subject" required class="w-full p-[10px] border border-[#ccc] rounded text-base">
                    </div>
                    <div class="mb-[15px]">
                        <label for="message" class="block mb-[5px] font-bold">Message*</label>
                        <textarea id="message" name="message" required class="w-full p-[10px] border border-[#ccc] rounded text-base min-h-[150px] resize-y"></textarea>
                    </div>
                    <div class="mt-[20px]">
                        <button type="submit" class="w-full p-[15px] bg-[#4CAF50] text-white border-none rounded text-[1.1rem] uppercase cursor-pointer transition hover:bg-[#45a049]">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        console.log("Contact page script loaded.");
    </script>

@endsection