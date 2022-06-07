<div id="servidores" class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600">
            <p class="font-medium text-lg">Quantidade de Servidores</p>
            <p>Preencha corretamente todos os campos</p>
        </div>
        <form wire:submit.prevent="save" class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-2">
                    <x-input wire:model.defer="data.ativos" label="Nº Ativos" placeholder="Nº Ativos" />
                </div>

                <div class="md:col-span-2">
                    <x-input wire:model.defer="data.aposentados" label="Nº Aposentados" placeholder="Nº Aposentados" />
                </div>

                <div class="md:col-span-2">
                    <x-input wire:model.defer="data.pensionistas" label="Nº Pensionistas"
                        placeholder="Nº Pensionistas" />
                </div>
                <div class="md:col-span-6 text-right">
                    <div class="inline-flex items-end">
                        <x-button type="submit" spinner="save" primary label="Salvar Dados dos Servidores" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
