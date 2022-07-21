<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600 lg:col-span-1">
            <p class="font-medium text-lg">Dados do Representante</p>
            <p>Preencha corretamente todos os campos</p>
        </div>

        <form wire:submit.prevent="save" class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-6">
                    <x-input wire:model.defer="data.name" label="Nome do representante"
                        placeholder="Nome do representante" />
                </div>
                <div class="md:col-span-6">
                    <x-input wire:model.defer="data.cargo" label="Cargo" placeholder="Cargo" />
                </div>
                <div class="md:col-span-6">
                    <x-inputs.maskable mask="['##/##/####']" wire:model.defer="data.data_nascimento" label="Data Nasc."
                        placeholder="XX/XX/XXXX" />
                </div>
                <div class="md:col-span-2">
                    <x-inputs.maskable mask="###.###.###-##" wire:model.defer="data.document" label="CPF"
                        placeholder="000.000.000-00" />
                </div>
                <div class="md:col-span-2">
                    <x-inputs.maskable mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']"
                        wire:model.defer="data.phone" label="Telefone (DDD) XXXX-XXXX" placeholder="(DDD) XXXX-XXXX" />
                </div>
                <div class="md:col-span-2">
                    <x-inputs.maskable mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']"
                        wire:model.defer="data.whatsapp" label="WhatsApp (DDD) XXXX-XXXX"
                        placeholder="(DDD) XXXX-XXXX" />
                </div>
                <div class="md:col-span-6">
                    <x-input wire:model.defer="data.email" class="pr-28" label="E-mail" placeholder="E-mail"
                        suffix="@mail.com" />
                </div>
                <div class="md:col-span-6 mt-2">
                    <x-toggle lg wire:model.defer="data.authorize" label="Autorizo a filiação do
                    RPPS junto a Apeprev" />
                </div>
                {{-- <div class="md:col-span-6 mt-2">
                    <x-toggle lg wire:model.defer="data.accept" label="Aceito o termo" />
                </div> --}}
                @auth
                    @can('update', $model)
                        <div class="md:col-span-6 text-right">
                            <div class="inline-flex items-end">
                                <x-button type="submit" spinner="save" primary label="Salvar Dados do Representante" />
                            </div>
                        </div>
                    @endcan
                @endauth
            </div>
        </form>
    </div>
</div>
