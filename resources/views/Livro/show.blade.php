<!DOCTYPE html>
<html>
<head>
    <title>Livro</title>
</head>
<body>
    <h1>{{ $livro->titulo }}</h1>

    <p><strong>Autor:</strong> {{ $livro->autor }}</p>
    <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
    <p><strong>Editora:</strong> {{ $livro->editora }}</p>
    <p><strong>Ano de publicação:</strong> {{ $livro->ano_publicacao }}</p>
    <p><strong>Número de páginas:</strong> {{ $livro->numero_paginas }}</p>
    <p><strong>Sinopse:</strong> {{ $livro->sinopse }}</p>

    <a href="{{ route('livros.edit', $livro) }}">Editar</a>
    <a href="{{ route('livros.index') }}">Voltar</a>
</body>
</html>