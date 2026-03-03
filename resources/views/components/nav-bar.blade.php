<header class="max-w-screen justify-between relative flex items-center border-b border-[#D9D9D9] bg-white dark:bg-primary-black">
    
    {{-- Logo --}}
    <div class="px-6 py-6 max-h-full items-center">
        <img src="{{ asset('imgs/Solara_Logo.svg') }}" alt="Solara Logo" class="h-6 w-auto">
    </div>

    {{-- width >= medium, display navlinks --}}
    <nav class="hidden md:flex">
        <ul class="gap-x-4">
            <li><a href="{{ route("home") }}">Home</a></li>
            <li><a href="{{ route("products.index") }}">Products</a></li>
            <li><a href="{{ route("contact") }}">Contact</a></li>
            <li><a href="{{ route("about") }}">About</a></li>
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
            <button class="rounded-sm px-2 py-2 bg-brand-green text-gray-200"><a href="{{ route("registration") }}">Register</a></button>
            <button class="border rounded-sm px-2 py-2 text-brand-green dark:bg-gray-200"><a href="{{ route("login") }}">Login</a></button>
        </div>

    </nav>

    <div class="flex max-h-full items-center">

        {{-- dark/light mode toggle --}}
        <div class="border-l-[1.25px] sm:border-none border-[#D9D9D9] px-6 py-6 items-center max-h-full">
            <button type="button" id="theme-toggle" class="hover:cursor-pointer">
                <svg class="w-6 h-6 fill-none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22V2Z" fill="none"/>
                    <path class="fill-black dark:fill-white" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2V22Z"/>
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2M12 22V2" class="stroke-black dark:stroke-white" stroke-width="0.75" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu icon --}}
        <div class="border-l-[1.25px] border-[#D9D9D9] sm:hidden px-6 py-6 items-center max-h-full">
            <button id="menu-toggle" type="button" class="hover:cursor-pointer md:hidden">
                <svg id="open-icon" class="w-6 h-6 fill-brand-green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 19.25C20.4142 19.25 20.75 19.5858 20.75 20C20.75 20.4142 20.4142 20.75 20 20.75H8C7.58579 20.75 7.25 20.4142 7.25 20C7.25 19.5858 7.58579 19.25 8 19.25H20ZM20 11.25C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H20ZM20 3.25C20.4142 3.25 20.75 3.58579 20.75 4C20.75 4.41421 20.4142 4.75 20 4.75H4C3.58579 4.75 3.25 4.41421 3.25 4C3.25 3.58579 3.58579 3.25 4 3.25H20Z" />
                </svg>

                {{-- Menu close icon --}}
                <svg id="close-icon" class="hidden w-6 h-6 fill-brand-green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.293 3.29297C19.6835 2.90244 20.3165 2.90244 20.707 3.29297C21.0975 3.6835 21.0975 4.31653 20.707 4.70703L13.4141 12L20.707 19.293C21.0975 19.6835 21.0975 20.3165 20.707 20.707C20.3165 21.0975 19.6835 21.0975 19.293 20.707L12 13.4141L4.70703 20.707C4.31653 21.0975 3.6835 21.0975 3.29297 20.707C2.90244 20.3165 2.90244 19.6835 3.29297 19.293L10.5859 12L3.29297 4.70703C2.90244 4.31651 2.90244 3.68349 3.29297 3.29297C3.68349 2.90244 4.31651 2.90244 4.70703 3.29297L12 10.5859L19.293 3.29297Z" />
                </svg>

            </button>
        </div>

    </div>

</header>