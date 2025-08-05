<x-layout.app>
    <x-container class="flex flex-col h-full">
        <x-alert />
        @if($user->photo)
        <x-avatar class="pt-5" photo="{{$user->photo}}" />
        @endif
        <h1 class="text-lg font-bold">{{$user->name}}</h1>
        <p>{{$user->resume}}</p>
        <x-card title="Meus Links" class="w-150 mb-4 ">
            @if($links->isEmpty())
            <p>Nenhum link criado ainda.</p>
            @else
            <ul class="flex flex-col justify-center items-center">
                @foreach($links as $link)
                <li class="flex items-center w-full p-2 pb-4 space-x-2">

                    <div class="flex-grow">
                        <div class="tooltip w-full" data-tip="acessar link">
                            <a class="btn btn-primary w-full" href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                        </div>
                        <p>{{ $link->description }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </x-card>
    </x-container>
</x-layout.app>