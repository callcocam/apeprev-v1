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
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600 lg:col-span-2">
                        <p class="font-medium text-lg">CNPJ, da instituição</p>
                        <p>Preencha corretamente o campo com o CNPJ, da instituição</p>
                    </div>
                    <form wire:submit.prevent="validarDocument" class="lg:col-span-1">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                            <div class="md:col-span-6">
                                <x-inputs.maskable mask="##.###.###/####-##" wire:model.defer="data.document" label="Digite o CNPJ"
                                placeholder="000.000.000/0000-00" />
                            </div>
                            <div class="md:col-span-6 text-right">
                                <div class="inline-flex items-end">
                                    <x-button type="submit" spinner="validarDocument" primary label="Validar documento" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
