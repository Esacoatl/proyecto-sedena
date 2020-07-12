        // Carga la visualizacion y el paquete
        google.charts.load('current', {
            'packages': ['bar']
        });

        // Una vez cargado hace el llamado a la funcion
        google.charts.setOnLoadCallback(drawChart);

        // Se pasa a la funcion y render de la grafica
        function drawChart() {

            // Crea la grafica a partir de la tabla
            var data = google.visualization.arrayToDataTable([
                ['Actividades', 'Actividades Esperadas', 'Actividades Presentes'],
                ['1', 33, 40],
                ['2', 117, 96],
                ['3', 166, 210],
                ['4', 117, 66],
                ['5', 66, 21],
                ['6', 33, 40],
                ['7', 117, 96],
                ['8', 150, 190],
                ['9', 103, 50],
                ['10', 200, 210]
            ]);

            // Opciones de la grafica
            var options = {
                chart: {
                    title: 'Porcentaje de avance',
                    subtitle: 'Cantidad',
                },
                bars: 'vertical',
                vAxis: {
                    format: 'decimal'
                },
                height: 400,
                width: 1000,
                colors: ['#ffac19', '#63a537']
            };

            // Instancia de la grafica a nivel del html para dibujarla
            var chart = new google.charts.Bar(document.getElementById('chart_div'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }