<div>
    <h1>Perfil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        <button type="submit">Atualizar</button>
    </form>
</div>
