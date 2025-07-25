<div>
    <h1>Editar um link</h1>
    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('link.update', $link->id) }}">
        @csrf
        @method('put')
        <div>
            <label for="url">URL</label>
            <input type="text" id="url" name="url" value="{{ old('url', $link->url) }}" />
            <p>@error('url') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="title">Título</label>
            <input type="text" id="title" name="title" value="{{ old('title', $link->title) }}" />
            <p>@error('title') {{ $message }} @enderror</p>
        </div>
        <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description">{{ old('description', $link->description) }}</textarea>
            <p>@error('description') {{ $message }} @enderror</p>
        </div>
        <button type="submit">Atualizar Link</button>
        <a href="{{ route('dashboard') }}">Voltar ao Dashboard</a>
    </form>
</div>