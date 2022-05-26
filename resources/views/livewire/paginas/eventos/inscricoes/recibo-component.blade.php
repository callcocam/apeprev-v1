<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include('livewire.paginas.eventos.inscricoes.includes.sidebar')
            <div class="flex-1 flex flex-col">
                @include('livewire.paginas.eventos.inscricoes.includes.header', ['title'=>'RECIBO PARA'])
                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    @include('livewire.paginas.eventos.inscricoes.includes.footer')
                </main>
            </div>
        </div>
    </div>
</div>