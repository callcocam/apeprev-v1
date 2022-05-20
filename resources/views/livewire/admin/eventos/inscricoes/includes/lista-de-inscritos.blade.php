@if ($this->validarInscrito($item))
    <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
    @else
    <tr class="bg-gray-300 border text-red-500 border-grey-500 md:border-none block md:table-row">
@endif
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    @if ($this->validarInscrito($item))
        <x-toggle value="{{ $item->id }}" lg wire:model="checkboxValues.{{ $item->id }}" />
    @else
        Dados imcompletos<br> <a class="text-blue-500 font-bold" href="" wire:click.prevent="edit('{{ $item->id }}')" >Editar</a>
    @endif
</td>
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    <span class="inline-block w-1/3 md:hidden font-bold">NOME</span>{{ $item->name }}
</td>
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    <span class="inline-block w-1/3 md:hidden font-bold">CPF</span>{{ $item->cpf }}
</td>
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    @if ($hotel = $model->hotel)
        <span class="inline-block w-1/3 md:hidden font-bold">HOTEL</span>
        <x-toggle lg wire:model.defer="hotel.{{ $item->id }}" label="{{ __('Fazer reserva de hotel.') }}" />
    @endif
</td>
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    <span class="inline-block w-1/3 md:hidden font-bold">VALOR</span>
    @if ($plano = $this->plano)
        R$
        {{ form_read($plano->valor) }}
    @endif
</td>
<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
    <div class="flex space-x-2">
        <span class="inline-block w-1/3 md:hidden font-bold">AÇÃO</span>
        @if ($this->validarInscrito($item))
            @if (!\Arr::get($checkboxValues, $item->id))
                <x-button.circle positive icon="check" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Gerar Inscrição" spinner="gerarBoleto" wire:click="gerarBoleto('{{ $item->id }}')" />
            @endif
        @endif
        <x-button.circle icon="pencil" spinner="edit" primary label="Alterar"
            wire:click="edit('{{ $item->id }}')" />
    </div>
</td>
</tr>
