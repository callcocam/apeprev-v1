<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="rounded-md flex items-center">
            <div class="text-gray-800 text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-2">
                   Eventos
                </h1>

                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums> Eventos</x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content>
    <section class="text-slate-700 bg-white mt-5">
        @if ($models)
            @forelse ($models as $model)
            <div class="flex w-full divide-y divide-yellow-500 border-b-2">
                <div class=" flex flex-col items-center py-5 md:flex-row">
                    @if ($loop->index % 2)
                        @include('livewire.paginas.eventos.left')
                    @else
                        @include('livewire.paginas.eventos.right')
                    @endif
                </div>
            </div>                
            @empty
                Ops!!
            @endforelse
        @endif
    </section>
</x-content>
