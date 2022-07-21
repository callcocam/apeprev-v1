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
        <div class="overflow-hidden">
            @include('livewire.admin.relatorios.partials.mobile')
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative z-10 flex items-baseline justify-between pt-2 pb-6 border-b border-gray-200">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">
                        {{ data_get($tableAttr, 'tableTitle') }}</h1>
                </div>
                <section aria-labelledby="products-heading" class="pt-1 pb-24">

                    <div class="grid grid-cols-1  gap-x-8 gap-y-10 relative">
                        <!-- Filters -->
                        {{-- @include('livewire.admin.relatorios.partials.desktop') --}}
                        <!-- Product grid -->
                        <div class="col-span-1">
                            <!-- Replace with your content -->
                            <div
                                class="block border-4 border-dashed border-gray-200  p-2 rounded-lg h-96  lg:h-full z-20">
                                @include('livewire.admin.relatorios.partials.header')
                                @if ($selecteds = array_filter($colums))
                                    @if ($models)
                                        <div class="flex flex-co">
                                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div class="overflow-hidden">
                                                        @if (array_filter($selecteds))
                                                            <table class="w-full text-left">
                                                                @include('livewire.admin.relatorios.partials.table.thead')
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
