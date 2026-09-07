<!DOCTYPE html>
<html>
<head>
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>



    <form action="{{ route('livros.update', $livro) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $livro->titulo) }}">
        </div>

        <div>
            <label for="autor">Autor:</label><br>
            <input type="text" name="autor" id="autor" value="{{ old('autor', $livro->autor) }}">
        </div>

        <div>
            <label for="isbn">ISBN:</label><br>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $livro->isbn) }}">
        </div>

        <div>
            <label for="editora">Editora:</label><br>
            <input type="text" name="editora" id="editora" value="{{ old('editora', $livro->editora) }}">
        </div>

        <div>
            <label for="ano_publicacao">Ano de publicação:</label><br>
            <input type="number" name="ano_publicacao" id="ano_publicacao" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}">
        </div>

        <div>
            <label for="sinopse">Sinopse:</label><br>
            <textarea name="sinopse" id="sinopse" rows="4" cols="50">{{ old('sinopse', $livro->sinopse) }}</textarea>
        </div>

        <div>
            <label for="numero_paginas">Número de páginas:</label><br>
            <input type="number" name="numero_paginas" id="numero_paginas" value="{{ old('numero_paginas', $livro->numero_paginas) }}">
        </div>

        <br>
        <button type="submit">Atualizar</button>
        <a href="{{ route('livros.index') }}">Cancelar</a>
    </form>
</body>
</html>