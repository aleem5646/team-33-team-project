<header class="max-w-screen justify-between relative flex items-center border-b border-[#D9D9D9] bg-white dark:bg-primary-black top-0 left-0">
    
    {{-- Logo --}}
    <div class="px-6 py-6 max-h-full items-center shrink-0">
        <img src="{{ asset('imgs/Solara_Logo.svg') }}" alt="Solara Logo" class="h-6 w-auto">
    </div>

    {{-- width >= medium, display navlinks --}}
    <nav class="hidden sm:flex">
        <ul class="flex flex-row gap-x-4 text-gray-800 dark:text-gray-200">
            <li><button class="p-2 hover:bg-[#F5F5F5] border-0 rounded-sm hover:dark:bg-[#444]"><a href="{{ route("home") }}">Home</a></button></li>
            <li><button class="p-2 hover:bg-[#F5F5F5] border-0 rounded-sm hover:dark:bg-[#444]"><a href="{{ route("products.index") }}">Products</a></button></li>
            <li><button class="p-2 hover:bg-[#F5F5F5] border-0 rounded-sm hover:dark:bg-[#444]"><a href="{{ route("contact") }}">Contact</a></button></li>
            <li><button class="p-2 hover:bg-[#F5F5F5] border-0 rounded-sm hover:dark:bg-[#444]"><a href="{{ route("about") }}">About</a></button></li>
        </ul>
    </nav>

    {{-- Mobile drop down nav --}}
    <nav id="nav-dropdown" class="hidden sm:hidden bg-[#F5F5F5] dark:bg-[#121212] top-full left-0 absolute flex-col px-6 pb-16 pt-16 min-w-full">

        <ul class="list-none text-2xl flex flex-col gap-y-4 pb-16 text-[20px] dark:text-gray-200">
            <li><a href="{{ route("home") }}">Home</a></li>
            <li><a href="{{ route("products.index") }}">Products</a></li>
            <li><a href="{{ route("contact") }}">Contact</a></li>
            <li><a href="{{ route("about") }}">About</a></li>
        </ul>

        <div class="flex flex-col gap-y-4">
            @auth
                <button class="rounded-sm px-2 py-2 bg-brand-teal text-gray-800"><a href="{{ route("profile") }}">My Account</a></button>
                <button class="rounded-sm px-2 py-2 bg-red-500 text-gray-200"><a href="{{ route("logout") }}">Logout</a></button>
            @endauth

            @guest
                <button class="rounded-sm px-2 py-2 bg-brand-green text-gray-200"><a href="{{ route("registration") }}">Register</a></button>
                <button class="rounded-sm px-2 py-2 bg-secondary-grey text-brand-green "><a href="{{ route("login") }}">Login</a></button>
            @endguest
        </div>

    </nav>

    <div class="flex flex-row items-center gap-x-2 divide-x-[1.25px] divide-[#D9D9D9]">
        <div class="gap-x-2 items-center min-h-full divide-x-[1.25px] divide-[#D9D9D9]">
            @auth
                <button type="button" id="basket" class="hover:cursor-pointer relative min-h-full pl-1 pr-2">
                    <a href="{{ route("basket.index") }}">
                        <svg class="fill-gray-950 dark:fill-gray-50 w-8 h-8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 1.5C12.8728 1.5 13.5534 1.79505 14.0664 2.25098C14.569 2.69776 14.888 3.27813 15.0928 3.82422C15.2983 4.37225 15.3993 4.91338 15.4492 5.3125C15.4575 5.37862 15.463 5.44142 15.4688 5.5H19C19.8284 5.5 20.5 6.17157 20.5 7V20C20.5 20.8284 19.8284 21.5 19 21.5H5C4.17157 21.5 3.5 20.8284 3.5 20V7C3.5 6.17157 4.17157 5.5 5 5.5H8.53125C8.53701 5.44142 8.54252 5.37862 8.55078 5.3125C8.6007 4.91338 8.70171 4.37225 8.90723 3.82422C9.11205 3.27813 9.43096 2.69776 9.93359 2.25098C10.4466 1.79505 11.1272 1.5 12 1.5ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7V20C4.5 20.2761 4.72386 20.5 5 20.5H19C19.2761 20.5 19.5 20.2761 19.5 20V7C19.5 6.72386 19.2761 6.5 19 6.5H5ZM12 2.5C11.3729 2.5 10.9284 2.70507 10.5977 2.99902C10.2568 3.30214 10.0129 3.72207 9.84277 4.17578C9.67345 4.62742 9.58681 5.08675 9.54297 5.4375C9.54032 5.45872 9.53945 5.47969 9.53711 5.5H14.4629C14.4605 5.47969 14.4597 5.45872 14.457 5.4375C14.4132 5.08675 14.3266 4.62742 14.1572 4.17578C13.9871 3.72207 13.7432 3.30214 13.4023 2.99902C13.0716 2.70507 12.6271 2.5 12 2.5Z"/>
                        </svg>
                    </a>

                    {{-- Check if user has one or more items in basket and show counter on the basket--}}
                    @if (count(Auth::user()->basket()->items()) >= 1)
                        <span class="absolute text-[11px] money -bottom-2 right-0.75 text-gray-200 dark:text-gray-800 bg-black dark:bg-white rounded-full py-px px-1">{{ count(Auth::user()->basket()->items()) }}</span>
                    @endif
                </button>
            @endauth

            {{-- dark/light mode toggle --}}
            
            <button type="button" id="theme-toggle" class="hover:cursor-pointer items-center h-full pl-1 pr-2">
                <svg class="w-8 h-8 fill-none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22V2Z" fill="none"/>
                    <path class="fill-black dark:fill-white" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2V22Z"/>
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2M12 22V2" class="stroke-black dark:stroke-white" stroke-width="0.75" stroke-linecap="round"/>
                </svg>
            </button>
            
        </div>

        {{-- Mobile menu icon --}}
        <div class="sm:hidden pr-4 py-6 items-center max-h-full">
            <button id="menu-toggle" type="button" class="hover:cursor-pointer md:hidden items-center">
                <svg id="open-icon" class="w-8 h-8 fill-brand-green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 19.25C20.4142 19.25 20.75 19.5858 20.75 20C20.75 20.4142 20.4142 20.75 20 20.75H8C7.58579 20.75 7.25 20.4142 7.25 20C7.25 19.5858 7.58579 19.25 8 19.25H20ZM20 11.25C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H20ZM20 3.25C20.4142 3.25 20.75 3.58579 20.75 4C20.75 4.41421 20.4142 4.75 20 4.75H4C3.58579 4.75 3.25 4.41421 3.25 4C3.25 3.58579 3.58579 3.25 4 3.25H20Z" />
                </svg>

                {{-- Menu close icon --}}
                <svg id="close-icon" class="hidden w-6 h-6 fill-brand-green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.293 3.29297C19.6835 2.90244 20.3165 2.90244 20.707 3.29297C21.0975 3.6835 21.0975 4.31653 20.707 4.70703L13.4141 12L20.707 19.293C21.0975 19.6835 21.0975 20.3165 20.707 20.707C20.3165 21.0975 19.6835 21.0975 19.293 20.707L12 13.4141L4.70703 20.707C4.31653 21.0975 3.6835 21.0975 3.29297 20.707C2.90244 20.3165 2.90244 19.6835 3.29297 19.293L10.5859 12L3.29297 4.70703C2.90244 4.31651 2.90244 3.68349 3.29297 3.29297C3.68349 2.90244 4.31651 2.90244 4.70703 3.29297L12 10.5859L19.293 3.29297Z" />
                </svg>

            </button>
        </div>

        <div class="hidden sm:flex flex-row items-center gap-x-2 sm:pr-8">
            @auth
                <button class="py-2 px-4  rounded-xsm bg-brand-teal text-gray-800"><a href="{{ route("profile") }}">My Account</a></button>
                <button class="py-2 px-4 rounded-xsm bg-red-500 text-gray-200"><a href="{{ route("logout") }}">Logout</a></button>
            @endauth

            @guest
                <button class="py-2 px-4 rounded-xsm bg-brand-green text-gray-200"><a href="{{ route("login") }}">Login</a></button>
                <button class="py-2 px-4 rounded-xsm bg-secondary-grey text-brand-green dark:bg-gray-200"><a href="{{ route("registration") }}">Register</a></button>
            @endguest
        </div>
    </div>
</header>