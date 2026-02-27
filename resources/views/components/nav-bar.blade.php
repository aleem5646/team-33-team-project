<header class="max-w-screen justify-between relative flex items-center border-b border-[#D9D9D9] bg-white dark:bg-primary-black">
    
    {{-- Logo --}}
    <div class="px-6 py-6 max-h-full items-center">
        <img src="{{ asset('imgs/Solara_Logo.svg') }}" alt="Solara Logo" class="h-6 w-auto">
    </div>

    {{-- Mobile drop down nav --}}
    <nav id="nav-dropdown" class="hidden sm:hidden bg-[#F5F5F5] dark:bg-[#444] top-full left-0 absolute flex-col px-4 pb-16 pt-16 min-w-full">

        <ul class="list-none text-2xl flex flex-col gap-y-4 pb-16">
            <li><a href="{{ route("home") }}">Home</a></li>
            <li><a href="{{ route("products.index") }}">Products</a></li>
            <li><a href="{{ route("contact") }}">Contact</a></li>
            <li><a href="{{ route("about") }}">About</a></li>
        </ul>

        <div class="flex flex-col gap-y-4">
            <button class="border rounded-sm px-2 py-2"><a href="{{ route("registration") }}">Register</a></button>
            <button class="border rounded-sm px-2 py-2"><a href="{{ route("login") }}">Login</a></button>
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
                <svg id="icon-open" class="w-6 h-6 fill-brand-green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 19.25C20.4142 19.25 20.75 19.5858 20.75 20C20.75 20.4142 20.4142 20.75 20 20.75H8C7.58579 20.75 7.25 20.4142 7.25 20C7.25 19.5858 7.58579 19.25 8 19.25H20ZM20 11.25C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H20ZM20 3.25C20.4142 3.25 20.75 3.58579 20.75 4C20.75 4.41421 20.4142 4.75 20 4.75H4C3.58579 4.75 3.25 4.41421 3.25 4C3.25 3.58579 3.58579 3.25 4 3.25H20Z" />
                </svg>

                {{-- Menu close icon --}}
                <svg id="icon-close" class="hidden w-6 h-6 fill-primary-black dark:fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.8232 3.82324C19.9209 3.72561 20.0791 3.72561 20.1768 3.82324C20.2744 3.92087 20.2744 4.07913 20.1768 4.17676L12.3535 12L20.1768 19.8232C20.2744 19.9209 20.2744 20.0791 20.1768 20.1768C20.0791 20.2744 19.9209 20.2744 19.8232 20.1768L12 12.3535L4.17676 20.1768C4.07913 20.2744 3.92087 20.2744 3.82324 20.1768C3.72561 20.0791 3.72561 19.9209 3.82324 19.8232L11.6465 12L3.82324 4.17676C3.72561 4.07913 3.72561 3.92087 3.82324 3.82324C3.92087 3.72561 4.07913 3.72561 4.17676 3.82324L12 11.6465L19.8232 3.82324Z" />
                </svg>
            </button>
        </div>

    </div>

</header>