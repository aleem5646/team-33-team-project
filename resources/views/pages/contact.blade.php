@extends('layouts.customer-layout')

@section('title','contact')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
</head>
<body class="bg-white text-gray-800 antialiased">

    <main class="container mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row gap-8 justify-center items-start">
            
            <!-- Introduction Block (Left Side) -->
            <!-- Removed min-h-[400px] and slightly reduced text sizes for compactness -->
            <div class="md:w-1/2 bg-[#92b09a] text-white p-10 rounded-lg shadow-lg flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-4">Hello There!</h2>
                <p class="mb-3 text-base">
                    We are thrilled to connect with you. Whether you have a question about our products, need support, or just want to provide feedback on our service, we're here to help you shine with Solara!
                </p>
                <p class="font-bold mt-3 text-lg">
                    We typically respond within **1-2 business days**.
                </p>
                <p class="mt-3 text-base">
                    Thanks for reaching out!
                </p>
            </div>

            <!-- Contact Form Block (Right Side) -->
            <div class="md:w-1/2 bg-gray-50 p-10 rounded-lg shadow-lg">
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-semibold">Name*</label>
                        <input type="text" id="name" name="name" placeholder="name...." required 
                               class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 font-semibold">Email*</label>
                        <input type="email" id="email" name="email" placeholder="name@example.com" required
                               class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block mb-2 font-semibold">Subject*</label>
                        <input type="text" id="subject" name="subject" required
                               class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 font-semibold">Message*</label>
                        <textarea id="message" name="message" required rows="5"
                                  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 resize-y"></textarea>
                    </div>
                    <div>
                        <button type="submit" 
                                class="w-full p-3 bg-green-600 text-white font-bold uppercase rounded-md hover:bg-green-700 transition duration-300">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>

@endsection
