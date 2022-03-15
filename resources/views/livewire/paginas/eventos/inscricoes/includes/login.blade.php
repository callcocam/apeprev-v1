<div class="flex flex-col sm:justify-center items-center ">
    <div class=" flex flex-col sm:justify-center items-center sm:rounded-lg w-full">
        <div class="w-full px-6 overflow-hidden items-center justify-center pb-20">
            <div class="mb-4 text-lg text-gray-800 text-left rounded-md p-3 space-y-2">
                <h2 class="font-semibold">Muito bem, antes de começar, vamos precisar de algumas informações.</h2>
                <p>Primeiro você deve fornecer seu dados de acesso, se você ainda não é cadastrado, você pode fazer o
                    seu cadastro <a class="font-bold text-blue-500" href="{{ route('register') }}?redirect={{ route(\Route::currentRouteName(), $model) }}">AQUI</a>.</p>
                <p>lembrando que para fazer inscrição você precisa de permissão da instituição que você esta ligado:)
                </p>
            </div>
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}"
                class="max-w-xl mx-auto shadow-lg px-8  pb-6 border-2 rounded-lg bg-white">
                <h5 class="w-full text-2xl font-semibold mb-3 pt-5 pb-3 pl-3 flex items-center h-12 justify-center"><span>Iniciar sessão</span></h5>
                @csrf
                <input type="hidden" name="redirect" value="{{ route(\Route::currentRouteName(), $model) }}">
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
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
            </form>
        </div>
    </div>
    {{-- <x-slot name="divider">
        <x-divider-content fill="text-gray-700" bg="bg-gray-100" />
    </x-slot> --}}
</div>
