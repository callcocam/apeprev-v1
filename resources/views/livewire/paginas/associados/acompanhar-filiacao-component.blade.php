<x-content>
    <h3 class="text-2xl text-gray-700 font-bold mb-6 -ml-3 mt-5">PRÉ FILIAÇÃO
        <select wire:model="year">
            @for ($i = now()->subYears(5)->format('Y');
    $i <= now()->format('Y');
    $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </h3>

    <ol class="border-l-2 border-purple-600">
        @if ($instituicao = $this->instituicao)
            <li>
                <div class="md:flex flex-start">
                    <div class="bg-purple-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                            </path>
                        </svg>
                    </div>
                    <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-full ml-6 mb-10">
                        <div class="flex justify-between mb-4 space-x-2">
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                {{ $instituicao->name }}</a>
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                {{ $instituicao->created_at->format('d/m/Y H:i') }}</a>
                        </div>
                        @if ($instituicao->published())
                            <p class="text-gray-700 mb-6">Dados da filiação do RPPS preenchindo com sucesso.</p>
                        @else
                            <p class="text-gray-700 mb-6">Solicite a filiação do RPPS preenchendo os dados abaixo.</p>
                        @endif
                        @if ($instituicao->published())
                            <a href="{{ route('associados.associe-se.finalizar', ['model' => $instituicao]) }}"
                                class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-mdb-ripple="true">Visualizar Cadastro</a>
                        @else
                            <a href="{{ route('associados.associe-se.finalizar', ['model' => $instituicao]) }}"
                                class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-mdb-ripple="true">Finalizar Cadastro</a>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="md:flex flex-start">
                    <div class="bg-purple-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                            </path>
                        </svg>
                    </div>
                    <div class="block p-6 rounded-lg shadow-lg bg-gray-100 w-full ml-6 mb-10">
                        <div class="flex justify-between mb-4 space-x-2">
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">EFETOU
                                PAGAMENTO?</a>
                            @if ($filiacao = $this->filiacao)
                                @if ($filiacao->payment_date)
                                    <a href="#!"
                                        class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                        Última Atualização
                                        {{ date_carbom_format($filiacao->payment_date)->format('d/m/Y') }}
                                    </a>
                                @endif
                            @endif
                        </div>
                        @if ($filiacao = $this->filiacao)
                            @if ($status = $filiacao->status)
                                <p class="text-gray-700 mb-6">{{ $status->name }}</p>
                            @else
                                <p class="text-gray-700 mb-6">Nemhuma informação encontrado sobre o estado da filiação
                                </p>
                            @endif
                            @if ($filiacao = $this->filiacao)
                                @if (!$filiacao->payment_date)
                                    <a target="_blank" href="{{ $filiacao->link }}"
                                        class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                        data-mdb-ripple="true">Imprimir Boleto</a>
                                    <button type="button" wire:click="cancelarBoleto"
                                        class="inline-block px-3.5 py-1 border-2 border-purple-600 text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                        data-mdb-ripple="true">
                                        @if ($cancelarConfirm)
                                            Confirmar o cancelamento do boleto
                                        @else
                                            Cancelar Boleto
                                        @endif
                                    </button>
                                @endif
                            @endif
                        @else
                            <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                            @livewire('paginas.associados.includes.boleto-component', compact('model'), key(uniqId('boleto')))
                            <!--END: DADOS DA INSTITUIÇÃO -->
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="md:flex flex-start flex-col">
                    <div class="bg-purple-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h288c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-64zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                            </path>
                        </svg>
                    </div>
                    <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-full ml-6 mb-10">
                        <div class="flex justify-between mb-4">
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                CERTIFICADO FILIAÇÃO {{ $year }}
                            </a>
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                @if ($filiacao = $this->filiacao)
                                    @if ($filiacao->payment_date)
                                        Certificado em
                                        {{ date_carbom_format($filiacao->payment_date)->format('d/m/Y') }}
                                    @endif
                                @endif
                            </a>
                        </div>
                        <p class="text-gray-700 mb-6">
                            @if ($filiacao = $this->filiacao)
                                @if ($filiacao->payment_date)
                                    Emitir certificado
                                @else
                                    Aguardando filiação
                                @endif
                            @else
                                Aguardando filiação
                            @endif
                        </p>
                        @if ($filiacao = $this->filiacao)
                            @if ($filiacao->payment_date)
                                <a title="Click para emitir"
                                    href="{{ route('associados.certificado.emitir', $model) }}" target="_blank"
                                    style="position: relative; display: flex;width: 806px;height: 567px;margin: 0 auto; text-transform: uppercase;font-family: sans-serif">
                                    <img style="height: 500px; width: 100%"
                                        src="{{ \Storage::url('images/certificado-filiacao.png') }}" alt="">
                                    <span
                                        style="position: absolute;top: 330px;left: 169px;color: #b7c0c7;">{{ str_pad($model->instituicao_vigente->count(), 7, '0', STR_PAD_LEFT) }}</span>
                                    <span
                                        style="position: absolute;top: 304px;left: 128px;color: #b2bcc4;">DEZEMBRO/{{ $model->instituicao_vigente->year }}</span>
                                    <span
                                        style="position: absolute;top: 217px;left: 506px;color: #005c9f;">{{ $model->document }}</span>
                                    <span
                                        style="position: absolute;top: 256px;left: 506px;color: #005c9f;">{{ $model->name }}</span>
                                    <span
                                        style="position: absolute;top: 295px;left: 506px;color: #005c9f;">{{ $model->address->street }}</span>
                                    <span
                                        style="position: absolute;top: 331px;left: 506px;color: #005c9f;">{{ $model->address->zip }}</span>
                                    <span
                                        style="position: absolute;top: 371px;left: 506px;color: #005c9f;">{{ $model->address->city }}/{{ $model->address->state }}</span>
                                </a>
                                <a href="{{ route('associados.certificado.emitir', $model) }}"
                                    class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-mdb-ripple="true">Emitir</a>
                            @endif
                        @endif

                    </div>
                </div>
            </li>
        @endif
    </ol>

</x-content>
