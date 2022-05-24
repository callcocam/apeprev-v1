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
                    <x-breadcrums> {{ $certificado[1] }} - {{ $certificado[2] }}</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>

<x-content class="mt-5">
    <div class="felx w-full justify-items-center flex-col items-center">
        <form class="flex flex-col w-96 bg-blue-600 mx-auto rounded-lg py-5 px-6 space-y-2" target="_blank"
            action="https://datamodule.websiteseguro.com/apeprev/cert_evento.php" method="post">
            <div class="form-group">
                <h4 class="text-left">Por favor digite o seu CPF</h4>
                <input type="text" class="form-control w-full" placeholder="CPF" name="nu_cpf" id="nu_cpf"
                    class="cpf">
            </div>
            <div class="form-group">
                <h4 class="text-left">ou código de barras</h4>
                <input type="number" class="form-control w-full" placeholder="Código" name="nu_nn" id="nu_nn"
                    class="codigo">
            </div>
            <input type="hidden" name="cd_evento" value="{{ $id }}">
            <div class="form-group clearfix">
                <x-button dark  type="submit" class="w-full" label="Buscar" />
            </div>
        </form>
    </div>
</x-content>
