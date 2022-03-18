<button {{ $attributes->merge([ "class"=>"accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  border-0 rounded-none transition focus:outline-none"])->class($collapsed) }} type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $collapse }}" aria-expanded="false" aria-controls="collapse{{ $collapse }}">
    {{ $label }}
</button>