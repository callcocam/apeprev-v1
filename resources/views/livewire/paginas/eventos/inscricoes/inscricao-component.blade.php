<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex  bg-gray-100 dark:bg-gray-800 font-roboto">
            @include(
                'livewire.paginas.eventos.inscricoes.includes.sidebar'
            )
            <div class="flex-1 flex flex-col">

                @include(
                    'livewire.paginas.eventos.inscricoes.includes.header',
                    ['title' => 'INSCRIÇÕES PARA']
                )

                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <div class="container mx-auto px-6 py-8">
                        <div class=" p-6 bg-gray-100 flex items-center justify-center">
                            <div class="container max-w-screen-lg mx-auto">
                                <div>
                                    <!-- BEGIN: inscrição-->
                                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">
                                            <div class="lg:col-span-2">
                                                @livewire('paginas.eventos.inscricoes.add-participante-component',
                                                ['model' => $model], key($model->id))

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: inscrição-->
                                </div>
                            </div>
                        </div>
                        <!-- END: -->
                        <!-- tabela de inscritos-->
                        <div>
                            <table class="min-w-full border-collapse block md:table">
                                <thead class="block md:table-header-group">
                                    <tr
                                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                        <th
                                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            NOME</th>
                                        <th
                                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            CPF</th>
                                        <th
                                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            EMAIL</th>
                                        <th
                                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            VALOR</th>
                                        <th
                                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody class="block md:table-row-group">
                                    <!-- TABELA MOBILE-->
                                    @include(
                                        'livewire.paginas.eventos.inscricoes.includes.lista-de-inscritos'
                                    )
                                </tbody>
                            </table>
                            @if ($instituicao)
                                @if ($plano = $this->plano)
                                    <div class="md:col-span-2 mt-4 text-right">
                                        <div class="inline-flex items-end">
                                            <span
                                                class="relative inline-block px-3 py-2 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-yellow-400 opacity-50 rounded-md"></span>
                                                <span class="relative">VALOR TOTAL DAS INSCRIÇÕES<BR>R$
                                                    {{ form_read($plano->valor) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif

                        </div>
                        <!-- end tabela de inscritos-->
                    </div>
                    @include(
                        'livewire.paginas.eventos.inscricoes.includes.footer'
                    )
                </main>
            </div>
        </div>
    </div>
</div>
