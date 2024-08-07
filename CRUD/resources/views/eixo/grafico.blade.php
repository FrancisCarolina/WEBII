@extends('templates.main',[
    "title" => "Grafico Eixo", "header" => "Grafico Eixo"])

@section('content')
    <div class="row">
        <div class="col text-center" id="barra" style="width: 420px; height: 280px;"></div>
    </div>
    <script type="text/javascript">
        var data_graph = <?php echo $data ?>;

        google.charts.load('current', {'packages':['corechart']})
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            let data = google.visualization.arrayToDataTable(data_graph);

            options = {
                title: 'TOTAL DE HORAS DOS ALUNOS',
                colors: ['#198754'],
                legend: 'none',
                hAxis: {
                    title: 'Horas Validadas',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                },
                vAxis: {},
            };

            chart = new google.visualization.BarChart(document.getElementById('barra'));
            chart.draw(data, options);
        }
    </script>
@endsection