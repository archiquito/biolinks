<div>
    <h1>login</h1>
    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
    <form action="{{ route('login.post') }}" method="POST">

        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  value="{{ old('email') }}">
            <p>@error('email') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >
            <p>@error('password') {{ $message }} @enderror</p>
        </div>
        <button type="submit">Login</button>
        <a href="{{ route('register') }}">Registrar</a>
    </form>
</div>