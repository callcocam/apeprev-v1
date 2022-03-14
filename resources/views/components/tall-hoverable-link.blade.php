<ul
    class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-200 border-b sm:border-{{ $border }} lg:border-b-0 pb-2 pt-2 lg:pt-3">
    <div class="flex items-center">
        @if ($icon)
            <x-icon name="{{ $icon }}" class="h-8 mb-3 mr-3" />
        @endif
        <h3 class="font-bold text-xl text-gray-700 text-bold mb-2">{{ __($label) }}</h3>
    </div>
    @if ($description)
        <p class="text-gray-600 text-sm">{{ __($description) }}</p>
    @endif
    <div class="flex items-center py-3">
        <svg class="h-6 pr-3 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z" />
        </svg>
        @if (\Route::has($route))
            @if ($restrito)
                @if ($model)
                    <a href="{{ route($route, $model) }}"
                        class="text-gray-700 bold border-b-2 border-gray-300 hover:text-gray-900">
                        {{ __('Find out more') }}...</a>
                @else
                    <a href="{{ route($route) }}"
                        class="text-gray-700 bold border-b-2 border-gray-300 hover:text-gray-900">
                        {{ __('Find out more') }}...</a>
                @endif
            @endif
        @endif
    </div>
</ul>
