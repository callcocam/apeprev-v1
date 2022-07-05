<x-modal.card title="Adicionar um cargo" blur wire:model.defer="officeModal" max-width="lg" hide-close="true">
    <x-input wire:model.defer="name" class="w-full" label="{{__('Descrição do cargo')}}" placeholder="{{ __('ex:Secretário')}}" />
    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat label="Cancel" wire:click="close" />
            <x-button primary label="{{ __('Salvar Cargo')}}" wire:click="save" />
        </div>
    </x-slot>
</x-modal.card>
