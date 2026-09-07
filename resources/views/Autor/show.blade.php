
<!DOCTYPE html>
<html>
<head>
    <title>Autor</title>
</head>
<body>

    <h1>{{ $autor->nome }}</h1>

    <p><strong>ID:</strong> {{ $autor->id }}</p>
    <p><strong>Nome:</strong> {{ $autor->nome }}</p>

    <a href="{{ route('autores.edit', $autor) }}">Editar</a>
    <a href="{{ route('autores.index') }}">Voltar</a>

</body>
</html>
