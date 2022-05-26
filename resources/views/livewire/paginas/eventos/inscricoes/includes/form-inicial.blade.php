<div>
    @can('create', \App\Models\EventoInscricao::class)
        <x-tall-accordion accordion="05">
            <x-tall-accordion-item collapse="One1" label="TIPOS DE INSCRIÇÃO / VALORES" active="show">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-2/3 text-left py-3 px-4 uppercase font-semibold text-sm">
                                TIPO DE INSCRIÇÃO</th>

                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                                VALOR</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @if ($evento_planos = $model->evento_planos)
                            @foreach ($evento_planos as $evento_plano)
                                <tr>
                                    <td class="w-2/3 text-left py-3 px-4">{{ $evento_plano->name }}</td>
                                    <td class="text-left py-3 px-4">R$ {{ form_read($evento_plano->valor) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </x-tall-accordion-item>

            @if ($policie = $model->policie)
                <x-tall-accordion-item collapse="One2" label="{{ $policie->name }}">
                    <p class="mb-2 text-gray-500 dark:text-gray-400"><a href="{{ $policie->content }}"
                            target="_blank">Acesse
                            aqui
                            nossa política de privacidade >>></a></p>
                </x-tall-accordion-item>
            @endif
            @if ($politica_inscricao = $model->politica_inscricao)
                <x-tall-accordion-item collapse="One3" label="{{ $politica_inscricao->name }}">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        {!! $politica_inscricao->content !!}
                    </p>
                </x-tall-accordion-item>
            @endif
            @if ($politica_desistencia = $model->politica_desistencia)
                <x-tall-accordion-item collapse="One4" label="{{ $politica_desistencia->name }}">
                    <div class="p-5 border border-gray-200 dark:border-gray-700 border-t-0">
                        {!! $politica_desistencia->content !!}
                    </div>
                </x-tall-accordion-item>
            @endif
        </x-tall-accordion>

        <form wire:submit.prevent="send">
            @if ($instituicao)
                <div class="flex w-full  shadow-lg pt-3 flex-col border border-t-2 mt-2">
                    <h3 class="text-2xl font-bold mb-4"> {{ $instituicao->name }}</h3>
                    @if ($plano = $this->plano)
                        <div class="bg-yellow-500 w-full px-5 py-4 flex items-center justify-between">
                            <h2 class="text-2xl text-gray-800 ">{{ $plano->name }}</h2>
                            <span class="text-3xl font-bold">R$ {{ form_read($plano->valor) }}</span>
                        </div>
                    @endif
                </div>
            @endif

            <p class="mt-5">PARA EFETUAR A INSCRIÇÃO, o interessado deve, primeiro,
                informar
                no campo abaixo o número do CNPJ em que tenha vínculo funcional e que será
                responsável
                pelo pagamento da inscrição, e em seguida clicar em "Iniciar". <br>Em caso de
                dúvidas,
                basta entrar em contato pelo (41) 98791-4672 ou utilizar nosso <a class="text-blue-600 hover:underline"
                    href="https://apeprev.com.br/fale-conosco" target="_blank">fale conosco.</a> <br>Ao realizar a
                inscrição,
                você estará
                automaticamente concordando com as Políticas acima descritas.
            </p><br>

            @if ($label = $this->label)
                <div class="md:col-span-5">
                    <div class="inline-flex items-center mb-2 space-y-0">
                        <x-toggle lg wire:model.defer="inscricoes.termos" :label="$label" />
                    </div>
                </div>
            @endif
            <div class="md:col-span-5">
                <div class="inline-flex items-center">
                    <x-toggle lg wire:model.defer="inscricoes.vacina"
                        label="ESTOU CIENTE QUE DEVEREI APRESENTAR COMPROVANTE DE VACINAÇÃO COVID-19 PARA ACESSO AO EVENTO" />
                </div>
            </div>
            <!-- BEGIN: formulário cnpj -->
            <div class="flex flex-col items-center justify-center mt-5">
                <div class=" w-full  max-w-lg p-12 space-y-4 shadow-2xl rounded">
                    @if (data_get($inscricoes, 'id'))
                        <x-button class="w-full" type="submit" spinner="send" positive label="Continuar"
                            size="lg" />
                    @else
                        <div class="text-white pb-4 sm:text-2xl font-semibold">Informe o CNPJ</div>
                        <x-tall-document-maskable-input wire:model.defer="inscricoes.document"
                            placeholder="Digite o CNPJ" />
                        <x-button class="w-full" type="submit" spinner="send" primary label="Iniciar" size="lg" />
                    @endif

                </div>
                <p class="mt-4 text-center text-gray-400 text-xs">
                    &copy;2022 SioWeb. Todos direitos reservados.
                </p>
            </div>
        </form>
    @else
        @if ($instituicao)
            @push('script')
                <script>
                    window.addEventListener('load', () => {
                        window.$wireui.dialog({
                            title: 'Atenção!',
                            description: "{{ sprintf('Você não tem permissão para continuar com a inscrição, entre em contato com a %s e solicite permissão para realizar inscrições',$instituicao->name) }}",
                            icon: 'error',
                            close: 'Voltar para a apresntação',
                            onClose: () => Livewire.emit('onClose')
                        })
                    })
                </script>
            @endpush
        @else
            <form wire:submit.prevent="associaSe">

                <div class="flex flex-col items-center justify-center mt-5">
                    <div class=" w-full  max-w-lg pb-12 px-12 pt-2 space-y-4 shadow-2xl rounded">
                        <p class="pt-3">
                           <b> Opss!</b> parece que você não esta afiliado a nenhuma associação, para solicitar uma afiliação,
                            Selecione um instituição e o seu cargo na associação selecionada, e o responsavel pelas
                            inscrições vai finalizar sua inscrição!
                        </p>
                        @if (App\Helpers\LoadActionsHelper::hasSelectInstituitionFeature())
                            <div class="mt-2">
                                <x-select wire:model.defer="inscricoes.instituicao_id"
                                    label="{{ __('Selecione Um Instituição') }}">
                                    <x-select.option value="" label="{{ __('Selecione') }}" />
                                    @if ($instituicoes = \App\Models\Instituicao::all())
                                        @foreach ($instituicoes as $instituicao)
                                            <x-select.option value="{{ $instituicao->id }}"
                                                label="{{ sprintf('%s - %s', $instituicao->name, $instituicao->document) }}" />
                                        @endforeach
                                    @endif
                                </x-select>
                            </div>
                            <div class="mt-4">
                                <x-select wire:model.defer="inscricoes.office_id"
                                    label="{{ __('Topo de ligação') }}">
                                    <x-select.option value="" label="{{ __('Selecione o cargo') }}" />
                                    @if ($offices = \App\Models\Office::all())
                                        @foreach ($offices as $office)
                                            <x-select.option value="{{ $office->id }}" label="{{ $office->name }}" />
                                        @endforeach
                                    @endif
                                </x-select>
                            </div>
                        @endif
                        <x-button class="w-full" type="submit" spinner="associaSe" primary
                            label="Filiar-se a uma instituição" size="lg" />
                    </div>
                    <p class="mt-4 text-center text-gray-400 text-xs">
                        &copy;2022 SioWeb. Todos direitos reservados.
                    </p>
                </div>
            </form>
        @endif
    @endcan
</div>
