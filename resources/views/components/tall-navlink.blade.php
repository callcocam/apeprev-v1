@if (\Route::has($route))
    @if ($restrito)
        <li
            class=" inline-flex items-center px-1 pt-1 border-t-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
            <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
                @if ($icon)
                    <x-icon name="{{ $icon }}" class="w-6 h-6" />
                @endif
                {{ $label }}
            </a>
        </li>
    @endif
@endif
