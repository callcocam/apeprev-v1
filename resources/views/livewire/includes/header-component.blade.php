<div class="w-full flex justify-between items-center md:h-8 bg-gray-700">
 <div class="flex-1 flex justify-center items-center text-white text-center px-2">
    <h1 class="font-bold"> {{ $tenant->name }}</h1>
 </div>
  @if (Route::has('login'))
    <div class="hidden px-6 sm:flex justify-center items-center">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-100 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-100 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-100 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

</div>
