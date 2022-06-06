<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600">
            <p class="font-medium text-lg">Dados da Instituição</p>
            <p>Gerar o recadastramento para o ano {{ date('Y') }}?</p>
        </div>
        <form wire:submit.prevent="save" class="lg:col-span-2 space-y-2">
            <div class="col-span-6">
                <x-input wire:model.defer="data.instituicao_id" label="instituicao_id" placeholder="instituicao_id" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.valor" label="valor" placeholder="valor" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.razao_social" label="razao_social" placeholder="razao_social" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.cnpj" label="cnpj" placeholder="cnpj" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.cep" label="cep" placeholder="cep" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.endereco" label="endereco" placeholder="endereco" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.bairro" label="bairro" placeholder="bairro" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.cidade" label="cidade" placeholder="cidade" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.uf" label="uf" placeholder="uf" />
            </div>
            
            <div class="col-span-6">
                <x-input wire:model.defer="data.vencimento" label="vencimento" placeholder="vencimento" />
            </div>
            <div class="col-span-6">
                <x-input wire:model.defer="data.obs" label="Observações" placeholder="Observações" />
            </div>
            <div class="col-span-6 text-right">
                <div class="inline-flex items-end">
                    <x-button type="submit" spinner="save" positive label="Gerar boleto para afiliação" />
                </div>
            </div>
        </form>
    </div>
</div>
