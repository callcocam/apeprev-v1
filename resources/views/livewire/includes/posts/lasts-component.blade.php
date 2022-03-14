<section class="w-full mx-auto  py-0">
    <h1 class="text-3xl text-center w-full">
        <span class="font-bold">Artigos | Notícias | Pareceres</span>
    </h1>
    <div class="scrollbar-thin overflow-y-scroll">
        @if ($models)
            @foreach ($models as $model)
                @livewire(lv_includes('posts.last'), compact('model'), key($model->id))
            @endforeach
        @endif
    </div>
</section>
