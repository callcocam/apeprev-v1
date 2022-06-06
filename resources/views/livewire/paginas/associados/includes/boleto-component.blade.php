<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600">
            <p class="font-medium text-lg">Dados da Instituição</p>
            <p>Gerar o recadastramento para o ano {{ date("Y") }}?</p>
        </div>
        <form wire:submit.prevent="save" class="lg:col-span-2">
            <div class="md:col-span-6 text-right">
                <div class="inline-flex items-end">
                    <x-button type="submit" spinner="save" primary label="Gerar boleto" />
                </div>
            </div>
        </form>
    </div>
</div>
