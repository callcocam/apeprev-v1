<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="text-gray-800 text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-2">
                    Notícias
                </h1>

                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Acompanhe aqui as últimas notícias.</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content>
    <!-- component -->
    @if ($destaque)
        <div class="flex flex-col md:flex-row mx-5 items-center shadow-md">
            <div class="md:px-10 sm:px-5">
                <h1 class="text-gray-800 font-bold text-2xl my-2">{{ $destaque->name }}</h1>
                @if ($description = $destaque->description)
                    <p class="text-gray-700 mb-2 md:mb-6">{{ $description->preview }}</p>
                @endif
                <div class="flex justify-between mb-2">
                    <span
                        class="font-thin text-sm">{{ date_carbom_format($destaque->created_at)->format('d/m/Y') }}</span>
                    <a href="{{ route('noticias.show', $destaque) }}"
                        class="sm:block hidden mb-2 text-gray-800 font-bold">{{ __('Veja na íntegra') }}</a>
                </div>
            </div>
            <div>
                <img class="object-contain  w-[400px] h-[326px]" src="{{ $destaque->cover_url }}"
                    alt="{{ $destaque->name }}" />
            </div>
        </div>
    @endif

    <div class="mt-6 flex flex-col mx-8 md:mx-0 md:grid md:grid-cols-3 md:gap-3">
        @foreach ($models as $model)
            <div class="shadow-md"> <a href="{{ route('noticias.show', $model) }}">
                    <img class="object-contain w-[400px] h-[326px]" src="{{ $model->cover_url }}" alt="" />
                </a>
                <div class="px-4">
                    <a href="{{ route('noticias.show', $model) }}">
                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">{{ $model->name }}</h1>
                    </a>
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
    <div class="flex mx-5 flex-row items-center justify-between shadow-md mt-10 pb-10">
        {{ $models->links() }}
    </div>
    {{-- <div class="flex flex-col mx-5 md:flex-row items-center shadow-md mt-10">
        <div>
            <img class="bg-cover"
                src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                alt="" />
        </div>
        <div class="md:px-10 sh sm:px-5">
            <h1 class="text-gray-800 font-bold text-2xl my-2">long established</h1>
            <p class="text-gray-700 mb-2 md:mb-6">It is a long established fact that a reader will be distracted by
                the readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                that....</p>
            <div class="flex justify-between mb-2">
                <span class="font-thin text-sm">May 20th 2020</span>
                <span class="sm:block hidden mb-2 text-gray-800 font-bold">Read more</span>
            </div>
        </div>
    </div> --}}
    @livewire(lv_includes('share'))
</x-content>
