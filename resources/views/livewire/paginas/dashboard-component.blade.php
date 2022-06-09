<div class="mt-0 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    @livewire(lv_includes('sliders'))
    @livewire(lv_includes('patrocinadores-pagination'))
    {{-- @livewire(lv_includes('patrocinadores')) --}}
    @livewire(lv_includes('filie-se'))
    <x-content>
        @livewire(lv_includes('eventos.list'))
    </x-content>
    <x-content>
        @livewire(lv_includes('posts.lasts'))
    </x-content>
</div>
