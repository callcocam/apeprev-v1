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

                            @if ($participantes = $this->participantes)
                            <div class="flex w-full py-2 bg-gray-300 px-5 text-blue-600">
                                Você gerar incrições em lote, selecione uma ou mais incrições na lista abaixo, e
                                click no botão <b class="ml-2">GERAR EM LOTE</b>
                            </div>
                            <table class="min-w-full border-collapse block md:table">
                                <thead class="block md:table-header-group">
                                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            <x-toggle wire:click="selectCheckboxAll()" wire:model.defer="checkboxAll" lg />
                                        </th>
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            NOME</th>
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            CPF</th>
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            EMAIL</th>
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            VALOR</th>
                                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                            AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody class="block md:table-row-group">
                                    <!-- TABELA MOBILE-->
                                    @foreach ($participantes as $item)
                                        @if ($inscrito = $this->getInscrito($model,$instituicao,$inscricoes, $item, 0))
                                            @include(
                                            'livewire.admin.eventos.inscricoes.includes.lista-de-inscritos-avulso'
                                            )
                                        @elseif ($inscrito = $this->getInscrito($model,$instituicao,$inscricoes, $item, 1))
                                            @include(
                                            'livewire.admin.eventos.inscricoes.includes.lista-de-inscritos-lote'
                                            )
                                        @else
                                            @include(
                                            'livewire.admin.eventos.inscricoes.includes.lista-de-inscritos'
                                            )
                                        @endif
                                    @endforeach
                                </tbody>
                                @if ($instituicao)
                                @if ($plano = $this->plano)
                                <tfoot>
                                    @if ($checkboxValuesCount = $this->checkboxValuesCount())
                                    <tr>
                                        <td colspan="6">
                                            <div class="flex w-full justify-end space-x-2 items-center py-2">
                                                <span>
                                                    Gerar {{ $checkboxValuesCount }} em lote,
                                                    no valor
                                                    de <span class="font-bold text-2xl">R$
                                                        {{ Calcular(form_read($plano->valor), $checkboxValuesCount, '*') }}</span>
                                                </span>
                                                <x-button wire:click="gerarLote" spinner="gerarLote" primary label="GERAR EM LOTE" />
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($creditos = $instituicao->creditos_sum)
                                    <tr>
                                        <td colspan="6">
                                            <div class="md:col-span-2 mt-4 text-right">
                                                <div class="inline-flex items-end">
                                                    <span class="relative inline-block px-3 py-2 font-semibold text-green-900 leading-tight">
                                                        <span aria-hidden class="absolute inset-0 bg-positive-400 opacity-50 rounded-md"></span>
                                                        <span class="relative">VALOR TOTAL DO(S) CRÉDITOS
                                                            <span class="font-bold text-2xl">R$
                                                                @foreach($creditos as $credito)
                                                                {{ form_read( $credito->soma) }}
                                                                @endforeach
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <td colspan="6">
                                            <div class="md:col-span-2 mt-4 text-right">
                                                <div class="inline-flex items-end">
                                                    <span class="relative inline-block px-3 py-2 font-semibold text-green-900 leading-tight">
                                                        <span aria-hidden class="absolute inset-0 bg-yellow-400 opacity-50 rounded-md"></span>
                                                        <span class="relative">VALOR TOTAL DAS
                                                            INSCRIÇÕES
                                                            <span class="font-bold text-2xl">R$
                                                                {{ Calcular(form_read($plano->valor), $participantes->count(), '*') }}</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                                @endif
                            </table>
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