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
    @if ($certificados)
        <table class="flex flex-col w-full space-y-1 mb-5">
            <thead>
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
                                @if (\Str::contains($certificado[0], 'http'))
                                    <a target="_blank" href="{{ $certificado[0] }}">
                                        <x-icon name="search" class="h-5 w-5" />
                                    </a>
                                @else
                                    <a target="_blank" href="{{ route('servicos.certificado', $certificado[0]) }}">
                                        <x-icon name="search" class="h-5 w-5" />
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
</x-content>
