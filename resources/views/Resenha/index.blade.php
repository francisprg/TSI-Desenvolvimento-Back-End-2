<!DOCTYPE html>
<html>
<head>
    <title>Resenhas</title>
</head>
<body>
    <h1>Resenhas</h1>

    <a href="{{ route('resenhas.create') }}">Nova Resenha</a>

    <ul>
        @foreach ($resenhas as $resenha)

            
            <li>

                <a href="{{route('resenhas.show', $resenha)}}">{{$resenha->id}}</a>
              
                {{ $resenha->texto }} - {{ $resenha->datapublicacao }}
                <a href="{{ route('resenhas.edit', $resenha) }}">Editar</a>

                <form action="{{ route('resenhas.destroy', $resenha) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>