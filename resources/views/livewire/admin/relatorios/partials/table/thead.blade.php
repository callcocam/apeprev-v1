<thead class="border-b bg-slate-300 shadow-sm">
    <tr>
        @foreach ($selecteds as $name => $items)
            @if (is_string($items))
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                    <div class="flex justify-between items-center">
                        <span> {{ __(\Str::title($items)) }}</span>
                        <div class="flex space-x-2 items-center">
                            @if ($column = $items)
                                @livewire('admin.relatorios.includes.column-component', compact('column', 'name', 'model'), key(sprintf('column-%s', $items)))
                            @endif
                            <button type="button" wire:click="removeColumn">
                                <x-icon name="trash" class="w-5 h-5" style="solid" />
                            </button>
                        </div>
                    </div>
                </th>
            @else
                @if ($selecteds_items = array_filter($items))
                    @foreach ($selecteds_items as $item)
                        @if ($column = $item)
                            <th scope="col"
                                class="text-sm font-medium text-gray-900 px-6 py-2 border-r-2 border-white">
                                <div class="flex justify-between items-center">
                                    <span>
                                        {{ __(\Str::title($name)) }}
                                        {{ __(\Str::title($item)) }}
                                    </span>
                                    <div class="flex space-x-2 items-center">
                                        @livewire('admin.relatorios.includes.column-component', compact('column', 'name', 'model'), key(sprintf('column-item-%s', $item)))
                                        <button type="button" wire:click="removeColumn">
                                            <x-icon name="trash" class="w-5 h-5" style="solid" />
                                        </button>
                                    </div>
                                </div>
                            </th>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    </tr>
</thead>
