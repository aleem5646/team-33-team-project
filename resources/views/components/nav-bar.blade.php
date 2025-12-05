<nav class="border-b" style="background-color:#989d7f; border-color:#7a7f63;">
   <div class="w-full px-4">
        <div class="flex items-center h-24">
            <div class="flex-1">
                <a href="{{ route('home') }}" class="shrink-0">
                    <img src="{{ asset('imgs/Solara_Logo.svg') }}" alt="Solara Logo" class="h-[75px] w-auto">
                </a>
            </div>

            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        HOME
                    </a>
                    <a href="{{ route('products.index') }}" class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        PRODUCTS
                    </a>
                    <a href="#" class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        CONTACT
                    </a>
                    <a href="#" class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        ABOUT
                    </a>
                </div>
            </div>

            <div class="flex-1 flex justify-end items-center space-x-4">
                <a href="#" class="flex items-center text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8h13.2L17 13M7 13h10" />
                    </svg>
                    BASKET
                </a>

                @auth
                    <a href="#" class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        USER PROFILE
                    </a>
                    <a href="{{ route('logout') }}" class="text-red-600 hover:text-red-800 px-3 py-2 rounded-md text-sm font-medium">
                        LOGOUT
                    </a>
                @else
                    <div class="relative">
                        <button id="profileMenuButton" class="flex items-center bg-white p-2 rounded-full text-black hover:text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5z"/>
                            </svg>
                        </button>
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-44 bg-white border rounded-md shadow-lg">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap">
                                Login
                            </a>
                            <a href="{{ route('registration') }}" class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap">
                                Sign Up
                            </a>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="sm:hidden">
                <button type="button" class="bg-white p-2 rounded-md text-black">
                    <span class="sr-only">Open main menu</span>
                </button>
            </div>

        </div>
    </div>

    <script>
        const btn = document.getElementById('profileMenuButton');
        const dd = document.getElementById('profileDropdown');
        if (btn && dd) {
            btn.addEventListener('click', () => dd.classList.toggle('hidden'));
        }
    </script>
</nav>
