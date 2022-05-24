<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Gestão 2021 A 2025
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Gestão, Diretoria e Conselho Fiscal - Apeprev 2021 a 2025</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="p-8">

    <!-- BEGIN: ATA DE POSSE-->
    <div class="py-12 bg-white">
        <div class=" mx-auto gap-4 sm:px-6 ">

            <div
                class="lg:flex lg:items-center mb-5 p-4 lg:justify-between bg-gray-100 rounded transform hover:scale-105 transition duration-500">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        ATA DE POSSE - GESTÃO 2021 A 2025
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            Certidão posse Presidente e Termo de Posse da Diretoria/Conselho Fiscal
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="sm:ml-3">
                        <a target="_blank" href="{{ \Storage::url("files/ata_posse_pdf.pdf") }}"
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

        </div>
    </div>
    <!-- END: ATA DE POSSE -->
    <!--BEGIN: GESTÃO -->
    <h2 class="text-primary font-bold text-3xl mt-8 mb-2">GESTÃO</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Márcio Oliveira Apolinário</h2>
            <h6 class="mt-2 text-sm font-medium">Presidente</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Jussara-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Edirlene Rodrigues Milharesi</h2>
            <h6 class="mt-2 text-sm font-medium">Vice-Presidente</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Loanda-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Marcelo Penha Goes</h2>
            <h6 class="mt-2 text-sm font-medium">2º Secretário</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Altamira do Paraná-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Mary Stela da Silva Bogarim</h2>
            <h6 class="mt-2 text-sm font-medium">1º Tesoureiro</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Campo Tenente-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Patricia Schedolsky Molenda</h2>
            <h6 class="mt-2 text-sm font-medium">2º Tesoureiro</h6>
            <p class="text-xs text-gray-500 text-center mt-3">São Mateus do Sul-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Paulo Sérgio Bernardino de Oliveira</h2>
            <h6 class="mt-2 text-sm font-medium">1º Secretário</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Sarandi-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Marcus Evandro Giarola</h2>
            <h6 class="mt-2 text-sm font-medium">Procurador Jurídico</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Atalaia-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Ivan Carlos Cunha Fernandes</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador de Eventos</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Ângulo-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Luiz Carlos Milharesi</h2>
            <h6 class="mt-2 text-sm font-medium">Assessor Jurídico</h6>
            <p class="text-xs text-gray-500 text-center mt-3">São Pedro do Paraná-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Maria Silvana Barbosa Frigo</h2>
            <h6 class="mt-2 text-sm font-medium">Assessora da Presidência</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Maringá-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Sheila Cristina da Silva</h2>
            <h6 class="mt-2 text-sm font-medium">Secretária Executiva</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Jandaia doa Sul-PR </p>
        </div>

    </div>
    <!--END: GESTÃO -->

    <!--BEGIN: DIRETORIA REGIONAL -->
    <h2 class="text-primary font-bold mt-8 mb-2 text-3xl">DIRETORIA REGIONAL</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Walter Franzoi</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Cafelândia-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Everton Luiz Nobile</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Ibaiti-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Alisson Rodrigo de Oliveira</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Imbituva-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Cinthia Soares Amboni</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Maringá-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Sonia Cristani</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Nova Prata do Iguaçu-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Ademilson Cândido da Silva</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Pato Branco-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Marcus Evandro Giarola</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Atalaia-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Luiz Claudio Leonel</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Pinhais-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Adelaide da Cruz</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Querência do Norte-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Marilda da Silva Barbosa</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Reserva do Iguaçu-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Roseli Fabris Dalla Costa</h2>
            <h6 class="mt-2 text-sm font-medium">Coordenador Regional</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Toledo-PR </p>
        </div>

    </div>
    <!--END: DIRETORIA REGIONAL -->

    <!--BEGIN: CONSELHO FISCAL -->
    <h2 class="text-primary font-bold text-3xl mt-8 mb-2">CONSELHO FISCAL</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Marcia Regina de Campos</h2>
            <h6 class="mt-2 text-sm font-medium">2º Titular</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Turvo-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Silvane Bottega</h2>
            <h6 class="mt-2 text-sm font-medium">3º Titular</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Campo Mourão-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Rosely Navarro Rodrigues</h2>
            <h6 class="mt-2 text-sm font-medium">1º Titular</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Paranavaí-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Alexandro de Marque</h2>
            <h6 class="mt-2 text-sm font-medium">1º Suplente</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Medianeira-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Andreia Cristina da Silva</h2>
            <h6 class="mt-2 text-sm font-medium">2º Suplente</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Cambé-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img src="https://via.placeholder.com/150" alt="" class="h-full w-full">
            </div>
            <h2 class="mt-4 font-bold text-xl">Adriana Maia Albini</h2>
            <h6 class="mt-2 text-sm font-medium">3º Suplente</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Paranaguá-PR </p>
        </div>

    </div>
    <!--END: CONSELHO FISCAL -->
</x-content>
