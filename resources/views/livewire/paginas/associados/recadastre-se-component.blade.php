<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Pré Filiação
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Solicite a filiação do RPPS preenchendo os dados abaixo.</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="p-8">
    <div class="py-12 bg-white">
        <div class=" mx-auto gap-4 sm:px-6 ">
            <!--BEGIN: ficha de filiação -*** PROVISÓRIA POIS VAMOS CRIAR NO BANCO DE DADOS ***-  abrir o arquivo: fichadefiliacaodoc_doc.doc -->
            <div>
                <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                @livewire('paginas.associados.includes.instituicao-component', compact('model'), key(uniqId('instituicao')))
                @auth
                    <!--END: DADOS DA INSTITUIÇÃO -->
                    @if ($model->name)
                        <!-- BEGIN: NÚMEROS DA INSTITUIÇÃO -->
                        @livewire('paginas.associados.includes.servidores-component', compact('model'), key(uniqId('servidores')))
                        <!-- END: NÚMEROS DA INSTITUTIÇÃO -->
                        @can('create', $model)
                            @if ($status = $model->status)
                                @if ($status->slug == 'published')
                                    @if ($servidores_count)
                                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                                <div class="text-gray-600">
                                                    <p class="font-medium text-lg">EFETOU PAGAMENTO?</p>
                                                    <p>Aguardando gerar boleto</p>
                                                </div>
                                                <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                                                <div class="flex col-span-2 items-center space-x-2">
                                                    <span> Por favor</span> <a
                                                        class="inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                        href="{{ route('associados.acompanhar-filiacao') }}">Clique aqui </a>
                                                    <span> para gerar boleto de filiação...</span>
                                                </div>
                                                <!--END: DADOS DA INSTITUIÇÃO -->
                                            </div>
                                        </div>
                                    @else
                                        <div class="border border-b-2 mb-2">
                                            Por favor preencha os campos <a class="font-bold text-blue-500"
                                                href="#servidores">Quantidade de Servidores</a> para gerar boleto de
                                            filiação...
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endcan
                        <!--BEGIN: DADOS REPRESENTANTE  -->
                        @livewire('paginas.associados.includes.representante-component', compact('model'), key(uniqId('representante')))
                        <!--END: DADOS REPRESENTANTE -->
                    @endauth
                @else
                    @auth
                        <div class="bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full"
                            role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-triangle"
                                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z">
                                </path>
                            </svg>
                            Por favor confira os dados da instituição, e salve as informações para continuar com o
                            cadastro:)
                        </div>
                    @endauth
                @endif
            </div>
            <!--END -->
            <!--BEGIN: valores da anuidade, abrir o arquivo: Resolucao-n-05-2021-anuidade-2022.doc -->
            <div
                class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Valores anuidades
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <!-- Heroicon name: solid/calendar -->
                            Confira a tabela
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3">
                        <a href="/storage/files/Resolucao-n-05-2021-anuidade-2022.doc" target="_blank"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            <span class="ml-2">Baixar</span>
                        </a>
                    </span>
                </div>
            </div>
            <div
                class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Proposta de Filiação
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <!-- Heroicon name: solid/calendar -->

                            Confira
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3">
                        <a href="/storage/files/Filiação APEPREV.pdf" target="_blank"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            <span class="ml-2">Baixar</span>
                        </a>
                    </span>
                </div>
            </div>
            <!--END -->
        </div>
    </div>
</x-content>
