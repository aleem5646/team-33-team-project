@extends('layouts.customer-layout')

@section('title','contact')

@section('content')

    <main class="container mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row gap-8 justify-center items-start">
            
            <!-- Introduction Block (Left Side) -->
            <div class="md:w-1/2 bg-[#92b09a] dark:bg-[#556b2f] text-white p-10 rounded-lg shadow-lg flex flex-col justify-center">
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
            <div class="md:w-1/2 bg-gray-50 dark:bg-gray-800 p-10 rounded-lg shadow-lg">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 mb-4 border border-green-200 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 mb-4 border border-red-200 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4 mb-4">
                        <div class="w-full md:w-1/2">
                            <label for="first_name" class="block mb-2 font-semibold dark:text-gray-300">First Name*</label>
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required 
                                   class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                        </div>
                        <div class="w-full md:w-1/2">
                            <label for="last_name" class="block mb-2 font-semibold dark:text-gray-300">Last Name*</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required 
                                   class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 font-semibold dark:text-gray-300">Email*</label>
                        <input type="email" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                               class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block mb-2 font-semibold dark:text-gray-300">Subject*</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                               class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:text-white">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 font-semibold dark:text-gray-300">Message*</label>
                        <textarea id="message" name="message" required rows="5"
                                  class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 resize-y dark:bg-gray-700 dark:text-white">{{ old('message') }}</textarea>
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

@endsection
