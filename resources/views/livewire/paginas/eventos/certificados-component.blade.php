<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Busca Certificado
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Certificados</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="mt-5">
    <div
        class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
               Certificados a partir de 2022
            </h2>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="sm:ml-3">
                <a href="https://evento.apeprev.com.br/meu_certificado/" target="_blank"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-secondary-900 hover:bg-secondary-1000 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="ml-2">Acesse aqui para baixar</span>
                </a>
            </span>
        </div>
    </div>
    @if ($certificados)
        <table class="flex flex-col w-full space-y-1 mb-5">
            <thead>
                <tr
                class=" text-center flex w-full justify-center py-1 border-t-2 border-secondary-200 items-center">
                <th colspan="4" class="flex-1 text-3xl">Certificados até 2021</th>
            </tr>
                <tr
                    class=" text-left flex w-full justify-start space-x-4 py-1 border-t-2 border-secondary-200 items-center">
                    <th class="flex-1">Evento</th>
                    <th class="md:w-56">Cidade</th>
                    <th class="md:w-64">Período</th>
                    <th class="w-8"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificados as $index => $certificado)
                    @if ($index)
                        <tr
                            class="flex w-full justify-start space-x-4 hover:bg-gray-200  py-1 border-t-2 border-secondary-200 items-center">
                            <td class="flex-1">{{ $certificado[1] }}</td>
                            <td class="md:w-56">{{ $certificado[3] }}</td>
                            <td class="md:w-64">{{ $certificado[2] }}</td>
                            <td class="text-center w-8">
                                <a href="{{ route('eventos.certificado', $certificado[0]) }}">
                                    <x-icon name="search" class="h-5 w-5" />
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
</x-content>
