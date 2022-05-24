<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="text-gray-800 text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-2">
                    Ferramentas Comprev
                </h1>

                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Ferramentas Comprev</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content>
    <section class="container mx-auto mt-5">
        <table class="w-full flex flex-col space-y-3">
            <tr>
                <td class="py-2">
                    <a class="text-blue-500 flex items-center space-x-2"
                        href="{{ route('servicos.calculadora-comprev') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg> <span>
                            Calculadora de Comprev
                        </span>
                    </a>
                </td>
                <td class="py-2">Calcula valores de compensação previdenciária a pagar e a receber. É possível
                    fazer cálculos
                    manuais ou cálculos em lote, carregando planilhas do sistema BG Comprev.</td>
            </tr>
            <tr>
                <td class="py-2">
                    {{-- https://www.comprevfacil.com.br/painel/glosa/inserir --}}
                    <a class="text-blue-500 flex items-center space-x-2"
                       target="_blank" href="https://www.comprevfacil.com.br/painel/glosa/inserir">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg> <span>
                            Calculadora de Glosa</span>
                    </a>
                </td>
                <td class="py-2">Calcula a restituição de valores pagos indevidamente a título de compensação
                    previdenciária,
                    conhecidos por glosa.</td>
            </tr>
            <tr>
                <td class="py-2">
                    <a class="text-blue-500 flex items-center space-x-2"
                      target="_blank"  href="https://www.comprevfacil.com.br/painel/calculadora/inserir">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg> <span>
                            Calculadora de Datas 
                        </span>
                    </a>

                </td>
                <td class="py-2">Calcula períodos de contribuição dentro da sistemática atualmente utilizada
                    no cálculo de
                    compensação previdenciária (mês com 30 dias e ano com 365 dias).</td>
            </tr>
            <tr>
                <td class="py-2">
                    {{-- https://www.comprevfacil.com.br/painel/mapa/inserir --}}
                    <a class="text-blue-500 flex items-center space-x-2"
                       target="_blank" href="https://www.comprevfacil.com.br/painel/mapa/inserir">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        <span>
                            Gerador de Mapa de Tempos de
                            Contribuição 
                        </span></a>
                </td>
                <td class="py-2">Gera Mapas de Tempo de Contribuição, documento obrigatório para solicitar
                    requerimentos
                    de compensação previdenciária. Totalmente personalizável permitindo que o RPPS insira dados
                    pessoais e institucionais, como sua logomarca própria.</td>
            </tr>
        </table>
        <div class="flex w-full justify-center border-b-2">
            <h2 class="font-bold py-5">Em caso de dúvidas ou problemas envie um email para: <span class="text-gray-600">faleconosco@comprevfacil.com.br</span></h2>
        </div>
    </section>
    @livewire(lv_includes('share'))
</x-content>
