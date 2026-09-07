<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Resenha</title>
</head>
<body>
    <h1>Nova Resenha</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
</body>
</html>