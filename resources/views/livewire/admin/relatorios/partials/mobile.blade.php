<div x-show="menu" class="relative z-40 " role="dialog" aria-modal="true">
    <div x-show="menu" class="fixed inset-0 bg-black bg-opacity-25" x-transition:enter="ease-in-out duration-500"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"></div>
    <div x-show="menu" class="fixed inset-0 flex z-40"
        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
        <div
            class="ml-auto relative max-w-md w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">
            <div class="px-4 flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                <button type="button" @click="toggleMenu"
                    class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Filters -->
            <form class="mt-4 w-full border-t border-gray-200">
                <h3 class="sr-only">Categories</h3>
                @if (array_filter($columns))
                    <ul role="list" class="font-medium text-gray-900 px-2 py-3">
                        @foreach ($columns as $column)
                            @include('livewire.admin.relatorios.partials.selecteds')
                        @endforeach
                    </ul>
                    @if ($parents = data_get($columns, 'parent'))
                        @foreach ($parents as $name => $parent)
                            <div x-data="{ item: false }" class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    @include('livewire.admin.relatorios.partials.collapse')
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div class="pt-6" id="filter-section-mobile-0" x-show="item">
                                    <div class="space-y-2">
                                        @foreach ($parent as $item)
                                            @include('livewire.admin.relatorios.partials.selecteds-mobile-item')
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </form>
        </div>
    </div>
</div>
