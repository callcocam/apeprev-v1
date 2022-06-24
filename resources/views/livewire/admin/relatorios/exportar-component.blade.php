<div>
    <div x-data="{
        open: false,
        menu: false,
        toggleMenu() {
            this.menu = !this.menu
        },
        toggle() {
            this.open = !this.open
        }
    }" class="bg-white">
        <div>
            @include('livewire.admin.relatorios.partials.mobile')
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative z-10 flex items-baseline justify-between pt-2 pb-6 border-b border-gray-200">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">New Arrivals</h1>

                    <div class="flex items-center">
                        <button @click="toggleMenu" type="button"
                            class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
                            <span class="sr-only">Filters</span>
                            <!-- Heroicon name: solid/filter -->
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <section aria-labelledby="products-heading" class="pt-1 pb-24">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10 relative">
                        <!-- Filters -->
                        <form class="hidden lg:block sticky top-10">
                            <h3>Instituição</h3>
                            <div class="my-2">
                                <x-select label="{{ __('Selecione Uma Tabela') }}"
                                    placeholder="{{ __('Selecione Uma Tabela') }}" wire:model="table">
                                    @if ($tables)
                                        @foreach ($tables as $class => $name)
                                            <x-select.option label="{{ $name }}" value="{{ $class }}" />
                                        @endforeach
                                    @endif
                                </x-select>
                            </div>
                            @if (array_filter($columns))
                                <div class="">
                                    <ul role="list"
                                        class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
                                        @foreach ($columns as $column)
                                            @include('livewire.admin.relatorios.partials.selecteds')
                                        @endforeach
                                    </ul>
                                    @if ($parents = data_get($columns, 'parent'))
                                        @foreach ($parents as $name => $parent)
                                            <div x-data="{ item: false }" class="border-b border-gray-200 py-6">
                                                <h3 class="-my-3 flow-root">
                                                    <!-- Expand/collapse section button -->
                                                    @include('livewire.admin.relatorios.partials.collapse')
                                                </h3>
                                                <!-- Filter section, show/hide based on section state. -->
                                                <div class="pt-6" id="filter-section-0" x-show="item">
                                                    <div class="space-y-4">
                                                        @foreach ($parent as $item)
                                                            @include('livewire.admin.relatorios.partials.selecteds-item')
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </form>
                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <!-- Replace with your content -->
                            <div class="block border-4 border-dashed border-gray-200  p-2 rounded-lg h-96  lg:h-full z-20">
                                @include('livewire.admin.instituicoes.header-component')
                                @if ($selecteds = array_filter($data))
                                    @if ($models)
                                        <div class="flex flex-co">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div class="overflow-hidden">
                                                        @if (array_filter($selecteds))
                                                            <table class="w-full text-left">
                                                                <thead class="border-b bg-white">
                                                                    <tr>
                                                                        @foreach ($selecteds as $name => $items)
                                                                            @if (is_string($items))
                                                                                <th scope="col"
                                                                                    class="text-sm font-medium text-gray-900 px-6 py-2">
                                                                                    {{ __(\Str::title($items)) }}
                                                                                </th>
                                                                            @else
                                                                                @if ($selecteds_items = array_filter($items))
                                                                                    @foreach ($selecteds_items as $item)
                                                                                        <th scope="col"
                                                                                            class="text-sm font-medium text-gray-900 px-6 py-2">
                                                                                            {{ __(\Str::title($name)) }}
                                                                                            {{ __(\Str::title($item)) }}
                                                                                        </th>
                                                                                    @endforeach
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="h-[500px] overflow-y-scroll">
                                                                    @foreach ($models as $model)
                                                                        <tr class="bg-white border-b">
                                                                            @foreach ($selecteds as $name => $items)
                                                                                @if (is_string($items))
                                                                                    <td
                                                                                        class="px-6 py-2 text-sm font-medium text-gray-900">
                                                                                        {{ data_get($model, $items) }}
                                                                                    </td>
                                                                                @else
                                                                                    @if ($selecteds_items = array_filter($items))
                                                                                        @foreach ($selecteds_items as $item)
                                                                                            <td
                                                                                                class="px-6 py-2 text-sm font-medium text-gray-900">
                                                                                                {{ data_get($model, sprintf('%s.%s', $name, $item)) }}
                                                                                            </td>
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach

                                                                        </tr>
                                                                    @endforeach
                                                            </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <!-- /End replace -->
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                // Alpine.data('export', () => ())
            })
        </script>
    @endpush
</div>
