<x-modal.card title="Edit Customer" blur wire:model.defer="cardModal" max-width="md">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="col-span-1 sm:col-span-2">
            <x-input label="Email" placeholder="example@mail.com" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input label="Password" placeholder="********" />
        </div>
    </div> 
    <x-slot name="footer">
        <div class="flex justify-between gap-x-4"> 
            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button primary label="Save" wire:click="save" />
            </div>
        </div>
    </x-slot>
</x-modal.card>