<!DOCTYPE html>
<html>

<head>
    <title>Livro</title>
</head>

<body>
    <h1>{{ $livro->titulo }}</h1>

    <p><strong>Autor:</strong> {{ $livro->autor->nome }}</p>
    <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
    <p><strong>Editora:</strong> {{ $livro->editora }}</p>
    <p><strong>Ano de publicação:</strong> {{ $livro->ano_publicacao }}</p>
    <p><strong>Número de páginas:</strong> {{ $livro->numero_paginas }}</p>
    <p><strong>Sinopse:</strong> {{ $livro->sinopse }}</p>

    <a href="{{ route('livros.edit', $livro) }}">Editar</a>
    <a href="{{ route('livros.index') }}">Voltar</a>


    <h2>Criar resenha</h2>

    <form action="{{ route('resenhas.store') }}" method="POST">
        @csrf

        <div>
            <label for="texto">Texto da resenha:</label><br>
            <textarea name="texto" id="texto" rows="6" cols="50">{{ old('texto') }}</textarea>
        </div>

        <div>
            <label for="datapublicacao">Data de publicação:</label><br>
            <input type="date" name="datapublicacao" id="datapublicacao" value="{{ old('datapublicacao') }}">
        </div>

        <br>
        <button type="submit">Salvar</button>
        <a href="{{ route('resenhas.index') }}">Cancelar</a>
    </form>


    <h2>Resenhas</h2>

    @if ($livro->resenhas->isEmpty())
        <p>Nao ha nenhuma resenha ate o momento </p>
    @else
        @foreach ($livro->resenhas as $resenha)
            <p><strong>Texto:</strong> {{ $resenha->texto }}</p>
            <p><strong>Data de publicação:</strong> {{ $resenha->datapublicacao }}</p>
        @endforeach
    @endif



</body>

</html>
