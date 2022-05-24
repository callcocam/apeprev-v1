<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="text-gray-800 text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-2">
                    Detalhes da notícia
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums>
                        <x-slot name="back">
                            <li class="flex justify-items-start text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="w-4 h-4 mr-2 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <a href="{{ route('noticias.list') }}">
                                    <i class="swfa fas fa-home " aria-hidden="true"></i>
                                    <span>{{ __('Eventos') }}</span>
                                </a>

                            </li>
                        </x-slot>
                        {{ $model->name }}
                    </x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-slot name="seo">
    @include('includes.seo')
</x-slot>
<x-content>
    @if ($model)
        <div class="flex flex-col mx-5 md:flex-row items-center shadow-md mt-10">
            <div class="md:px-10 sh sm:px-5">
                <img class="object-contain " src="{{ $model->cover_url }}" alt="{{ $model->name }}" />
                <h1 class="text-gray-800 font-bold text-3xl my-5">{{ $model->name }}</h1>
                @if ($model->description)
                    <p class="mb-2 md:mb-6 text-right">
                      
                        {!! $model->description->content !!}
                    </p>
                @endif
                <div class="flex justify-between mb-2">
                    {{-- <span
                        class="font-thin text-sm">{{ date_carbom_format($model->created_at)->format('d/m/Y') }}</span> --}}
                </div>
            </div>
        </div>
    @endif
    <div class="mt-10">
        <h1 class="text-3xl text-center w-full">
            Últimas <span class="font-bold text-blue-800">Notícias</span>
        </h1>
        <div class="mt-6 flex flex-col justify-center mx-8 md:mx-0 md:grid md:grid-cols-3 md:gap-3">
            @foreach ($models as $model)
                <div class="shadow-md">
                    <img class="object-contain w-[400px] h-[326px]" src="{{ $model->cover_url }}" alt="" />
                    <div class="px-4">
                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">{{ $model->name }}</h1>
                        @if ($model->description)
                            <p class="text-gray-700 mb-2">{{ \Str::limit($model->description->preview, 70) }}</p>
                        @endif
                        <div class="flex justify-between mt-4">
                            {{-- <span
                                class="font-thin text-sm">{{ date_carbom_format($model->created_at)->format('d/m/Y') }}</span> --}}
                            <a href="{{ route('noticias.show', $model) }}"
                                class="mb-2 text-gray-800 font-bold">{{ __('Veja na íntegra') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-content>
