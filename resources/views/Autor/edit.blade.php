
<!DOCTYPE html>
<html>
<head>
    <title>Editar Autor</title>
</head>
<body>

    <h1>Editar Autor</h1>

 
    <form action="{{ route('autores.update', $autor) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label><br>
            <input 
                type="text" 
                name="nome" 
                id="nome" 
                value="{{ old('nome', $autor->nome) }}"
            >
        </div>

        <br>

        <button type="submit">Atualizar</button>
        <a href="{{ route('autores.index') }}">Cancelar</a>

    </form>

</body>
</html>


