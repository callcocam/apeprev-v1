<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row text-blue-800">
    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">

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
            <x-toggle lg wire:model.defer="hotel.{{ $item->id }}.{{ $hotel->id }}"
                label="{{ sprintf('Fazer reservar de hotel. R$ %s', form_read($hotel->valor_single)) }}" />
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
            @if (!\Arr::get($checkboxValues, $item->id))
                <x-button.circle positive icon="qrcode" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Gerar Boleto" spinner="gerarBoleto" wire:click="gerarBoleto('{{ $item->id }}')" />
            @endif

            <x-button.circle icon="pencil" spinner="edit" primary label="Alterar"
                wire:click="edit('{{ $item->id }}')" />
            @if ($this->validarInscrito($item))
                @if ($inscrito = $this->getInscrito($model, $instituicao, $inscricoes, $item, 0))
                    <x-button.circle icon="trash" spinner="excluir" negative label="Exluir"
                        wire:click="excluir('{{ $inscrito->id }}')" />
                @elseif ($inscrito = $this->getInscrito($model, $instituicao, $inscricoes, $item, 1))
                    <x-button.circle icon="trash" spinner="excluir" negative label="Exluir"
                        wire:click="excluir('{{ $inscrito->id }}')" />
                @endif
            @endif

        </div>
    </td>
</tr>
