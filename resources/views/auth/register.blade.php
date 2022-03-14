<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo class="w-48"/>
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Para facilitar o seu cadastro tenha em mãos o cnpj da instituição que você esta ligado, e selecione o tipa de ligação que você tem com a istituição :)') }}
        </div>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
            </div>


            @if (App\Helpers\LoadActionsHelper::hasSelectInstituitionFeature())
                <div class="mt-4">
                    <x-jet-label for="instituicao_id" value="{{ __('Selecione Um Instituição') }}" />
                    <x-jet-select id="instituicao_id" class="block mt-1 w-full" name="instituicao_id">
                        <option value="">{{ __('Selecione') }}</option>
                        @if ($instituicoes = \App\Models\Instituicao::all())
                            @foreach ($instituicoes as $instituicao)
                                <option value="{{ $instituicao->id }}">{{ $instituicao->name }}-{{ $instituicao->document }}</option>
                            @endforeach
                        @endif
                    </x-jet-select>
                </div>
                <div class="mt-4">
                    <x-jet-label for="office_id" value="{{ __('Topo de ligação') }}" />
                    <x-jet-select id="office_id" class="block mt-1 w-full" name="office_id">
                        <option value="">{{ __('Selecione o cargo') }}</option>
                        @if ($offices = \App\Models\Office::all())
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                            @endforeach
                        @endif
                    </x-jet-select>
                </div>
            @endif

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
