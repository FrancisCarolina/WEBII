@extends('templates.main', [
    "title" => "Editar Curso", "header" => "Editar Curso"
])

@section('content')
    <hr>

    <a href="{{ route('curso.index') }}">Voltar</a>
    <hr>

    <form action="{{ route('curso.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ $curso->nome }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sigla">Sigla</label>
            <input type="text" id="sigla" name="sigla" value="{{ $curso->sigla }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_horas">Total de Horas</label>
            <input type="number" id="total_horas" name="total_horas" value="{{ $curso->total_horas}}" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="nivel">Nível</label>
            <select id="nivel" name="nivel" class="form-control" required>
                <option value="">Selecione um nível</option>
                @foreach($niveis as $nivel)
                    <option value="{{ $nivel->id }}" {{ $curso->nivel_id == $nivel->id ? 'selected' : '' }}>
                        {{ $nivel->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="eixo">Eixo</label>
            <select id="eixo" name="eixo" class="form-control" required>
                <option value="">Selecione um eixo</option>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}" {{ $curso->eixo_id == $eixo->id ? 'selected' : '' }}>
                        {{ $eixo->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Editar" class="btn btn-primary mt-2">
    </form>

@endsection
