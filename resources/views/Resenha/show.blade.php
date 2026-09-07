<!DOCTYPE html>
<html>
<head>
    <title>Resenha</title>
</head>
<body>
    <h1>Resenha</h1>

    <p><strong>Texto:</strong> {{ $resenha->texto }}</p>
    <p><strong>Data de publicação:</strong> {{ $resenha->datapublicacao }}</p>

    <a href="{{ route('resenhas.edit', $resenha) }}">Editar</a>
    <a href="{{ route('resenhas.index') }}">Voltar</a>
</body>
</html>