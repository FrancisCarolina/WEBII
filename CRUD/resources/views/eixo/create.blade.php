@extends('templates.main',[
    "title" => "Novo Eixo", "header" => "Cadastrar"])

@section('content')

    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <form action="{{route('eixo.store')}}" method="POST">
        @csrf
        <input type="text" name="nome"><br>
        <textarea name="descricao" id="" cols="15" rows="6"></textarea><br>

        <input type="submit" value="Salvar">
    </form>

@endsection