<li class="hoverable px-1 pt-1 border-t-2 border-transparent hover:border-gray-300 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
    <a href="#"
        class="relative flex w-full py-2 px-1 lg:py-5 text-sm lg:text-base font-bold hover:bg-gray-50 hover:text-gray-800">
        {{ $label }} 
    </a>
    <div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-white  z-30">
        <div class="max-w-6xl md:mx-auto w-full flex flex-wrap justify-start mx-2">
              {{ $slot }}
        </div>
    </div>
</li>