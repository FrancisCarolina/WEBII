@extends('templates.main',[
    "title" => "Mais Informações - Eixo", "header" => "Mais Informações - Eixo"])
   
@section('content')
    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <ul>
        <li><b>ID:</b> {{$eixo->id}}</li>
        <li><b>NOME:</b> {{$eixo->nome}}</li>
        <li><b>DESCRICAO:</b> {{$eixo->descricao}}</li>
        <li><b>CRIACAO:</b> {{$eixo->created_at}}</li>
        <li><b>ALTERACAO:</b> {{$eixo->updated_at}}</li>
    </ul>
@endsection
    