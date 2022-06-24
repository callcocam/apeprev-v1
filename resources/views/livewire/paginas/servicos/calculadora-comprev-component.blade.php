<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="text-gray-800 text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-2">
                    Calculadora de Comprev
                </h1>

                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Calculadora de Comprev</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content>
    <section class="container mx-auto mt-5">
        <h1 class="text-primary text-center font-bold text-3xl mb-3">ATENÇÃO</h1>
        <p class="text-justify pb-4 pt-4">
            1. A simulação é feita com base na data da consulta, não sendo recomendado fazer projeções de valores para
            requerimentos já deferidos ou projeções para valores futuros
        </p>
        <p class="text-justify pb-4 pt-4">
            2. A simulação leva em consideração duas variáveis: o valor do benefício e o valor médio dos benefícios
            pagos pelo RGPS, escolhendo sempre o menor, conforme o Artigo 6º do Decreto 10.188/19.
        </p>
        <p class="text-justify pb-4 pt-4">
            3. A simulação não considera as outras formas de cálculo englobadas na compensação previdenciária, como:
            valor da remuneração da data de desvinculação, valores de contribuições no CNIS, bem como tabelas
            limitadores de salário-mínimo e teto de benefícios pagos pelo RGPS, além das regras de prescrição
        </p>
        <p class="text-justify pb-4 pt-4">
            4. Não é possível simular os valores das pensões, tendo em vista que os percentuais se rementem diretamente
            as aposentadorias.
        </p>
        <p class="text-justify pb-4 pt-4">
            5. Não é possível simular requerimentos que tenham a data do início do benefício anterior a julho de 1994,
            uma vez que o cálculo não está preparado para as conversões de moedas.
        </p>

        <p class="text-justify pb-4 pt-4">
            6. Todos os valores apresentados configuram-se <b>em meras estimativas limitadas dentro das condições
                especificadas acima</b> e dependem exclusivamente das informações preenchidas pelos usuários, desta
            forma a Associação Paranaense das Entidades Previdenciárias do Estado e dos Municípios (APEPREV) não se
            responsabiliza por divergências de valores quando da aprovação dos requerimentos simulados.
        </p>
        <div x-data="{ show: false }">
            <section class="container mx-auto pb-10 ">
                <label for="checkbox" class="relative flex-inline items-center isolate  rounded-2xl">
                    <input id="checkbox" type="checkbox" x-on:click="show= !show"
                        class="relative peer z-20 text-purple-600 rounded-md focus:ring-0" />
                    <span class="ml-2 relative z-20">Estou ciente das informações esclarecidas acima</span>
                    <div
                        class="absolute inset-0 bg-white peer-checked:bg-purple-50 peer-checked:border-purple-300 z-10  rounded-2xl">
                    </div>
                </label>
            </section>
            <!-- Por definição, os buttons carregam desativados. Só ficarão ativos se concordar com os termos acima. A classe que desativa é: cursor-not-allowed -->
            <div class="mt-5 mb-10 flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <a x-show="!show"
                        class="inline-flex cursor-not-allowed items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-400 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="ml-2">Carregar Planilha do BG Comprev</span>
                    </a>
                    <a x-show="show" target="_blank"
                        href="https://www.comprevfacil.com.br/painel/comprev/calculo_importacao"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="ml-2">Carregar Planilha do BG Comprev</span>
                    </a>
                </span>
            </div>
            <div class="mt-5 mb-10 flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <a x-show="!show"
                        class="inline-flex cursor-not-allowed items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-400 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="ml-2">Fazer Cálculo Manualmente</span>
                    </a>
                    <a x-show="show" target="_blank"
                        href="https://comprevfacil.com.br/painel/comprev/calculo_importacao_manual"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="ml-2">Fazer Cálculo Manualmente</span>
                    </a>
                </span>
            </div>
            <div
                class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        GUIA BG COMPREV
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">

                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3">
                        <a target="_blank" href="{{ \Storage::url('files/guia-bg-apeprev.pdf') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <!-- o guia está neste caminho: \storage\app\public\downloads\guia-bg-apeprev.pdf-->
                            <span class="ml-2">Baixar Guia</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="flex w-full justify-center border-b-2">
            <h2 class="font-bold py-5">Em caso de dúvidas ou problemas envie um email para: <span
                    class="text-gray-600">faleconosco@comprevfacil.com.br</span></h2>
        </div>
    </section>
    @livewire(lv_includes('share'))
</x-content>
