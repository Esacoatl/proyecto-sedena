
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/1b309eecc2.js"></script>
    <!----estilos del index---->
    <link rel="stylesheet" href="./css/styles.css">


    <!-------------------------------------Google charts-------------------------------------------->
    <!--Carga AJAX API de google charts-->
    <script type="text/javascript" src="./js/google-charts-loader.js"></script>
    <!--Grafica Ejemplo---------------------->
    <script type="text/javascript">
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
                 //Arreglo ejemplo recibido
                ['1', 33, 40],
                ['2', 117, 96],
                ['3', 166, 210],
                ['4', 117, 66],
                ['5', 66, 21],
                ['6', 33, 40],
                ['7', 117, 96],
                ['8', 150, 190]
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
</script>
    <!---------------------------------------------------------------------------------------------->


    <title>Demo SEDENA</title>
</head>

<body>
    <div class="exports-demo">
        <p class="titulo-exports">Informes y Reportes, SEDENA (DomPdf)</p>
        <a href="./pdf/crear-global.php" class="btn btn-outline-success"><i
                class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Informe
            Global</a>&nbsp;&nbsp;
        <a href="./pdf/crear-responsable.php" class="btn btn-outline-success"><i
                class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Informe Responsable</a>&nbsp;&nbsp;
        <a href="./pdf/crear-titular.php" class="btn btn-outline-success"><i
                class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Informe
            Titular</a>&nbsp;&nbsp;
        <a href="./pdf/crear-enlace.php" class="btn btn-outline-success"><i
                class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Reporte
            Enlace</a>&nbsp;&nbsp;
        <a href="./pdf/crear-proveedor.php" class="btn btn-outline-success"><i
                class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Reporte Proveedor</a>
    </div>
    <div class="graficas-demo">
        <p class="titulo-charts">Demo Graficas, SEDENA (Google Charts con mySQL)</p>
        <form>
            <div class="form-group row forms-charts">
                <div class="col-sm-3">
                    <label for="val1">Tipo:</label>
                    <select class="form-control">
                        <option>Tipo 1</option>
                        <option>Tipo 2</option>
                        <option>Tipo 3</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <select class="form-control">
                        <option>Nombre 1</option>
                        <option>Nombre 2</option>
                        <option>Nombre 3</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="exampleInputEmail1">Indicador:</label>
                    <select class="form-control">
                        <option>Indicador 1</option>
                        <option>Indicador 2</option>
                        <option>Indicador 3</option>
                    </select>
                </div>
                <div class="col-sm-1 btn-search">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </div>
            </div>
            <br>
            <div class="chart-draw">
                <div id="chart_div"></div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>