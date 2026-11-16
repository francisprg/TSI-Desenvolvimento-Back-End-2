
<!DOCTYPE html>
<html>
<head>
    <title>Livros</title>
</head>
<body>
    <h1>Livros</h1>

    <a href="{{ route('home') }}">Home</a>

    <a href="{{ route('livros.create') }}">Novo Livro</a>

    <ul>
        @foreach ($livros as $livro)
        <br>
            <li>
                <a href="{{ route('livros.show', $livro) }}">
                    {{ $livro->id }}
                </a>

                {{ $livro->titulo }} -

                <a href="{{route('autores.show', $livro->autor )}}">
                {{ $livro->autor?->nome ?? 'Autor não informado' }}
                </a>
                <br>
                <a href="{{ route('livros.edit', $livro) }}">
                    <button>Editar</button>
                </a>

                <form
                    action="{{ route('livros.destroy', $livro) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
