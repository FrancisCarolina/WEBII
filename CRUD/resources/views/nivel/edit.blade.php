@extends('templates.main',[
    "title" => "Editar Nivel", "header" => "Editar Nivel"])

@section('content')
    <hr>

    <a href="{{route('nivel.index')}}">Voltar</a>
    <hr>

    <form action="{{route('nivel.update', $nivel->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nome" value={{$nivel->nome}}><br>

        <input type="submit" value="Editar">
    </form>

@endsection
