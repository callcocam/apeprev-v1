<form wire:submit.prevent="saveAndStay">
    <x-card>
        <x-slot name="header">
            <div class="flex flex-col justify-between items-start  text-left py-3 px-2  border-b-2">
                <h2 class="text-xl">Cofiguração do cabeçalho</h2>
                <p class="text-gray-400">Cofigure o formato cores e fonte e tamanho do cabeçalho</p>
            </div>
        </x-slot>
        {{-- <x-errors title="We found {errors} validation error(s)" /> --}}
        <div class="md:grid md:grid-cols-12 gap-y-3 gap-x-4">
            @if ($fields)
                @foreach ($fields as $field)
                    <div class="col-span-{{ $field->span }} ">
                        @include(sprintf('tall-forms::fields.%s', $field->type))
                    </div>
                @endforeach
            @endif
        </div>
        <x-slot name="footer">
            <div class="flex justify-between items-center">
                <x-button label="Delete" flat negative />
                <x-button spinner="saveAndStay" type="submit" label="Salvar alterações" primary />
            </div>
        </x-slot>
    </x-card>
</form>
