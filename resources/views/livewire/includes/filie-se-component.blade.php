<div class="flex md:h-72 relative bg-blue-100  rounded-sm">
    <x-content>
        <div class="flex items-center justify-center max-w-4xl">
            <div class="mt-4">
                <img class="bg-cover" src="{{ asset('img/filie-se2.png') }}" alt="Filia-se" />
            </div>
            <div class="lg:px-10 sm:px-5 flex flex-col items-end">
                <h1 class="text-gray-800 font-bold text-2xl my-2">Associe-se à APEPREV</h1>
                <p class="text-gray-700 mb-2 md:mb-6">Faça já sua pré-filiação e tenha benefícios exclusivos!....</p>
                <div class="flex-1 justify-between">
                    @if (Route::has('associados.recadastre-se'))
                        <a href="{{ route('associados.recadastre-se') }}"
                            class="block mb-2 text-gray-100 font-bold bg-blue-800 rounded-lg px-4 py-2">Filiar-me</a>
                    @endif
                </div>
            </div>
        </div>
    </x-content>
</div>
