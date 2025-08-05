<x-layout.app>
     <x-container class="h-screen">
       
        <x-card title="Registrar novo login">
            <x-alert />
            <x-form :route="route('register.post')" post id="register-form">
                <x-input class="input text-gray-800" type="text" id="name" name="name" value="{{ old('name') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Nome:</label>
                    </x-slot:label>
                </x-input>

                <x-input class="input text-gray-800" type="email" id="email" name="email" value="{{ old('email') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Email:</label>
                    </x-slot:label>
                </x-input>
                <x-input class="input text-gray-800" type="email" id="email_confirmation" name="email_confirmation">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Confirmar e-mail:</label>
                    </x-slot:label>
                </x-input>
                <x-input class="input text-gray-800" type="password" id="password" name="password">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="password">Senha:</label>
                    </x-slot:label>
                </x-input>
                <x-input class="input text-gray-800" type="password" id="password_confirmation" name="password_confirmation">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="password_confirmation">Confirmar Senha:</label>
                    </x-slot:label>
                </x-input>
            </x-form>
            <x-slot:actions>
                <a class="btn btn-soft btn-neutral" href="{{ route('login') }}">Voltar</a>
                <x-button class="btn btn-primary" type="submit" form="register-form">Registrar</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>
</x-layout.app>