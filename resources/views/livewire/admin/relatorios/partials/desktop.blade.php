<form class="hidden lg:block sticky top-10">
    <h3>Instituição</h3>
    <div class="my-2">
        <x-select label="{{ __('Selecione Uma Tabela') }}" placeholder="{{ __('Selecione Uma Tabela') }}"
            wire:model="table">
            @if ($tables)
                @foreach ($tables as $class => $name)
                    <x-select.option label="{{ $name }}" value="{{ $class }}" />
                @endforeach
            @endif
        </x-select>
    </div>
    @if (array_filter($columns))
        <div class="">
            <ul role="list" class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
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
