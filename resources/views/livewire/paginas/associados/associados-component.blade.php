<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Apeprev - Associados
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Relação/Associados</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="py-8">
    @foreach ($models as $model)
        <!--BEGIN: certidão municipal, abrir o arquivo: municipal-091121160250_certidao_municipal_pdf.pdf -->

        <p class="md:space-x-1 space-y-1 md:space-y-0 mb-4">
            <button
                class="inline-block px-6 py-2.5 font-medium text-xs text-left leading-tight uppercase rounded shadow-md hover:bg-gray-200 hover:shadow-lg focus:bg-gray-200 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-200 active:shadow-lg transition duration-150 ease-in-out w-full"
                type="button" data-bs-toggle="collapse" data-bs-target="#{{$model->slug}}" aria-expanded="false"
                aria-controls="{{$model->slug}}">
                {{ \Str::beforeLast($model->name, '-') }}
            </button>
        </p>
        <div class="collapse" id="{{$model->slug}}">
            <div class="block p-6 rounded-lg shadow-lg bg-white mb-4">
                <div class="card card-body">
                    <b>{{ \Str::beforeLast($model->name, '-') }} -</b>
                    <br /> <b>ENDEREÇO:</b> {{ $model->address->street }},
                    {{ $model->address->number }} -
                    CEP: {{ $model->address->zip }} - {{ $model->address->district }} -
                    {{ $model->address->city }}/{{ $model->address->state }} <br />
                    <b>E-MAIL</b>{{ $model->email }}</br>
                    <b>TELEFONE</b> {{ $model->phone }}
                </div>
            </div>
        </div>
        <!--END -->
    @endforeach
</x-content>
