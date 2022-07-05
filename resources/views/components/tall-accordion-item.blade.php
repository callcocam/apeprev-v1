<div {{ $attributes->merge([ "class"=>"accordion-item bg-white border border-gray-200"]) }}>
    <h2 class="accordion-header mb-0" id="heading{{ $collapse }}">
        <button  class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  border-0 rounded-none transition focus:outline-none {{ $collapsed }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $collapse }}" aria-expanded="false" aria-controls="collapse{{ $collapse }}">
            {{ $label }}
        </button>
    </h2>
    <div id="collapse{{ $collapse }}" class="accordion-collapse collapse {{ $active }}" aria-labelledby="heading{{ \Str::upper($collapse) }}">
        <div class="accordion-body py-4 px-5">
            {{ $slot }}
        </div>
    </div>
</div>
