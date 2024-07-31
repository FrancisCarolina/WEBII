@extends('templates.main',[
    "title" => "Editar Eixo", "header" => "Editar Eixo"])

@section('content')
    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <form action="{{route('eixo.update', $eixo->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nome" value={{$eixo->nome}}><br>
        <textarea name="descricao" id="" cols="15" rows="6">{{$eixo->descricao}}</textarea><br>

        <input type="submit" value="Editar">
    </form>

@endsection
