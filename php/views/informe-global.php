<?php

//include_once '../../_conexion/conexion.php';

    $conn = new mysqli("localhost", "root", "", "mirsdn");                
    if ($conn->connect_error) {
        die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
    }

    //----------------------
    $resT = $conn->query("SELECT * FROM tareas WHERE id_tarea = 1");
    $dataT = $resT->fetch_assoc();

    $resC = $conn->query("SELECT * FROM componentes WHERE id_cmt = 1");
    $dataC = $resC->fetch_assoc();

    $resA = $conn->query("SELECT * FROM actividades WHERE id_act = 1");
    $dataA = $resA->fetch_assoc();

    $resSub = $conn->query("SELECT * FROM subactividades WHERE id_sbact = 1");
    $dataSub = $resSub->fetch_assoc();

    $resR = $conn->query("SELECT * FROM regm WHERE id_rm = 1");
    $dataR = $resR->fetch_assoc();

    $resZ = $conn->query("SELECT * FROM zonam WHERE id_zm = 1");
    $dataZ = $resZ->fetch_assoc();

    $resTT = $conn->query("SELECT descrip_tipt FROM tipos_tar");
    //WHERE id_tipt = 1
    $dataTT = $resTT->fetch_assoc();

    $resDPC = $conn->query("SELECT * FROM duo_pe_cm WHERE id_dpc = 1");
    $dataDPC = $resDPC->fetch_assoc();

    $resAT = $conn->query("SELECT * FROM avc_tar WHERE id_avt = 1");
    $dataAT = $resAT->fetch_assoc();

    $resSin = $conn->query("SELECT * FROM sintesis WHERE id_snt = 1");
    $dataSin = $resSin->fetch_assoc();

    $resET = $conn->query("SELECT * FROM evaluatarea WHERE id_ctar = 1");
    $dataEt = $resET->fetch_assoc();

    $resETar = $conn->query("SELECT * FROM evidencias_tar WHERE id_evi = 1");
    $dataETar = $resETar->fetch_assoc();

    $resSer = $conn->query("SELECT * FROM cuadroserv WHERE id_serv = 1");
    $dataSer = $resSer->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-left: 15px;
        }

        th {
            text-align: left;
        }

        .contenido-doc {
            width: 100%;
            margin: auto;
            /*border: 1px solid #bdbdbd;*/
        }

        .encabezado-pie {
            margin: auto;
        }

        .info-doc {
            padding-left: 1px;
        }
    </style>
</head>

<body>

    <div class="contenido-doc">
        <div class="encabezado-pie">
            <img src="https://i.imgur.com/1nGFSBx.png" alt="" style="width: 700px;">
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="info-doc">
            <h1><span style="color: #63A537;">Informe de MIR</span></h1>
            <p>Datos d MIR</p>
            <h2><span style="color: #99cc00;">Datos generales de MIR</span></h2>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Seguimiento de MIR</span></h2>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Indicadores complementarios</span></h2>
            <p>Indicadores <strong>complementarios de utilidad </strong>de seguimiento <strong>permanente</strong>
                necesarios:</p>
            <ul>
                <li><strong>Quejas y denuncias realizadas. Porcentaje de quejas y denuncias con resoluci&oacute;n
                    </strong>(prop&oacute;sito)</li>
                <li>Personal capacitado (hombres y mujeres). Porcentaje capacitado (m y h) (componente)</li>
                <li>Obras realizadas por RM y ZM (componente)</li>
                <li>Campa&ntilde;as realizadas (componente)</li>
                <li><strong>&Iacute;ndice de igualdad percibido por (hombres y mujeres) </strong>(prop&oacute;sito)</li>
            </ul>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="encabezado-pie">
            <img src="https://i.imgur.com/zRazHrC.png" alt="" style="width: 700px;">
            <p>&nbsp;</p>
        </div>
    </div>
</body>

</html>