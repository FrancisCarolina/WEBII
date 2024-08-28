@extends('templates.main',[
    "title" => "Mais Informações - Curso", "header" => "Mais Informações - Curso"])

@section('content')
    <hr>

    <a href="{{ route('curso.index') }}">Voltar</a>
    <hr>

    <ul>
        <li><b>ID:</b> {{ $curso->id }}</li>
        <li><b>Nome:</b> {{ $curso->nome }}</li>
        <li><b>Sigla:</b> {{ $curso->sigla }}</li>
        <li><b>Total de Horas:</b> {{ $curso->total_horas }}</li>
        <li><b>Nível:</b> {{ $curso->nivel->nome ?? 'Não definido' }}</li> 
        <li><b>Eixo:</b> {{ $curso->eixo->nome ?? 'Não definido' }}</li> 
        <li><b>Criado em:</b> {{ $curso->created_at }}</li>
        <li><b>Atualizado em:</b> {{ $curso->updated_at }}</li>
    </ul>
@endsection
