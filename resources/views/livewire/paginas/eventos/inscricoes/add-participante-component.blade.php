<div>
    <form wire:submit.prevent="save" class="grid gap-4 gap-y-2 text-sm grid-cols-8">
        <!--BEGIN: dados do responsável - user -->
        <div class="mt-4 col-span-8 md:col-span-5">
            <x-input wire:model.defer="participante.name" label="Nome completo do(a) participante" placeholder="Nome completo do(a) participante" />
        </div>
        <div class="mt-4 col-span-8 md:col-span-3">
            <x-input wire:model.defer="participante.cracha" label="Nome para o crachá" placeholder="Nome para o crachá" />
        </div>

        <div class="col-span-8 md:col-span-3">
            <x-tall.cpf wire:model.lazy="participante.cpf" label="CPF" placeholder="000.000.000-00" />
        </div>
        <div class="col-span-8 md:col-span-2">
            <x-input wire:model.defer="participante.rg" label="RG" placeholder="Registro Geral"/>
        </div>
        <div class="col-span-8 md:col-span-3">
            <x-select wire:model.lazy="participante.office_id" label="Cargo na Instituição"
                placeholder="Cargo na Instituição">
                @if ($offices)
                    @foreach ($offices as $office)
                        <x-select.option value="{{ $office->id }}" label="{{ $office->name }}" />
                    @endforeach
                @endif
                <x-select.option label="ADICIONAR UM CARGO" value="add" />
            </x-select>
        </div>
        <div class="col-span-8 md:col-span-2">
            <x-datetime-picker wire:model.defer="participante.birth_date" parse-format="DD-MM-YYYY" without-time
                label="Data Nascimento" placeholder="00/00/0000"/>
        </div>
        <div class="col-span-8 md:col-span-3">
            <x-input wire:model.defer="participante.email" label="E-mail" placeholder="email@domain.pr.gov.br" />
        </div>
        <div class="col-span-8 md:col-span-1">
            <x-input wire:model.defer="participante.ddd" label="DDD" placeholder="xx" />
        </div>
        <div class="col-span-8 md:col-span-2">
            <x-tall.whatsapp wire:model.lazy="participante.phone" label="WhatsApp" placeholder="xxxxx-xxxx" />
        </div>
        <div class="col-span-8">
            <x-select wire:model.defer="participante.tipo_inscricao_id" label="Tipo de Inscrição" placeholder="Tipo de Inscrição">
                @if ($instituicao)
                    @if ($tipo_inscricoes = $instituicao->tipo_inscricao)
                        @foreach ($tipo_inscricoes as $tipo_inscricoe)
                            <x-select.option value="{{ $tipo_inscricoe->id }}"
                                label="{{ $tipo_inscricoe->name }}" />
                        @endforeach
                    @endif
                @endif
            </x-select>
        </div>
        <!--END: dados do responsável - user -->
        @if ($plano = $this->plano)
            <div class="col-span-8 mt-4">
                <div class="flex items-center justify-end space-x-4">
                    <div>
                        @if (data_get($participante, 'id'))
                            <x-button type="button" class="w-full" primary squared spinner="save" size="lg"
                                label="Inscrever mais participante" wire:click="new"/>
                        @endif
                    </div>
                    <!-- Se cadastrar com sucesso, redirecionar para página cadastro-instituicao-sucesso.html-->
                    <div>
                        <x-button spinner="save" type="submit" class="w-full" positive squared size="lg"
                            label="Salvar Participante" />
                    </div>

                    <div class="text-center flex items-center">
                        <span
                            class="bg-yellow-400 inline-block px-3 py-2 font-semibold text-green-900 leading-tight w-full text-right">
                            <span class="relative">VALOR DA INSCRIÇÃO:
                                <span class="font-bold text-2xl"> R$ {{ form_read($plano->valor) }}</span></span>
                        </span>
                    </div>
                </div>
            </div>
        @endif
    </form>
    @livewire('paginas.eventos.inscricoes.office-component')
</div>
