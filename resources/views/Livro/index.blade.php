<!DOCTYPE html>
<html>
<head>
    <title>Livros</title>
</head>
<body>
    <h1>Livros</h1>

    <a href="{{ route('livros.create') }}">Novo Livro</a>

    <ul>
        @foreach ($livros as $livro)
            <li>
                <a href="{{route('livros.show', $livro)}}">{{$livro->id}}</a>
                {{ $livro->titulo }} - {{ $livro->autor }}
                <a href="{{ route('livros.edit', $livro) }}">Editar</a>

                <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>