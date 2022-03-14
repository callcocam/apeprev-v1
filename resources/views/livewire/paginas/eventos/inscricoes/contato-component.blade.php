<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include('livewire.paginas.eventos.inscricoes.includes.sidebar')
            <div class="flex-1 flex flex-col">
                @include('livewire.paginas.eventos.inscricoes.includes.header', ['title'=>'CONTATO(S) PARA'])
                <main class="flex-1">
                    <div class="flex w-full justify-center items-center mb-10">
                        <div
                            class="flex flex-col md:flex-row md:space-x-6 space-y-8 md:space-y-0 bg-positive-500 w-full max-w-4xl p-8 rounded-xl shadow-lg text-white lg:p-12 overflow-hidden">
                            <div class="flex flex-col space-3-8 justify-between w-full md:w-1/2">
                                <div>
                                    <h1 class="font-bold text-4xl tracking-wide">Contato</h1>
                                    <p class="pt-2 text-positive-100 text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti quae, ipsa ad
                                        libero modi praesentium officiis quos, dolores sint sequi sit veniam rem quod.
                                        Pariatur deleniti repellendus saepe expedita aspernatur!
                                    </p>
                                </div>
                                <div class="flex flex-col space-y-3">
                                    @foreach ($model->contato as $item)
                                        <div class="inline-flex items-center space-x-2">
                                            <x-icon name="{{ $item->icone }}" solid
                                                class="text-positive-100 text-3xl h-8 w-8" />
                                            <span>{{ $item->description->content }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 relative">
                                <div class="absolute bg-positive-200 w-40 h-40 rounded-full -right-28 -top-28"></div>
                                <div class="absolute bg-positive-200 w-40 h-40 rounded-full -left-28 -bottom-16"></div>
                                <div class="relative bg-white rounded-lg shadow-lg p-8 text-gray-600">
                                    <form wire:submit.prevent="send" class="flex flex-col space-y-3 pt-4">
                                        <div>
                                            <x-input wire:model.lazy="form_data.name" placeholder="Nome Completo"/>
                                        </div>
                                        <div>
                                            <x-input wire:model.lazy="form_data.email" placeholder="Seum melhor e-mail"/>
                                        </div>
                                        <div>
                                            <x-textarea wire:model.lazy="form_data.message" placeholder="Descreva sua duvida aqui..."/>
                                        </div>
                                        <x-button type="submit" spinner="send" primary label="Enviar mennsagem..." />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('livewire.paginas.eventos.inscricoes.includes.footer')

                </main>
            </div>
        </div>
    </div>
</div>
