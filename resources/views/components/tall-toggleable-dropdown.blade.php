<ul {{ $attributes->class("px-4 w-full sm:w-1/2  border-gray-200 border-b lg:border-b-0 pb-2 pt-6 lg:pt-2")->merge([
    'class' => sprintf('sm:border-%s lg:%s' ,$border, $width),
])}}>
    <h3 class="font-bold text-xl text-gray-400 text-bold mb-2">{{ $label }}</h3>
    {{ $slot }}
</ul>
