<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include(
                'livewire.paginas.eventos.inscricoes.includes.sidebar'
            )
            <div class="flex-1 flex flex-col">
                @include(
                    'livewire.paginas.eventos.inscricoes.includes.header',
                    ['title' => 'CONTATO(S) PARA']
                )
                <main class="flex-1">
                    <div class="flex w-full justify-center items-center mb-10">
                        <div
                            class="flex flex-col md:flex-row md:space-x-6 space-y-8 md:space-y-0 bg-positive-500 w-full max-w-6xl p-8 rounded-xl shadow-lg text-white lg:p-12 overflow-hidden">
                            <div class="flex flex-col space-3-8 justify-between w-full md:w-3/5">
                                <div>
                                    <h1 class="font-bold text-4xl tracking-wide">Contato</h1>
                                    <p class="pt-2 text-white text-sm">
                                        @if ($faqs = $this->faqs)
                                            <h1 class="font-bold text-lg px-3 pt-2">Perguntas frequentes</h1>
                                            <x-tall-accordion accordion="06" class="bg-positive-500 py-4 z-40">
                                                @foreach ($faqs as $faq)
                                                    <div
                                                        class="accordion-item bg-positive-500 border border-positive-600">
                                                        <h2 class="accordion-header mb-0"
                                                            id="heading{{ $faq->id }}">
                                                            <button
                                                                class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-100 text-left  border-0 rounded-none transition focus:outline-none collapsed"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $faq->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $faq->id }}">
                                                                {{ $faq->name }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $faq->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $faq->id }}">
                                                            <div class="accordion-body py-4 px-5">
                                                                {!! $faq->description->content !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </x-tall-accordion>
                                        @endif
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
                            <div class="w-full md:w-2/5 relative">
                                <div class="absolute bg-positive-200 w-40 h-40 rounded-full -right-28 -top-28">
                                </div>
                                @if ($this->atendimento->count())
                                    <div class="absolute bg-positive-200 w-40 h-40 rounded-full -left-20 -bottom-24">
                                    </div>
                                    <div class="relative bg-white rounded-lg shadow-lg p-8 text-gray-600">
                                        <form wire:submit.prevent="send" class="flex flex-col space-y-3 pt-4">
                                            <div>
                                                <x-input wire:model.lazy="form_data.name" placeholder="Nome Completo" />
                                            </div>
                                            <div>
                                                <x-input wire:model.lazy="form_data.email"
                                                    placeholder="Seum melhor e-mail" />
                                            </div>
                                            <div>
                                                <x-textarea wire:model.lazy="form_data.message"
                                                    placeholder="Descreva sua duvida aqui..." />
                                            </div>
                                            <x-button type="submit" spinner="send" primary
                                                label="Enviar mennsagem..." />
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include(
                        'livewire.paginas.eventos.inscricoes.includes.footer'
                    )

                </main>
            </div>
        </div>
    </div>
</div>
