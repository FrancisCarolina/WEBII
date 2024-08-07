@extends('templates.main',[
    "title" => "Eixos", "header" => "Tabela de Eixos"])

@section('content')
    <hr>

    <a href="{{route('eixo.create')}}">Cadastrar</a>
    <hr>

    <table class="table">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>ARQUIVO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->descricao}}</td>
                    <td><a href="{{asset('storage')."/".$item->url}}" target="_blank">Arquivo</a></td>
                    <td>
                        <a href="{{route('eixo.show', $item->id)}}">Mais info</a>
                        <a href="{{route('eixo.edit', $item->id)}}">Alterar</a>
                        <form method="POST" action="{{route('eixo.destroy', $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remover"/>
                        </form>

                        <a href="{{route('report')}}">Relatorio</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection