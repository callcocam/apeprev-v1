<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="container mx-auto rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Regimento Eleitoral
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Regimento Eleitoral</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="p-8">
    <div
        class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Regimento Eleitoral
            </h2>
            <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <!-- Heroicon name: solid/calendar -->
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Data emissão: 25 de Março de 2021
                </div>
            </div>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="sm:ml-3">
                <!-- inserir esse arquivo para download:  Edital-Eleitoral-2021.pdf -->
                <a target="_blank" href="{{ \Storage::url('files/Edital-Eleitoral-2021.pdf') }}"
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
</x-content>
