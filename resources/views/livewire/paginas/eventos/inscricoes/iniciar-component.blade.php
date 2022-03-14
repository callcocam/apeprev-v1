<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include(
                'livewire.paginas.eventos.inscricoes.includes.sidebar'
            )
            <div class="flex-1 flex flex-col">
                @include(
                    'livewire.paginas.eventos.inscricoes.includes.header',
                    ['title' => 'INICIAR INSCRIÇÕES PARA']
                )
                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <div class="container max-w-screen-lg mx-auto bg-white p-16 rounded">
                        @include(
                            'livewire.paginas.eventos.inscricoes.includes.form-inicial'
                        )
                    </div>
                    <!-- END: formulário cnpj-->
                    @include(
                        'livewire.paginas.eventos.inscricoes.includes.footer'
                    )
                </main>
            </div>
        </div>
    </div>
</div>
