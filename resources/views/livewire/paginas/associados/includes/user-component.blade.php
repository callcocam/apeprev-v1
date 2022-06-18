<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600">
            <p class="font-medium text-lg">Dados de acesso à Instituição</p>
            <p>Cadastre uma senha</p>
        </div>
        <form wire:submit.prevent="store" class="lg:col-span-2 space-y-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-6">                    
                <x-jet-validation-errors class="mb-4" />
                </div>
                {{-- <div class="md:col-span-3">
                    <x-input label="{{ __('Name') }}" wire:model="data.name" placeholder="{{ __('Name') }}"
                        autocomplete="name" />
                </div> --}}
                <div class="md:col-span-6">
                    <x-input label="{{ __('Email Institucional') }}" type="email" wire:model="data.email"
                        placeholder="{{ __('Email Institucional') }}" />
                </div>
                {{-- <div class="md:col-span-6">
                    <x-select label="{{ __('Tipo de ligação') }}" 
                        placeholder="{{ __('Tipo de ligação') }}"
                        wire:model.lazy="data.office_id">
                        @if ($offices = \App\Models\Office::all())
                            @foreach ($offices as $office)
                                <x-select.option label="{{ $office->name }}" value="{{ $office->id }}" />
                            @endforeach
                        @endif
                    </x-select>
                </div> --}}
                <div class="md:col-span-3">
                    <x-input label="{{ __('Password') }}" type="password" wire:model="data.password"
                        placeholder="{{ __('Password') }}" />
                </div>

                <div class="md:col-span-3">
                    <x-input label="{{ __('Confirm Password') }}" type="password"
                        wire:model="data.password_confirmation" placeholder="{{ __('Confirm Password') }}" />
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="md:col-span-6">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox wire:model="data.terms" id="terms" />
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif
                <div class="col-span-6 text-right">
                    <div class="inline-flex items-end">
                        <x-button type="submit" spinner="store" positive label="Cadastrar usuário" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
