@extends('templates.main',[
    "title" => "Cursos", "header" => "Tabela de Cursos"])

@section('content')
    <hr>
    @can('create', App\Models\Curso::class)
        <a href="{{route('curso.create')}}">Cadastrar</a>
    @endcan
    <hr>

    @can('index', App\Models\Curso::class)
    <a href="{{route('curso.report')}}" target="_blank">Relatorio de Cursos</a>
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
                        @can('show', App\Models\Eixo::class)
                            <a href="{{route('curso.show', $item->id)}}">Mais info</a>
                        @endcan

                        @can('edit', App\Models\Curso::class)
                            <a href="{{route('curso.edit', $item->id)}}">Alterar</a>
                        @endcan

                        @can('destroy', App\Models\Curso::class)
                            <form method="POST" action="{{route('curso.destroy', $item->id)}}">
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