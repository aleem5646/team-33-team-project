<head>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('Solara_Logo.png') }}">
</head>

<!-- Navigation Bar -->
<nav class="border-b bg-[#989d7f] border-[#7a7f63] relative z-50">
    <div class="w-[90%] max-w-[1200px] mx-auto py-5">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex-1">
                <a href="{{ route('home') }}" class="flex-shrink-0">
                    <img src="{{ asset('imgs/Solara_Logo.svg') }}" 
                         alt="Solara Logo" 
                         class="h-[75px] w-auto">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" 
                       class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        HOME
                    </a>
                    <a href="#" 
                       class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        PRODUCTS
                    </a>
                    <a href="#" 
                       class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        CONTACT
                    </a>
                    <a href="{{ route('about') }}" 
                       class="text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                        ABOUT
                    </a>
                </div>
            </div>

            <!-- Right Side (Basket + Auth/Profile) -->
            <div class="flex-1 flex justify-end items-center space-x-4">

                <!-- Basket -->
                <a href="#" 
                   class="flex items-center text-black hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-5 w-5 mr-1" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8h13.2L17 13M7 13h10" />
                    </svg>
                    BASKET
                </a>

                @auth
                    <!-- Authenticated User Dropdown -->
                    <div class="relative">
                        <button id="authProfileMenuButton" 
                                class="flex items-center bg-white p-2 rounded-full text-black hover:text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-6 w-6" 
                                 fill="currentColor" 
                                 viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5z"/>
                            </svg>
                        </button>
                        <div id="authProfileDropdown" 
                             class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 overflow-hidden">
                            <a href="#" 
                               class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap text-center border-b border-gray-200">
                                My Profile
                            </a>
                            <a href="#" 
                               class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap text-center border-b border-gray-200">
                                Dark Mode
                            </a>
                            <a href="{{ route('logout') }}" 
                               class="block px-4 py-2 text-red-600 hover:bg-gray-100 whitespace-nowrap text-center">
                                Logout
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Guest Profile Dropdown -->
                    <div class="relative">
                        <button id="guestProfileMenuButton" 
                                class="flex items-center bg-white p-2 rounded-full text-black hover:text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-6 w-6" 
                                 fill="currentColor" 
                                 viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5z"/>
                            </svg>
                        </button>
                        <div id="guestProfileDropdown" 
                             class="hidden absolute right-0 mt-2 w-44 bg-white border rounded-md shadow-lg z-50 overflow-hidden">
                            <a href="{{ route('login') }}" 
                               class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap text-center border-b border-gray-200">
                                Login
                            </a>
                            <a href="{{ route('registration') }}" 
                               class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap text-center border-b border-gray-200">
                                Sign Up
                            </a>
                            <a href="#" 
                               class="block px-4 py-2 text-black hover:bg-gray-100 whitespace-nowrap text-center">
                                Dark Mode
                            </a>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden">
                <button type="button" class="bg-white p-2 rounded-md text-black">
                    <span class="sr-only">Open main menu</span>
                </button>
            </div>

        </div>
    </div>

<script>
    // Auth Dropdown
    const authBtn = document.getElementById('authProfileMenuButton');
    const authDd = document.getElementById('authProfileDropdown');
    if (authBtn && authDd) {
        authBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            authDd.classList.toggle('hidden');
        });
        document.addEventListener('click', (e) => {
            if (!authBtn.contains(e.target) && !authDd.contains(e.target)) {
                authDd.classList.add('hidden');
            }
        });
    }

    // Guest Dropdown
    const guestBtn = document.getElementById('guestProfileMenuButton');
    const guestDd = document.getElementById('guestProfileDropdown');
    if (guestBtn && guestDd) {
        guestBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            guestDd.classList.toggle('hidden');
        });
        document.addEventListener('click', (e) => {
            if (!guestBtn.contains(e.target) && !guestDd.contains(e.target)) {
                guestDd.classList.add('hidden');
            }
        });
    }
</script>

</nav>
