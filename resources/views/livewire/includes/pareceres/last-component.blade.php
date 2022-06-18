<div class="w-full bg-white rounded-lg overflow-hidden  flex flex-row h-auto drop-shadow-md">
    <div class="w-full text-left p-4 md:py-3 ">
        <a href="{{ route('associados.parecer.show', $model) }}" class="text-md text-blue-700 font-bold">{{ $model->name }}</a>
        @if ($model->user)
            {{-- <p class="text-gray-400 font-normal text-sm">{{ $model->user->name }}</p> --}}
        @endif
        <p class="text-base leading-none mb-1 text-gray-500 font-normal">
            @if ($model->description)
            {{ $model->description->preview }}
            @endif
            <a href="{{ route('associados.parecer.show', $model) }}" class="text-md text-blue-500 text-xs">ver mais...</a>
        </p>
    </div>
</div>
