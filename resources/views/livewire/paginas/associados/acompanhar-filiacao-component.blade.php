<x-content>
    <h3 class="text-2xl text-gray-700 font-bold mb-6 -ml-3">PRÉ FILIAÇÃO {{ date('Y') }}</h3>

    <ol class="border-l-2 border-purple-600">
        @if ($instituicao = $this->instituicao)
            <li>
                <div class="md:flex flex-start">
                    <div class="bg-purple-600 w-6 h-6 flex items-center justify-center rounded-full -ml-3">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="text-white w-3 h-3" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
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
                            @if ($filiacao = $instituicao->instituicao_vigente)
                                @if ($filiacao->payment_date)
                                    <a href="#!"
                                        class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">
                                        Última Atualização
                                        {{ date_carbom_format($filiacao->payment_date)->format('d/m/Y') }}
                                    </a>
                                @endif
                            @endif
                        </div>
                        @if ($filiacao = $instituicao->instituicao_vigente)
                            @if ($status = $filiacao->status)
                                <p class="text-gray-700 mb-6">{{ $status->name }}</p>
                            @else
                                <p class="text-gray-700 mb-6">AQUI</p>
                            @endif
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
                        @else
                            <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                            @livewire('paginas.associados.includes.boleto-component', compact('model'), key(uniqId('boleto')))
                            <!--END: DADOS DA INSTITUIÇÃO -->
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
                    <div class="block p-6 rounded-lg shadow-lg bg-gray-100 max-w-md ml-6 mb-10">
                        <div class="flex justify-between mb-4">
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">Awesome
                                Employers</a>
                            <a href="#!"
                                class="font-medium text-purple-600 hover:text-purple-700 focus:text-purple-800 duration-300 transition ease-in-out text-sm">21
                                / 12 / 2021</a>
                        </div>
                        <p class="text-gray-700 mb-6">Voluptatibus temporibus esse illum eum aspernatur, fugiat suscipit
                            natus! Eum corporis illum nihil officiis tempore. Excepturi illo natus libero sit
                            doloremque, laborum molestias rerum pariatur quam ipsam necessitatibus incidunt, explicabo.
                        </p>
                        <button type="button"
                            class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-mdb-ripple="true">Preview</button>
                        <button type="button"
                            class="inline-block px-3.5 py-1 border-2 border-purple-600 text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            data-mdb-ripple="true">See demo</button>
                    </div>
                </div>
            </li>
        @endif
    </ol>
</x-content>
