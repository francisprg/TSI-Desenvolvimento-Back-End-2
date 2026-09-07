
<!DOCTYPE html>
<html>
<head>
    <title>Novo Autor</title>
</head>
<body>

    <h1>Novo Autor</h1>

  =

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label><br>
            <input 
                type="text" 
                name="nome" 
                id="nome" 
                value="{{ old('nome') }}"
            >
        </div>

        <br>

        <button type="submit">Salvar</button>

        <a href="{{ route('autores.index') }}">Cancelar</a>
    </form>

</body>
</html>

