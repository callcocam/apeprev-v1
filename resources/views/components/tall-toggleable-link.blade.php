@if (\Route::has($route))
    @if ($restrito)
        <li>
            <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
                {{ $label }}
            </a>
        </li>
    @endif
@endif
