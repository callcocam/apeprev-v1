<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <!-- END: /banner destaque-->
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            <div class="flex-1 flex flex-row">
                @include(
                    'livewire.paginas.eventos.inscricoes.includes.sidebar'
                )
                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <!-- BEGIN: banner destaque-->
                    <div class="container mx-auto px-6 py-8 flex flex-col space-y-5">
                        <h1 class="w-full py-5 font-bold text-3xl"> {{ $model->name }}</h1>
                        <div class="grid place-items-center  text-gray-500 dark:text-gray-300 text-xl ">
                            <p>
                                {!! $model->description->content !!}
                            </p><br>
                            @include(
                                'livewire.paginas.eventos.inscricoes.includes.slider'
                            )
                        </div>
                        @can('create', \App\Models\EventoInscricao::class)
                            <a class="w-full flex py-3 px-4 bg-green-600 rounded-md text-center text-white font-bold items-center justify-center"
                                href="{{ route('eventos.inscricoes.iniciar', $model) }}">
                                <span>Ir para as inscrições</span>
                            </a>
                        @endcan
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
