<footer class="bg-white dark:bg-primary-black border-t border-[#D9D9D9] block max-w-screen">
    <div class="pt-8 pb-40 px-4 sm:px-8 lg:px-16 xl:px-32 block sm:flex max-w-full gap-x-8">
        {{-- Logo and slogan on the left --}}
        <div class="px-4 sm:pl-0 sm:pr-4 flex-auto justify-items-start">
            <div class="block pb-6">
                <h3 class="font-bold font-satoshi text-[52px] dark:text-gray-50">Solara</h3>
            </div>
            <p class="font-inter font-medium dark:text-gray-50">Bright Goods for a Better <br> Planet.</p>
        </div>

        {{-- Sitemap links --}}

        {{-- Shopping categories --}}
        <div class="p-4 flex-auto gap-4 block justify-items-start">
            <div class="pb-4 max-w-full justify-items-start">
                <p class="text-gray-900 dark:text-gray-50"><strong>Shop</strong></p>
            </div>
            @use ("App\Models\Category")
            <ul class="list-none text-gray-800 dark:text-gray-200 gap-4 block font-open-sans">
                @foreach (Category::all() as $category)
                    {{-- Generated urls to all product categories --}}
                    <li class="hover:underline"><a href="{{ url("/products") }}?category={{ $category->categoryId }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

        {{-- Account related links --}}
        <div class="p-4 flex-auto gap-4 block justify-items-start">
            <div class="pb-4 max-w-full justify-items-start">
                <p class="text-gray-900 dark:text-gray-50"><strong>Account</strong></p>
            </div>
            <ul class="list-none text-gray-800 dark:text-gray-200 gap-4 block font-open-sans">
                <li class="hover:underline"><a href="{{ route("profile") }}">Manage my account</a></li>
            </ul>
        </div>

        {{-- Order related links --}}
        <div class="p-4 flex-auto gap-4 block justify-items-start">
            <div class="pb-4 max-w-full justify-items-start">
                <p class="text-gray-900 dark:text-gray-50"><strong>Orders & Returns</strong></p>
            </div>
            <ul class="list-none text-gray-800 dark:text-gray-200 gap-4 block font-open-sans">
                <li class="hover:underline"><a href="#">Track order</a></li>
                <li class="hover:underline"><a href="{{ route("returns.form") }}">Returns</a></li>
            </ul>
        </div>

        {{-- Support related links --}}
        <div class="p-4 flex-auto gap-4 block justify-items-start">
            <div class="pb-4 max-w-full justify-items-start">
                <p class="text-gray-900 dark:text-gray-50"><strong>Support</strong></p>
            </div>
            <ul class="list-none text-gray-800 dark:text-gray-200 gap-4 block font-open-sans">
                <li class="hover:underline"><a href="{{ route("about") }}">About us</a></li>
                <li class="hover:underline"><a href="#">FAQ</a></li>
                <li class="hover:underline"><a href="{{ route("contact") }}">Contact us</a></li>
                <li class="hover:underline"><a href="#">Testimonials</a></li>
            </ul>
        </div>
    </div>

    {{-- Legal Information --}}
    <div class="justify-center flex border-t border-[#D9D9D9] max-w-full">
        <div class="py-4 px-4">
            <p>© 2026 Solara.</p>
        </div>
        <div class="py-4 px-4">
            <ul class="text-gray-800 dark:text-gray-200 items-center list-none gap-4 flex">
                <li class="hover:underline"><a href="#">Terms & Conditions</a></li>
                <li class="border-l border-gray-400 px-4 leading-none hover:underline"><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
    </div>

</footer>
