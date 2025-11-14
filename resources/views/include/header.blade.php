<nav class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            
            <div class="flex-1">
                <a href="{{ route('home') }}" class="flex-shrink-0">
                    <span class="bg-gray-200 text-gray-700 w-12 h-12 rounded-full flex items-center justify-center text-sm font-medium">
                        LOGO
                    </span>
                </a>
            </div>
            
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">HOME</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">PRODUCTS</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">CONTACT</a>
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">ABOUT</a>
                </div>
            </div>

            <div class="flex-1 flex justify-end items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">BASKET</a>
                
                @auth
                    <a href="#" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">USER PROFILE</a>
                    <a href="{{ route('logout') }}" class="text-red-600 hover:text-red-800 px-3 py-2 rounded-md text-sm font-medium">LOGOUT</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">LOGIN</a>
                    <a href="{{ route('registration') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium">SIGN UP</a>
                @endauth
            </div>

            <div class="sm:hidden">
                <button type="button" class="bg-gray-100 p-2 rounded-md text-gray-600">
                    <span class="sr-only">Open main menu</span>
                </button>
            </div>
        </div>
    </div>
</nav>