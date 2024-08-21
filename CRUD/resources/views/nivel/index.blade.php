@extends('templates.main',[
    "title" => "Niveis", "header" => "Tabela de Niveis"])

@section('content')
    <hr>
    @can('create', App\Models\Nivel::class)
        <a href="{{route('nivel.create')}}">Cadastrar</a>
    @endcan
    <hr>

    @can('index', App\Models\Nivel::class)
    <table class="table">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>
                        @can('edit', App\Models\Nivel::class)
                            <a href="{{route('nivel.edit', $item->id)}}">Alterar</a>
                        @endcan

                        @can('destroy', App\Models\Nivel::class)
                            <form method="POST" action="{{route('nivel.destroy', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Remover"/>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endcan

@endsection