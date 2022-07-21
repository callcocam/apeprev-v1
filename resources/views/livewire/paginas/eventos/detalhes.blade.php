<a href="{{ $model->url }}" class="mb-8 text-2xl font-black tracking-tighter text-black  md:text-3xl title-font">
    {{ $model->name }}</a>
<p class="mb-8 text-base leading-relaxed text-left text-blue-600">
    @if ($model->description)
        {!! $model->description->preview !!}
    @endif
</p>
<div class="flex flex-col w-full gap-2 md:justify-start md:flex-row">
    {{-- <input
        class="flex-grow w-full px-4 py-3 mb-4 text-base text-black transition ease-in-out transform rounded-lg  duration-650 lg:w-auto bg-blue-200 focus:outline-none focus:border-purple-500 sm:mb-0 focus:bg-white focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"
        placeholder="Your Email" type="email"> --}}
    @if ($model->inscrevase)
        <a href="{{ $model->url }}" target="_blank"
            class="flex items-center px-6 py-3 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-green-600 rounded-lg  hover:bg-green-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">{{ __('Inscreva-se') }}</a>
    @else
        @if (!empty(str_replace('#', '', $model->url)))
            <a href="{{ $model->url }}" target="_blank"
                class="flex items-center px-6 py-3 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-lg  hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">{{ __('Ver Mais') }}</a>
        @endif
    @endif
    {{-- <a href="{{ route('eventos.inscricoes.iniciar', $model) }}"  class="flex items-center px-6 py-3 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-green-600 rounded-lg  hover:bg-green-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">{{ __('Inscreva-se') }}</a> --}}

    @if ($model->tem_palestras)
        <a href="{{ route('eventos.palestras', $model) }}"
            class="flex items-center px-6 py-3 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-red-600 rounded-lg  hover:bg-red-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">{{ __('Ver Palestras') }}</a>
    @endif
</div>

