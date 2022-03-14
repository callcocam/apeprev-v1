<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include('livewire.paginas.eventos.inscricoes.includes.sidebar')
            <div class="flex-1 flex flex-col">
                @include('livewire.paginas.eventos.inscricoes.includes.header', ['title'=>'HOTEL PARA EVENTO'])
                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <section class="bg-white dark:bg-gray-800">
                        @if ($hotel = $model->hotel)
                            <div
                                class="container flex flex-col px-6 py-10 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
                                <div class="w-full lg:w-1/2">
                                    <div class="lg:max-w-lg">
                                        <h1
                                            class="text-3xl font-bold tracking-wide text-gray-800 dark:text-white lg:text-5xl">
                                            {{ $hotel->name }}
                                        </h1>
                                        <div class="mt-8 space-y-5">
                                            <p class="flex items-center -mx-2 text-gray-700 dark:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 mx-2 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="mx-2">Um lugar:
                                                    {{ form_read($hotel->valor_single) }}</span>
                                            </p>
                                        </div>
                                        <div class="mt-8 space-y-5">
                                            <p class="flex items-center -mx-2 text-gray-700 dark:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 mx-2 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="mx-2">Dois lugares:
                                                    {{ form_read($hotel->valor_duble) }}</span>
                                            </p>
                                        </div>
                                        <div class="mt-8 space-y-5">
                                            <p class="flex items-center -mx-2 text-gray-700 dark:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 mx-2 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="mx-2">Trêz lugares:
                                                    {{ form_read($hotel->valor_triple) }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div
                                        class="w-full mt-8 bg-transparent border rounded-md lg:max-w-sm p-4 text-left text-sm text-gray-500">
                                        {{ $hotel->description->content }}
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-center w-full h-96 lg:w-1/2 shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
                                    <a href="{{ $hotel->link }}" target="_blank" rel="noopener noreferrer">
                                        <img class="object-cover w-full h-full mx-auto rounded-md lg:max-w-2xl"
                                            src="{{ $model->hotel->cover_url }}" alt="glasses photo">
                                    </a>
                                </div>
                            </div>
                        @endif
                    </section>
                    @include('livewire.paginas.eventos.inscricoes.includes.footer')
                </main>
            </div>
        </div>
    </div>
</div>
