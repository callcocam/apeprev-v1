<div class="flex flex-col">
    <div class="flex flex-col justify-center max-w-6xl mx-auto">
        <div class="relative">
            <img class="hidden sm:block w-full"
                src="{{ $model->cover_url }}"
                alt="{{ $model->cover_url }}" />
            <img class="sm:hidden w-full"
                src="{{ $model->mobile }}"
                alt="{{ $model->mobile }}" />
        </div>
    </div>
</div>