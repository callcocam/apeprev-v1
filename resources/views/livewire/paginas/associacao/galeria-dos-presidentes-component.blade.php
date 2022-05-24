<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Galeria dos Presidentes
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Galeria dos Presidentes</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div
                class="inline-flex shadow-lg border border-gray-200 rounded-full filter grayscale overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/marcio.png"
                    alt="Márcio Oliveira Apolinário">
            </div>
            <h2 class="mt-4 font-bold text-xl">Márcio Oliveira Apolinário</h2>
            <h6 class="mt-2 text-sm font-medium">8º Presidente - 2019 a 2021</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Jussara-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/aurenilson.png"
                    alt="Aurenilson Cipriano">
            </div>
            <h2 class="mt-4 font-bold text-xl">Aurenilson Cipriano</h2>
            <h6 class="mt-2 text-sm font-medium">7º Presidente - 2017 a 2019</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Andira-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/luiz-marcelo.png"
                    alt="Luiz Marcelo da Silva">
            </div>
            <h2 class="mt-4 font-bold text-xl">Luiz Marcelo da Silva</h2>
            <h6 class="mt-2 text-sm font-medium">6º Presidente - 2016 a 2016</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Quatro Barras-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/jaqueline.png"
                    alt="Jaqueline Nielzer Marques">
            </div>
            <h2 class="mt-4 font-bold text-xl">Jacqueline Niezer Marques</h2>
            <h6 class="mt-2 text-sm font-medium">5º Presidente - 2015 a 2017</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Piên-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/fabio-luiz.png"
                    alt="Fabio Luiz Cibirello">
            </div>
            <h2 class="mt-4 font-bold text-xl">Fabio Luiz Cibirello</h2>
            <h6 class="mt-2 text-sm font-medium">4º Presidente - 2013 a 2014</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Cambé-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/fabio-luiz.png"
                    alt="Fabio Luiz Cibirello">
            </div>
            <h2 class="mt-4 font-bold text-xl">Fabio Luiz Cibirello</h2>
            <h6 class="mt-2 text-sm font-medium">3º Presidente - 2011 a 2013</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Cambé-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/jocelaine.png" alt="Jocelaine M Souza">
            </div>
            <h2 class="mt-4 font-bold text-xl">Jocelaine M Souza</h2>
            <h6 class="mt-2 text-sm font-medium">2º Presidente - 2007 a 2009</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Curitiba-PR </p>
        </div>

        <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
            <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                <img class="filter grayscale h-full w-full" src="/storage/images/gerson.png" alt="Gerson Luiz Almeida">
            </div>
            <h2 class="mt-4 font-bold text-xl">Gerson Luiz Almeida</h2>
            <h6 class="mt-2 text-sm font-medium">1º Presidente - 2003 a 2005</h6>
            <p class="text-xs text-gray-500 text-center mt-3">Pinhão-PR </p>
        </div>
    </div>
</x-content>
