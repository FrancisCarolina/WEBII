@extends('templates.main',[
    "title" => "Eixos", "header" => "Tabela de Eixos"])

@section('content')
    <hr>
    @can('create', App\Models\Eixo::class)
        <a href="{{route('eixo.create')}}">Cadastrar</a>
    @endcan
    <hr>

    @can('index', App\Models\Eixo::class)
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
                        @can('show', App\Models\Eixo::class)
                            <a href="{{route('eixo.show', $item->id)}}">Mais info</a>
                        @endcan

                        @can('edit', App\Models\Eixo::class)
                            <a href="{{route('eixo.edit', $item->id)}}">Alterar</a>
                        @endcan

                        @can('destroy', App\Models\Eixo::class)
                            <form method="POST" action="{{route('eixo.destroy', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Remover"/>
                            </form>
                        @endcan

                        <a href="{{route('eixo.report')}}" target="_blank">Relatorio</a>
                        <a href="{{route('eixo.graph')}}">Grafico</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endcan

@endsection