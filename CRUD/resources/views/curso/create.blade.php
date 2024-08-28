@extends('templates.main',[
    "title" => "Novo Curso", "header" => "Cadastrar"])

@section('content')

    <hr>

    <a href="{{ route('curso.index') }}">Voltar</a>
    <hr>

    <form action="{{ route('curso.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sigla">Sigla</label>
            <input type="text" id="sigla" name="sigla" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_horas">Total de Horas</label>
            <input type="number" id="total_horas" name="total_horas" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="nivel">Nível</label>
            <select id="nivel" name="nivel" class="form-control" required>
                <option value="">Selecione um nível</option>
                @foreach($niveis as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <label for="eixo">Eixo</label>
            <select id="eixo" name="eixo" class="form-control" required>
                <option value="">Selecione um eixo</option>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}">{{ $eixo->nome }}</option>
                @endforeach
            </select>
        </div>

    
        <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>

@endsection
