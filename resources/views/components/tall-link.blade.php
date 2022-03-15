@if (\Route::has($route))
    @if ($restrito)
        <a href="{{ route($route, $model) }}" {{ $attributes->merge(['class' => $classes]) }}>
            @if ($icon)
                <x-icon name="{{ $icon }}" class="w-6 h-6" />
            @endif
            {{ $label }}
        </a>
    @endif
@endif