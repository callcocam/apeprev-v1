<li class="hoverable px-1 pt-1 text-sm font-medium leading-5 text-gray-500 border-t-2 border-transparent hover:border-gray-300 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
    <a href="#"
        class="relative flex w-full py-6 px-4 lg:p-5 text-sm lg:text-base font-bold hover:bg-gray-50 hover:text-gray-900">
        {{ $label }}
    </a>
    <div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-white  z-30">
        <div class="container md:mx-auto w-full flex flex-wrap justify-start mx-2">
            <div class="w-full text-gray-800 mb-8 text-center">
                @if ($header)
                    <h2 class="font-bold text-2xl">{{ $header }}</h2>
                @endif
                @if ($description)
                    <p>{{ $description }}</p>
                @endif
            </div>
            {{ $slot }}
        </div>
    </div>
</li>
