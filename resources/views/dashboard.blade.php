<div>
    <h1>Dashboard</h1>

    @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif

    <p>{{ auth()->user()->name }}</p>
    <a href="{{ route('logout') }}">Logout</a>
    <a href="{{ route('link.create') }}">Criar Link</a>
    <h2>Meus Links</h2>
    @if($links->isEmpty())
    <p>Nenhum link criado ainda.</p>
    @else
    <ul>
        @foreach($links as $link)
        <li>
            @if(!$loop->first)
            <form method="POST" action="{{ route('link.positionUp', $link->id) }}" style="display:inline;">
                @csrf
                @method('patch')
                <input type="hidden" name="position" value="up">
                <button type="submit">⬆️</button>
            </form>
            @endif
            @if(!$loop->last)
            <form method="POST" action="{{ route('link.positionDown', $link->id) }}" style="display:inline;">
                @csrf
                @method('patch')
                <input type="hidden" name="position" value="down">
                <button type="submit">⬇️</button>
            </form>
            @endif
            <a href="{{ $link->url }}" target="_blank">{{ $link->id }}::{{ $link->title }}</a>
            <p>{{ $link->description }}</p>
            <a href="{{ route('link.edit', $link->id) }}">Editar</a>
            <form onsubmit="return confirm('Tem certeza que deseja excluir este link?');" method="POST" action="{{ route('link.destroy', $link->id) }}" style="display:inline;">
                @csrf
                @method('delete')
                <button type="submit">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif
</div>