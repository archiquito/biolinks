<x-layout.app>
    <x-container class="h-screen">

        <x-card title="Perfil">
            <x-alert />
            @if($user->photo)
            <div class="avatar flex justify-center items-center w-full">
                <div class="w-24 rounded-full">
                    <img src="storage/photos/{{ ($user->photo) }}" alt="Foto de perfil">
                </div>
            </div>
            @endif
            <x-form :route="route('profile.update')" put id="profile-form" enctype="multipart/form-data">
                <x-input class="file-input text-gray-800" type="file" id="photo" name="photo" value="{{ $user->photo }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="photo">Foto de perfil:</label>
                    </x-slot:label>
                </x-input>

                <x-input class="input text-gray-800" type="text" id="name" name="name" value="{{ $user->name }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="name">Nome:</label>
                    </x-slot:label>
                </x-input>

                <x-textarea class="input text-gray-800" id="resume" name="resume" resume="{{$user->resume}}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="resume">Breve resumo sobre você:</label>
                    </x-slot:label>
                </x-textarea>

                <x-input class="input text-gray-800 validator join-item" type="text" id="handler" name="handler" value="{{ $user->handler }}" placeholder="@usuario">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="handler">biolinks.com.br/</label>

                    </x-slot:label>
                </x-input>

            </x-form>
            <x-slot:actions>
                <a class="btn btn-soft btn-neutral" href="{{ route('dashboard') }}">Voltar</a>
                <x-button class="btn btn-primary" type="submit" form="profile-form">Atualizar</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>
    <div>
        <h1>Perfil</h1>
        @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if($user->photo)
            <div>
                <img src="storage/photos/{{ ($user->photo) }}" alt="Foto de perfil">
            </div>
            @endif
            <div>
                <label for="photo">Foto de perfil</label>
                <input type="file" name="photo" id="photo">
            </div>
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div>
                <label for="resume">Breve resumo sobre você</label>
                <textarea name="resume" id="resume">{{ $user->resume }}</textarea>
            </div>
            <div>
                <label for="handler">biolinks.com.br/</label>
                <input type="text" name="handler" id="handler" placeholder="@usuario" value="{{ $user->handler }}">
                @error('handler')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">Atualizar</button>
            <a href="{{ route('dashboard') }}">Voltar</a>
        </form>
    </div>
</x-layout.app>