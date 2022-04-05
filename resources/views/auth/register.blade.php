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
            @livewire("paginas.auth.register-component", ['data'=>old()])
           
        </form>
    </x-jet-authentication-card>
</x-app-layout>
