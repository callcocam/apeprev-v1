<div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600 lg:col-span-1">
            <p class="font-medium text-lg">Muito bem, antes de começar, vamos precisar de algumas informações.</p>
            <p>Primeiro você deve fornecer seus dados de acesso</p>
        </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}?redirect={{ route(\Route::currentRouteName(), $model) }}"
            class="lg:col-span-2">
            <h5 class="w-full text-2xl font-semibold mb-3 pt-5 pb-3 pl-3 flex items-center h-12 justify-center">
                <span>Iniciar sessão</span>
            </h5>
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                @csrf
                <input type="hidden" name="redirect" value="{{ route(\Route::currentRouteName(), $model) }}">
                <div class="md:col-span-3">
                    <x-jet-label for="email" value="{{ __('Email\Cnpj') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $model->document)" />
                </div>
                <div class="md:col-span-3">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="col-span-6 mt-4">
                    <div class="flex justify-between items-center">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Esqueçeu sua senha?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4">
                            {{ __('Iniciar a(s) inscrição') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
