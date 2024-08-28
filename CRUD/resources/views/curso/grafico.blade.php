@extends('templates.main', [
    "title" => "Gráfico de Cursos por Eixo", "header" => "Gráfico de Cursos por Eixo"
])

@section('content')
    <div class="row">
        <div class="col text-center" id="barra" style="width: 200px; height: 280px;"></div>
    </div>
    <script type="text/javascript">
        var data_graph = <?php echo $data ?>;

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let data = google.visualization.arrayToDataTable(data_graph);

            let options = {
                title: 'Total de Cursos por Eixo',
                colors: ['#1c91c0'],
                legend: { position: 'none' },
                hAxis: {
                    title: 'Eixos',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                },
                vAxis: {
                    title: 'Cursos',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    },                       
                    format: '0',  
                },
            };

            let chart = new google.visualization.BarChart(document.getElementById('barra'));
            chart.draw(data, options);
        }
    </script>
@endsection
