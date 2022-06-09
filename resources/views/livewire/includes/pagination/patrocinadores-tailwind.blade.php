@if ($paginator->hasPages())
    <div class="absolute inset-0 hidden sm:flex  px-8 z-0 w-full md:w-96 mx-auto">
        <div class="flex items-center justify-start w-1/2">
            @if (!$paginator->onFirstPage())
                <button
                    class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
                    wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                    &#8592;
                </button>
            @endif
        </div>
        <div class="flex items-center justify-end w-1/2">
            @if ($paginator->hasMorePages())
                <button
                    class="bg-blue-50 text-blue-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12 -mr-6"
                    wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
                    &#8594;
                </button>
            @endif
        </div>
    </div>
    <!-- Buttons -->
    <div class="absolute top-60 w-full inset-0 flex items-center justify-center px-4 mb-10 z-30">
        @foreach ($elements as $element)
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="bg-blue-100 shadow w-4 h-4 z-40 flex mt-4 mx-2 mb-0 rounded-full overflow-hidden">{{ $element }}</span>
                </span>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                        @if ($page == $paginator->currentPage())
                            <button
                                class="bg-orange-600 w-6 h-6 z-40 flex mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-1000 ease-out hover:bg-blue-600 hover:shadow-lg"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">

                            </button>
                        @else
                            <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                class="bg-blue-300  w-4 h-4 z-40 flex mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-1000 ease-out hover:bg-blue-600 hover:shadow-lg"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">

                            </button>
                        @endif
                    </span>
                @endforeach
            @endif
        @endforeach
    </div>

    @push('script')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('carousel', () => ({
                    timer: 5000,
                    activeSlide: 0,
                    init() {
                        setInterval(() => {
                            this.$refs.boxElement.classList.toggle('translate-y-60');
                            @this.navigation('{{ $paginator->getPageName() }}','{{ $paginator->onFirstPage() }}')

                        }, this.timer)
                    }
                }))
            })
        </script>
    @endpush
@endif