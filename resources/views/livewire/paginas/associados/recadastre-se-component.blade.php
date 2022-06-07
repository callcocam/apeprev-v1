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
                @if ($status = $model->status)
                    @if ($status->slug == 'published')
                        @if ($servidores_count)
                            <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                            @livewire('paginas.associados.includes.boleto-component', compact('model'), key(uniqId('instituicao')))
                            <!--END: DADOS DA INSTITUIÇÃO -->
                        @else
                            <div class="border border-b-2 mb-2">
                                Por favor preencha os campos <a class="font-bold text-blue-500"
                                    href="#servidores">Quantidade de Servidores</a> para gerar boleto de afiliação...
                            </div>
                        @endif
                    @endif
                @endif

                <!--BEGIN: DADOS DA INSTITUIÇÃO -->
                @livewire('paginas.associados.includes.instituicao-component', compact('model'), key(uniqId('instituicao')))
                <!--END: DADOS DA INSTITUIÇÃO -->

                <!-- BEGIN: NÚMEROS DA INSTITUIÇÃO -->
                @livewire('paginas.associados.includes.servidores-component', compact('model'), key(uniqId('instituicao')))
                <!-- END: NÚMEROS DA INSTITUTIÇÃO -->

                <!--BEGIN: DADOS REPRESENTANTE  -->
                @livewire('paginas.associados.includes.representante-component', compact('model'), key(uniqId('representante')))
                <!--END: DADOS REPRESENTANTE -->

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
