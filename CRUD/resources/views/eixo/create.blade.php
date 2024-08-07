@extends('templates.main',[
    "title" => "Novo Eixo", "header" => "Cadastrar"])

@section('content')

    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <form action="{{route('eixo.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="text" name="nome" class="form-control"><br>
        <textarea name="descricao" id="" cols="15" rows="6" class="form-control"></textarea><br>
        <input type="file" id="documento" name="documento" class="form-control">
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>

@endsection