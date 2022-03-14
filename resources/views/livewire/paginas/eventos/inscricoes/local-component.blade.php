<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include('livewire.paginas.eventos.inscricoes.includes.sidebar')
            <div class="flex-1 flex flex-col">
                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    @if ($local = $model->local)
                       
                        <div class="md:mt-14 mt-4 relative sm:flex items-center justify-center">
                            <img src="https://i.ibb.co/KjrPCyW/map.png" alt="world map image"
                                class="w-full xl:h-full h-96  object-fill sm:block hidden" />
                            <img src="https://i.ibb.co/SXKj9Mf/map-bg.png" alt="mobile-image"
                                class="sm:hidden -mt-10 block w-full h-96  object-fill absolute z-0" />

                            @if ($address = $local->address)
                                <div
                                    class="shadow-lg xl:p-6 p-4 sm:w-auto w-full lg:max-w-xl bg-white sm:absolute relative z-20  left-0 xl:ml-56 sm:ml-12">
                                    <p class="text-3xl text-center font-semibold text-gray-800 mb-3">{{ $local->name }}</p>
                                    <p class="rounded-lg shadow-md">
                                        <img src="{{ $local->cover_url }}" alt="world map image"
                                            class="w-full h-96  object-fill rounded-lg shadow-md" />
                                    </p>
                                    <p class="text-base leading-4 xl:mt-4 mt-2 text-gray-600">
                                        {{ $address->street }} n° {{ $address->number }},
                                        {{ $address->district }}, {{ $address->city }}-{{ $address->state }} -
                                        {{ $address->zip }}
                                    </p>
                                    <p class="text-base leading-4 xl:mt-4 mt-2 text-gray-600 flex flex-wrap">
                                        {!! $local->description->preview !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif
                    @include('livewire.paginas.eventos.inscricoes.includes.footer')
                </main>
            </div>
        </div>
    </div>
</div>
