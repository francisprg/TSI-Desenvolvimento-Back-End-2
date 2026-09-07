<!DOCTYPE html>
<html>
<head>
    <title>Novo Livro</title>
</head>
<body>
    <h1>Novo Livro</h1>


    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        </div>

        <div>
            <label for="autor">Autor:</label><br>
            <input type="text" name="autor" id="autor" value="{{ old('autor') }}">
        </div>

        <div>
            <label for="isbn">ISBN:</label><br>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
        </div>

        <div>
            <label for="editora">Editora:</label><br>
            <input type="text" name="editora" id="editora" value="{{ old('editora') }}">
        </div>

        <div>
            <label for="ano_publicacao">Ano de publicação:</label><br>
            <input type="number" name="ano_publicacao" id="ano_publicacao" value="{{ old('ano_publicacao') }}">
        </div>

        <div>
            <label for="sinopse">Sinopse:</label><br>
            <textarea name="sinopse" id="sinopse" rows="4" cols="50">{{ old('sinopse') }}</textarea>
        </div>

        <div>
            <label for="numero_paginas">Número de páginas:</label><br>
            <input type="number" name="numero_paginas" id="numero_paginas" value="{{ old('numero_paginas') }}">
        </div>

        <br>
        <button type="submit">Salvar</button>
        <a href="{{ route('livros.index') }}">Cancelar</a>
    </form>
</body>
</html>