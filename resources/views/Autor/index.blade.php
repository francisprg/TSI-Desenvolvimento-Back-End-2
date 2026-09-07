
<!DOCTYPE html>
<html>
<head>
    <title>Autores</title>
</head>
<body>
    <h1>Autores</h1>

    <a href="{{ route('home') }}">Home</a>

    <a href="{{ route('autores.create') }}">Novo Autor</a>

    <ul>
        @foreach ($autores as $autor)
            <li>
                <a href="{{ route('autores.show', $autor) }}">
                    {{ $autor->id }}
                </a>

                {{ $autor->nome }}

                <a href="{{ route('autores.edit', $autor) }}">
                    Editar
                </a>

                <form action="{{ route('autores.destroy', $autor) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>

