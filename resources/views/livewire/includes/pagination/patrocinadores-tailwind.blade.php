<div class="absolute w-full">
    @if ($paginator->hasPages())
        <nav class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6">
                        ←
                    </button>
                @endif
            </span>
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                        class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6">
                        →
                    </button>
                @endif
            </span>
        </nav>
    @endif
</div>
