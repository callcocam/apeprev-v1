<form wire:submit.prevent="store">
    @csrf
    @if ($redirect = request()->query('redirect'))
        <input type="hidden" name="redirect" value="{{ $redirect }}">
    @endif
    @if (App\Helpers\LoadActionsHelper::hasSelectInstituitionFeature())
        <fieldset class="p-2 mt-2 border border-2 rounded">
            <legend>{{ __('DADOS DA INSTITUIÇÃO') }}</legend>
            <div class="mt-4">
                <x-select label="{{ __('Selecione Um Instituição') }}" autofocus
                    placeholder="{{ __('Selecione Um Instituição') }}" wire:model="data.instituicao_id">
                    <x-select.user-option img="{{ asset('img/icon-plus-icon.jpg') }}"
                        label="{{ __('CADASTRAR NOVA') }}" value="1" />
                    @if ($instituicoes = \App\Models\Instituicao::all())
                        @foreach ($instituicoes as $instituicao)
                            <x-select.option label="{{ $instituicao->name }}-{{ $instituicao->document }}"
                                value="{{ $instituicao->id }}" />
                        @endforeach
                    @endif
                </x-select>
            </div>
            <div class="mt-4">
                <x-input label="{{ __('Nome da instituição') }}" wire:model.defer="data.intituition_name"
                    placeholder="{{ __('Nome da instituição') }}" />
            </div>
            <div class="mt-4">
                <x-tall-document-maskable-input label="{{ __('CNPJ da instituição') }}"
                    wire:model.lazy="data.document" placeholder="{{ __('CNPJ da instituição') }}" />
            </div>

            <div class="mt-4">
                <x-select label="{{ __('Tipo de ligação') }}" placeholder="{{ __('Tipo de ligação') }}"
                    wire:model.lazy="data.office_id">
                    @if ($offices = \App\Models\Office::all())
                        @foreach ($offices as $office)
                            <x-select.option label="{{ $office->name }}" value="{{ $office->id }}" />
                        @endforeach
                    @endif
                </x-select>
            </div>
        </fieldset>
    @endif
    <fieldset class="p-2 mt-2 border border-2 rounded">
        <legend>{{ __('DADOS DO USUÁRIO') }}</legend>
        <div>
            <x-input label="{{ __('Name') }}" wire:model="data.name" placeholder="{{ __('Name') }}"
                autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-input label="{{ __('Email') }}" type="email" wire:model="data.email"
                placeholder="{{ __('Email') }}" />
        </div>

        <div class="mt-4">
            <x-input label="{{ __('Password') }}" type="password" wire:model="data.password"
                placeholder="{{ __('Password') }}" />
        </div>

        <div class="mt-4">
            <x-input label="{{ __('Confirm Password') }}" type="password" wire:model="data.password_confirmation"
                placeholder="{{ __('Confirm Password') }}" />
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
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
    </fieldset>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-jet-button class="ml-4">
            {{ __('Register') }}
        </x-jet-button>
    </div>
</form>
