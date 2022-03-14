<div class="w-full lg:w-[400px] shadow-lg rounded-lg bg-gray-100 relative mb-8 md:mb-0">
    <a href="{{ $model->url }}" target="_blank"><img class="w-full object-fill rounded-t-lg h-[326px]"
            src="{{ $model->cover_url }}" alt="{{ $model->name }}"></a>
    <div class="flex flex-col px-4">
        <div class="flex  justify-between mt-4 md:bottom-4  gap-5 pb-3">

            <a href="{{ $model->url }}" target="_blank"
                class="font-semibold
                bg-blue-500
                px-4 py-1 rounded
                mb-4
                inline-block
                text-white
                hover:text-blue-100">{{ __('Ver Mais') }}</a>
            @if ($model->inscrevase)
                <a href="http://5.183.8.142" target="_blank"
                    class="font-semibold
                    bg-green-500
                    px-4 py-1 rounded
                    mb-4
                    inline-block
                    text-white
                    hover:text-green-100">{{ __('Inscreva-se') }}</a>
            @endif
            @if ($model->tem_palestras)
                <a href="{{ route('eventos.palestras', $model) }}"
                    class="font-semibold
                    bg-red-500
                    px-4 py-1 rounded
                    mb-4
                    inline-block
                    text-white
                    hover:text-red-100">{{ __('Ver Palestras') }}</a>
            @endif
        </div>
        <h1 class="mt-3 text-gray-800 text-xl font-bold my-2"><a href="{{ $model->url }}"
                target="_blank">{{ $model->name }}</a></h1>
        <p class="text-gray-700 mb-2 h-10">{{ \Str::limit($model->description->preview, 80) }}</p>

    </div>
</div>
