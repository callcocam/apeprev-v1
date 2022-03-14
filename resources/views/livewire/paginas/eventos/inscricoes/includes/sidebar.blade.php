<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
</div>
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-white dark:bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <nav class="flex flex-col mt-10 px-4 text-left">
        @can('create', \App\Models\EventoInscricao::class)
            @if ($model)
                <x-tall-link component="Eventos\Inscricoes\IniciarComponent" :model="$model" />
            @endif
            <x-tall-link component="Eventos\Inscricoes\ApresentacaoComponent" :model="$model" />
        @endcan
        @if ($model->hotel)
            <x-tall-link component="Eventos\Inscricoes\HotelComponent" :model="$model" />
        @endif
        @if ($model->local)
            <x-tall-link component="Eventos\Inscricoes\LocalComponent" :model="$model" />
        @endif
        <x-tall-link component="Eventos\Inscricoes\ProgramacaoComponent" :model="$model" />
        @if ($model->palestras()->count())
            <x-tall-link component="Eventos\Inscricoes\PalestrantesComponent" :model="$model" />
        @endif
        @auth
            @can('create', \App\Models\EventoInscricao::class)
                <x-tall-link component="Eventos\Inscricoes\InscricaoComponent" :model="$model" />
            @endcan
            <x-tall-link component="Eventos\Inscricoes\SegundaViaComponent" :model="$model" />
            <x-tall-link component="Eventos\Inscricoes\ReciboComponent" :model="$model" />
        @endauth
        @if ($model->contatos()->count())
            <x-tall-link component="Eventos\Inscricoes\ContatoComponent" :model="$model" />
        @endif
    </nav>
</div>
