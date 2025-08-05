<x-layout.app>
    
    <x-container class="h-screen">
       
        <x-card title="login">
            <x-alert />
            <x-form :route="route('login.post')" post id="login-form">

                <x-input class="input text-gray-800" type="email" id="email" name="email" value="{{ old('email') }}">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="email">Email:</label>
                    </x-slot:label>
                </x-input>

                <x-input class="input text-gray-800" type="password" id="password" name="password">
                    <x-slot:label>
                        <label class="fieldset-legend text-slate-50" for="password">Password:</label>
                    </x-slot:label>
                </x-input>
            </x-form>
            <x-slot:actions>
                <a class="btn btn-soft btn-neutral" href="{{ route('register') }}">Criar registro</a>
                <x-button class="btn btn-primary" type="submit" form="login-form">Login</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>
    <!-- <div class="flex justify-center items-center h-screen">
        <div class="card card-border border-gray-500 w-96">
            <div class="card-body">
                <div class="card-title">login</div>
                @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
                <form action="{{ route('login.post') }}" method="POST">

                    @csrf
                    <div>
                        <label class="fieldset-legend text-slate-50" for="email">Email:</label>
                        <input class="input text-gray-800" type="email" id="email" name="email" value="{{ old('email') }}">
                        <p class="label">@error('email') {{ $message }} @enderror</p>
                    </div>
                    <div>
                        <label class="fieldset-legend text-slate-50" for="password">Password:</label>
                        <input class="input text-gray-800" type="password" id="password" name="password">
                        <p class="label">@error('password') {{ $message }} @enderror</p>
                    </div>
                    
                </form>
                <div class="card-actions justify-between pt-6 pr-4">
                        <a class="btn btn-soft btn-neutral" href="{{ route('register') }}">Criar registro</a>
                        <button class="btn  btn-primary" type="submit">Login</button>

                    </div>
            </div>
        </div>
    </div> -->
</x-layout.app>