@if (is_string($column))
    @if (!in_array($column, ['deleted_at', 'id']))
        @if (!\Str::contains($column, 'able_type'))
            @if (!\Str::contains($column, 'able_id'))
                @if (!\Str::contains($column, '_id'))
                    <li class="flex justify-between items-center  py-2">
                        @livewire('admin.relatorios.includes.column-component', compact('column','model'), key(sprintf("column-%s", $column)))
                        <div class="flex items-center">
                            <input id="{{ $column }}-column" wire:model="data.{{ $column }}"
                                value="{{ $column }}" type="checkbox"
                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="{{ $column }}-column" class="ml-3 text-sm text-gray-600">
                                {{ __(\Str::title($column)) }}
                            </label>
                        </div>
                        <div>
                           <button type="button"  wire:click="$emitTo('admin.relatorios.includes.column-component', 'openModal','{{$column}}')">
                             <x-icon name="eye" class="w-5 h-5" />
                           </button>
                        </div>
                    </li>
                @endif
            @endif
        @endif
    @endif
@endif
