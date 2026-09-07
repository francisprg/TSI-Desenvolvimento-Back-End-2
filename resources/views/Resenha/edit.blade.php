<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="{{ route('resenhas.update', $resenha) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="texto">Texto da resenha:</label><br>
            <textarea name="texto" id="texto" rows="6" cols="50">{{ old('texto', $resenha->texto) }}</textarea>
        </div>

        <div>
            <label for="datapublicacao">Data de publicação:</label><br>
            <input type="date" name="datapublicacao" id="datapublicacao"
                value="{{ old('datapublicacao', $resenha->datapublicacao) }}">
        </div>

        <br>
        <button type="submit">Atualizar</button>
        <a href="{{ route('resenhas.index') }}">Cancelar</a>
    </form>


    </form>




</body>

</html>
