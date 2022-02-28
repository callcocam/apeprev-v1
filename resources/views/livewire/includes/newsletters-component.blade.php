<form wire:submit.prevent="sendMail">
    <p class="mb-0 text-sm uppercase text-white">Receba nossos boletins informativos.</p>
    @error('data.email')
        <span class="error text-white">{{ $message }}</span>
    @enderror
    <input type="email" name="email" wire:model.lazy="data.email"
        class="mb-2 p-3 w-full focus:border-blue-400 rounded border-2 outline-none" autocomplete="off"
        placeholder="E-mail">
    <button class="bg-blue-600 hover:bg-blue-800 text-white font-bold p-2 rounded w-full"
        type="submit"><span>INSCREVA-SE</span></button>
</form>
