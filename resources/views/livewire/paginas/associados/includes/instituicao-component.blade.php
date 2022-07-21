<div>
    @if ($model->user)
        @auth
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Dados da Instituição</p>
                        <p>Preencha corretamente todos os campos</p>
                    </div>
                    <form wire:submit.prevent="save" class="lg:col-span-2">
                        <x-errors title="We found {errors} validation error(s)" />
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                            <div class="md:col-span-6">
                                <x-input wire:model.defer="data.name" label="Razão Social (INSTITUTO/FUNDO/FUNDAÇÃO)"
                                    placeholder="Razão Social (INSTITUTO/FUNDO/FUNDAÇÃO)" />
                            </div>

                            <div class="md:col-span-4">
                                <x-input wire:model.defer="data.fantasy_name" label="Nome Fantasia"
                                    placeholder="Nome Fantasia" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input wire:model.defer="data.document" label="CNPJ" placeholder="CNPJ" readonly />
                            </div>
                            <div class="md:col-span-6">
                                <x-input wire:model.defer="data.email" class="pr-28" label="Email da Instituição"
                                    placeholder="E-mail" />
                            </div>

                            <div class="md:col-span-2">
                                <x-inputs.maskable mask="#####-###" wire:model.lazy="data.address.zip" label="Codigo Postal"
                                    placeholder="Codigo Postal" />
                            </div>
                            <div class="md:col-span-1">
                                <x-input wire:model.defer="data.address.state" label="UF / Estado"
                                    placeholder="UF / Estado" />
                            </div>
                            <div class="md:col-span-3">
                                <x-input wire:model.defer="data.address.city" label="Cidade" placeholder="Cidade" />
                            </div>
                            <div class="md:col-span-3">
                                <x-input wire:model.defer="data.address.street" label="Endereço ** sem o número **"
                                    placeholder="Endereço ** sem o número **" />
                            </div>
                            <div class="md:col-span-1">
                                <x-input wire:model.defer="data.address.number" label="Número" placeholder="Número" />
                            </div>
                            <div class="md:col-span-2">
                                <x-input wire:model.defer="data.address.district" label="Bairro" placeholder="Bairro" />
                            </div>
                            @auth
                                @can('update', $model)
                                    <div class="md:col-span-6 text-right">

                                        <div class="flex items-center space-x-3 justify-end">
                                            @empty($model->name)
                                                <div class="text-red-500">
                                                    Por favor confira os dados da instituição, e salve as informações :)
                                                </div>
                                            @endempty
                                            <x-button type="submit" spinner="save" primary label="Salvar Dados da Instituição" />
                                        </div>
                                    </div>
                                @endcan
                            @endauth
                        </div>
                    </form>
                </div>
            </div>
        @else
            <!--BEGIN: DADOS DO USUÀRIO DA INSTITUIÇÃO -->
            @livewire('paginas.associados.includes.login-component', compact('model', 'data'), key(uniqId('user')))
            <!--END: DADOS DO  USUÀRIO DA INSTITUIÇÃO -->
        @endauth
    @else
        <!--BEGIN: DADOS DO USUÀRIO DA INSTITUIÇÃO -->
        @livewire('paginas.associados.includes.user-component', compact('model', 'data'), key(uniqId('user')))
        <!--END: DADOS DO  USUÀRIO DA INSTITUIÇÃO -->
    @endif


</div>
