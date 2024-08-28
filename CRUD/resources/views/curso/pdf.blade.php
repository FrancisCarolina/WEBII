<h1>Relatório de Cursos</h1>
<hr>

@foreach ($cursosPorEixo as $eixo => $cursos)
    <h2>Eixo: {{ $eixo }}</h2>
    <ul>
        @foreach ($cursos as $curso)
            <li>{{ $curso->nome }}</li>
        @endforeach
    </ul>
    <hr>
@endforeach
