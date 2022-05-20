<x-slot name="header">
    <header>
        <!-- Section Hero -->
        <div class="mx-auto rounded-md flex items-center">
            <div class="flex flex-col text-gray-800 text-center sm:text-left w-full">
                <h1 class="text-4xl font-bold mb-4">
                    Sobre a Apeprev
                </h1>
                <section class="flex flex-col w-full">
                    <!-- BEGIN: breadcrums v1 -->
                    <x-breadcrums>Sobre a Apeprev </x-breadcrums>
                    <!-- END: breadcrums v1 -->
                </section>
            </div>
        </div>
    </header>
</x-slot>
<x-content class="flex flex-col items-center justify-center">
    <div>
         @if($content = $this->content)
         {!! $content !!}
         @else 
         @include('includes.defaults.sobre-nos')
        @endif
        @livewire(lv_includes('share'))
    </div>
</x-content>