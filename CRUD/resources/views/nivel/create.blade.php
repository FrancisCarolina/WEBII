@extends('templates.main',[
    "title" => "Novo Nivel", "header" => "Cadastrar"])

@section('content')

    <hr>

    <a href="{{route('nivel.index')}}">Voltar</a>
    <hr>

    <form action="{{route('nivel.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <input type="text" name="nome" class="form-control"><br>
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>

@endsection