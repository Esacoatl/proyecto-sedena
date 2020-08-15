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

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-left: 2px;
        }

        th {
            text-align: left;
        }

        p {
            margin-top: 5px;
            margin-bottom: 5px;
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

        .big-table {
            font-size: 8px;
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
            <h1><span style="color: #63a537;">Reporte de Tarea del Enlace</span></h1>
            <p><span style="color: #808080;">Salida de impresi&oacute;n la da el sistema. Llenada por el
                    <strong>Enlace</strong></span></p>
            <p><span style="color: #808080;">Enlace: Herramienta para ayudar a hacer funci&oacute;n de reporte (con
                    datos preliminares)</span></p>
            <p><span style="color: #808080;">Llena algunos datos en formulario:</span></p>
            <ul>
                <li><span style="color: #808080;">Encabezado autom&aacute;tico, daos de evento</span></li>
                <li><span style="color: #808080;">Usuario de sede le da permiso de capturar nombre y grado</span></li>
                <li><span style="color: #808080;">Cuadro de control estad&iacute;stico</span></li>
                <li><span style="color: #808080;">Reporte en texto</span></li>
                <li><span style="color: #808080;">Fotograf&iacute;as 3 (grupal y de trabajo)</span></li>
            </ul>
            <h2><span style="color: #99cc00;">Datos generales de Tarea</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Nombre de Tarea</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                        
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Componente</strong></p>
                        </td>
                        <td>
                            <p><strong>Actividad</strong></p>
                        </td>
                        <td>
                            <p><strong>Subactividad </strong></p>
                        </td>
                    </tr>
                    <tr style="color: #808080;">
                        <td>
                        <?php
                        if(isset($resC)) { echo $dataC['descipcion_cmt']; };
                        ?>
                        </td>
                        <td>
                        <?php
                        if(isset($resA)) { echo $dataA['descripcion_act']; };
                        ?>
                        </td>
                        <td>
                        <?php
                        if(isset($resSub)) { echo $dataSub['nombre_sbact']; };
                        ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><span style="color: #808080;">Los siguientes datos est&aacute;n prellenados con tarea asociada a usuario
                    de sede</span></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Fecha o per&iacute;odo de realizaci&oacute;n</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                        
                            <?php
                            if(isset($resT)) 
                            {   
                                echo $dataT['fechain_tarea'];
                                echo $dataT['fechafin_tarea']; 
                            };
                            ?>
                        </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Horario</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                        
                            <?php
                            if(isset($resT)) 
                            {   
                                echo $dataT['horai_tarea'];
                                echo $dataT['horaf_tarea']; 
                            };
                            ?>
                        </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Duraci&oacute;n</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                            
                            <?php
                            if(isset($resT)) { echo $dataT['dura_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Responsable</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                            
                            <?php
                            if(isset($resT)) { echo $dataT['id_usr_usuarios']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Proveedor </strong>(p.ej. instancia educativa)</p>
                        </td>
                        <td style="color: #808080;">
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['prov_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Tipo de tarea</strong> <span style="color: #808080;">(solo se puede seleccionar una)</span></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Capacitaci&oacute;n</p>
                        </td>
                        <td>
                            <p>Difusi&oacute;n</p>
                        </td>
                        <td>
                            <p>Obra de</p>
                        </td>
                    </tr>
                    <tr style="color: #808080;">
                        <td>
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Ubicaci&oacute;n</strong> <strong>de tarea</strong> <span style="color: #808080;">(llenado
                    autom&aacute;ticamente por tarea)</span></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>RM</p>
                        </td>
                        <td>
                            <p>ZM</p>
                        </td>
                        <td>
                            <p>DUO</p>
                        </td>
                        <td>
                            <p>PE</p>
                        </td>
                        <td>
                            <p>CM</p>
                        </td>
                    </tr>
                    <tr style="color: #808080;">
                        <td>
                            <p>                            
                            <?php
                            if(isset($resR)) { echo $dataR['denomina_rm']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resZ)) { echo $dataZ['denomina_zm']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resDPC)) { echo $dataDPC['descrip_dpc']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resDPC)) { echo $dataDPC['descrip_dpc']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resDPC)) { echo $dataDPC['descrip_dpc']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Datos que ingresa Enlace</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Enlace de ejecuci&oacute;n de la sede</strong></p>
                        </td>
                        <td style="color: #808080; background-color: #FFF899;">
                            <p>Elecci&oacute;n de cat&aacute;logo de usuarios</p>
                            <p>O escribe su nombre</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Lugar de realizaci&oacute;n de tarea </strong><span
                                    style="color: #808080;">(sede, auditorio, sala, patio, oficinas, portal,
                                    etc.)</span></p>
                        </td>
                        <td style="color: #808080; background-color: #FFF899;">
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['lugar_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Descripci&oacute;n general de tarea</strong></p>
                        </td>
                        <td style="color: #808080; background-color: #FFF899;">
                            <p>
                            <?php
                            if(isset($resT)) { echo $dataT['lugar_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Control estad&iacute;stico por tarea</span></h2>
            <p><span style="color: #808080;">Solo para tareas de capacitaci&oacute;n</span></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Realizado</strong></p>
                        </td>
                        <td style="color: #808080; background-color: #FFF899;">
                            <p>Si &oacute; No</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Cuadro de control estad&iacute;stico </strong><span style="color: #808080;">(se capturan los
                    n&uacute;meros de participantes)</span></p>
            <table class="big-table">
                <tbody>
                    <tr style="color: #ffff; background-color: #63a537;">
                        <td colspan="8">
                            <p><strong>Generales</strong></p>
                        </td>
                        <td colspan="8">
                            <p><strong>Jefes</strong></p>
                        </td>
                        <td colspan="8">
                            <p><strong>Oficiales</strong></p>
                        </td>
                        <td colspan="6">
                            <p><strong>Tropa</strong></p>
                        </td>
                        <td rowspan="4">
                            <p><strong>Total</strong></p>
                        </td>
                    </tr>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td colspan="8">
                            <p>Secretario, de divisi&oacute;n, de brigada / de ala, brigadier / de grupo</p>
                        </td>
                        <td colspan="8">
                            <p>Coronel, Teniente Coronel y Mayor</p>
                        </td>
                        <td colspan="8">
                            <p>Capit&aacute;n 1/o, Capit&aacute;n 2/o, <br /> Teniente y Subteniente</p>
                        </td>
                        <td colspan="6">
                            <p>Sargento 1/o, Sargento 2/o,<br /> Cabo, Soldado de 1/a y Soldado</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>Hombre</p>
                        </td>
                        <td colspan="4">
                            <p>Mujer</p>
                        </td>
                        <td colspan="4">
                            <p>Hombre</p>
                        </td>
                        <td colspan="4">
                            <p>Mujer</p>
                        </td>
                        <td colspan="4">
                            <p>Hombre</p>
                        </td>
                        <td colspan="4">
                            <p>Mujer</p>
                        </td>
                        <td colspan="3">
                            <p>Hombre</p>
                        </td>
                        <td colspan="3">
                            <p>Mujer</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>61 y m&aacute;s</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>61 y m&aacute;s</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 55 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>51 a 55 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td>
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899;">
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <p>4</p>
                        </td>
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>16</p>
                        </td>
                        <td>
                            <p>20</p>
                        </td>
                        <td>
                            <p>1</p>
                        </td>
                        <td>
                            <p>6</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td style="background-color: #ffac19;">
                            <p><strong>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['total_snt']; };
                            ?>
                            </strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tgeneralh_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="4">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tgeneralm_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="4">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tjefeh_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="4">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tjefem_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="4">
                        <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tofich_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="4">
                        <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['toficm_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="3">
                        <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['ttropah_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="3">
                        <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['ttropam_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="1">
                        <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['total_snt']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <p>                            
                            <?php
                            $suma1 = $dataSin['tgeneralh_snt'] + $dataSin['tgeneralm_snt'];
                            if(isset($resSin)) { echo $suma1; };
                            ?>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>                            
                            <?php
                            $suma2 = $dataSin['tjefeh_snt'] + $dataSin['tjefem_snt'];
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['toto_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="6">
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tottropa_snt']; };
                            ?>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>                            
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Evidencia</span></h2>
            <p><strong>Fotograf&iacute;as: </strong>(trabajo y grupo / productos y alusiva / antes y despu&eacute;s)</p>
            <table style="background-color: #FFF899; color: #808080;">
            <tbody>
                    <tr>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            ?>
                            </p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            ?>
                            </p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            ?>
                            </p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            ?>
                            </p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Documento(s) adjunto(s)</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Acta circunstanciada</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                            if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                            if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Notas adicionales</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                            if(isset($resT)) { echo $dataT['notasa_tarea']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Acta circunstanciada</span></h2>
            <p><span style="color: #808080;">Como salida de impresi&oacute;n para que la llene, imprima, firme, escanee,
                    suba.</span></p>
            <p><span style="color: #808080;">Acta circunstanciada, <span style="color: #ffcc00;">llena a mano &oacute;
                        en formulario para salida de impresi&oacute;n.</span> (preimpresi&oacute;n para llenar,
                    imprimir, escanear y subir)</span></p>
            <p><strong>&nbsp;</strong></p>
            <p><strong>Acta circunstanciada con motivo de la impartici&oacute;n del</strong></p>
            <p><span style="color: #ff0000;"><strong>                            
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </strong></span></p>
            <p><strong>&nbsp;</strong></p>
            <p>En la <span style="color: #ff0000;"><strong>                            
                            <?php
                            if(isset($resT)) { echo $dataT['id_dpc_duo_pe_cm']; };
                            ?>
                            </strong></span> con direcci&oacute;n en <span
                    style="color: #ff0000;"><strong>                            
                            <?php
                            if(isset($resDPC)) { echo $dataDPC['calle_dpc']." ".$dataDPC['num_dpc']." ".$dataDPC['col_dpc']." ".$dataDPC['deleg_dpc']; };
                            ?>
                            </strong></span> siendo las <span
                    style="color: #ff0000;"><strong>
                    <?php
                    echo date('d-m-Y H:i');
                    ?>
                    </strong></span> se levanta la presente Acta en la que
                se hace constar que en cumplimiento al convenio celebrado entre la Secretar&iacute;a de la Defensa
                Nacional (SDN) y la Secretar&iacute;a de Desarrollo Institucional de la UNAM, se llev&oacute; a cabo el
                <span style="color: #ff0000;"><strong>                            
                            <?php
                            if(isset($resT)) { echo $dataT['nombre_tarea']; };
                            ?>
                            </strong></span>
                contemplado en el <strong>Programa de Igualdad entre Mujeres y Hombres SDN 2020</strong>, queda de
                manifiesto que se realiz&oacute; bajo las siguientes observaciones:</p>
            <table>
                <tbody>
                    <tr>
                        <td style="background-color: #000080; color: #fff;"><strong><br /> </strong>
                            <p><strong>Servicios</strong></p>
                        </td>
                        <td>
                            <p><strong>Porcentaje de cumplimiento</strong></p>
                        </td>
                        <td>
                            <p><strong>Observaciones</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Asistencia de un/a instructor/a del Proveedor</p>
                        </td>
                        <td style="color: #808080;">
                            <p>___%</p>
                        </td>
                        <td style="color: #808080;">
                            <p>Txt (200)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Apoyos did&aacute;cticos</p>
                        </td>
                        <td style="color: #808080;">
                            <p>___%</p>
                        </td>
                        <td style="color: #808080;">
                            <p>Txt (200)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Entrega de material que respalda la capacitaci&oacute;n</p>
                        </td>
                        <td style="color: #808080;">
                            <p>___%</p>
                        </td>
                        <td style="color: #808080;">
                            <p>Txt (200)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Banner alusivo al evento</p>
                        </td>
                        <td style="color: #808080;">
                            <p>___%</p>
                        </td>
                        <td style="color: #808080;">
                            <p>Txt (200)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Puntualidad en el inicio y t&eacute;rmino del evento</p>
                        </td>
                        <td style="color: #808080;">
                            <p>___%</p>
                        </td>
                        <td style="color: #808080;">
                            <p>Txt (200)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Comentarios adicionales</p>
                        </td>
                        <td colspan="2" style="color: #808080;">
                            <p>Txt (300)</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Firmas</strong></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Enlace responsable</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>Representante de proveedor</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #ff0000;">
                            <p>&lt;Grado militar&gt; &lt;Nombre de usuario&gt;</p>
                            <p>&lt;Puesto de usuario&gt;</p>
                        </td>
                        <td>
                            <p><strong>Nombre</strong></p>
                            <p><strong>Instructor</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
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