<div>
    <h1>Register</h1>
    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" />
            <p>@error('name') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            <p>@error('email') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="email_confirmation">Confirmar Email</label>
            <input type="email" id="email_confirmation" name="email_confirmation" value="{{ old('email_confirmation') }}">
            <p>@error('email_confirmation') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" />
            <p>@error('password') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" />
            <p>@error('password_confirmation') {{ $message }} @enderror</p>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>