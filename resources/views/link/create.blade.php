<x-layout.app>
     <x-container class="h-screen">
       
        <x-card title="Criar um link">
            <x-alert />
            <x-form :route="route('link.store')" post id="linkstore-form">
                <x-input class="input text-gray-800" type="text" id="url" name="url" value="{{ old('url') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">URL:</label>
                    </x-slot:label>
                </x-input>

                <x-input class="input text-gray-800" type="text" id="title" name="title" value="{{ old('title') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Título:</label>
                    </x-slot:label>
                </x-input>
                <x-input class="input text-gray-800" type="text" id="description" name="description" value="{{ old('description') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Descrição:</label>
                    </x-slot:label>
                </x-input>
            </x-form>
            <x-slot:actions>
                <a class="btn btn-soft btn-neutral" href="{{ route('login') }}">Voltar ao Dashboard</a>
                <x-button class="btn btn-primary" type="submit" form="linkstore-form">Criar Link</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>
</x-layout.app>
