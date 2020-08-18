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

    $resG = $conn->query("SELECT * FROM grados WHERE id_g = 1");
    $dataG = $resG->fetch_assoc();

    $resU = $conn->query("SELECT * FROM usuarios WHERE id_usr = 1");
    $dataU = $resU->fetch_assoc();
?>

<?php
                    /* como deberia dejar la conexion para que solo fuera llamada una vez?

                        $db= new mysqli('localhost', 'root', '', 'mirsdn') or die("No se pudo conectar");

                        $sql ="SELECT nombre_tarea FROM tareas WHERE id_tarea = 1";
                    
                        $result = $db->query($sql) or die("Consulta fallida: ".mysql_error());

                        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                            echo "\t<tr  style='color: #808080;'>\n";
                            foreach ($line as $col_value) {
                                echo "\t\t<td>$col_value</td>\n";
                            }
                            echo "\t</tr>\n";
                        }*/
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
            <h1><span style="color: #63A537;">Reporte de Tarea del Proveedor</span></h1>
            <p><span style="color: #808080;">Salida de impresi&oacute;n o archivo pdf la da el sistema. Llenada por el
                    <strong>Proveedor</strong></span></p>
            <p><span style="color: #808080;">Proveedor lo entrega impreso o en pdf, pero no captura en el sistema
                    directamente</span></p>
            <h2><span style="background-color: #ffffff; color: #99cc00;">Datos generales de Tarea</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Nombre de Tarea</strong></p>
                        </td>
                        <td style='color: #808080;'>
                        <?php
                        if(isset($resT)) { echo $dataT['nombre_tarea']; };
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
                            <p><strong>Componente</strong></p>
                        </td>
                        <td>
                            <p><strong>Actividad</strong></p>
                        </td>
                        <td>
                            <p><strong>Subactividad</strong></p>
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
            <p><span style="color: #808080;">Los siguientes datos est&aacute;n prellenados con tarea asociada a
                    Proveedor</span></p>
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
                                echo $dataT['fechafin_tarea']; 
                            };
                            ?>
                            </p>
                            <p>                        
                            <?php
                            if(isset($resT)) 
                            {   
                                echo $dataT['fechain_tarea'];
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
                        <?php
                        if(isset($resT)) 
                        {   
                            echo $dataT['horai_tarea'];
                            echo $dataT['horaf_tarea']; 
                        };
                        ?>
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
            <p><strong>Tipo de tarea</strong></p>
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
                    <?php
                    /*while ($line = mysql_fetch_array($resTT, MYSQL_ASSOC)) {
                        echo "\t<tr  style='color: #808080;'>\n";
                        foreach ($line['descrip_tipt'] as $col_value) {
                                echo "\t\t<td>$col_value</td>\n";
                        }
                        echo "\t</tr>\n";
                    }*/
                    ?>
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
            <p><strong>Ubicaci&oacute;n</strong> <strong>de tarea</strong></p>
            <?php 
            /*$idDCP = $dataT['id_dpc_duo_pe_cm'];
            
            if (count($dataTT) > 0): ?>
            <table>
            <thead>
                <tr>
                <th><?php echo implode('</th><th>', array_keys(current($dataTT))); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($shop as $row): array_map('htmlentities', $row); ?>
                <tr>
                <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; */?>
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
            <h2><span style="color: #99cc00;">Datos que ingresa Proveedor</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Lugar de realizaci&oacute;n de tarea </strong><span
                                    style="color: #808080;">(sede, auditorio, sala, patio, oficinas, portal,
                                    etc.)</span></p>
                        </td>
                        <td style="color: #808080;">
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
                        <td style="color: #808080;">
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
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Control estad&iacute;stico por tarea</span></h2>
            <p><span style="color: #808080;"><strong>Cuadro de control estad&iacute;stico </strong>(se capturan los
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
            <p><strong>&nbsp;</strong></p>
            <p>&nbsp;</p>
            <p><strong>Tabla de s&iacute;ntesis de participantes <span style="color: #808080;">(</span></strong><span
                    style="color: #808080;">Se genera con los datos capturados)</span></p>
            <table>
                <tbody>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td>
                            <p>Rango</p>
                        </td>
                        <td>
                            <p>Total</p>
                        </td>
                        <td>
                            <p>Porcentaje</p>
                        </td>
                        <td>
                            <p>Mujeres</p>
                        </td>
                        <td>
                            <p>Porcentaje</p>
                        </td>
                        <td>
                            <p>Hombres</p>
                        </td>
                        <td>
                            <p>Porcentaje</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #63a537;">
                            <p>Generales</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['totgrales_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            $suma3 = ($dataSin['totgrales_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tgeneralm_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma4 = ($dataSin['tgeneralm_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tgeneralh_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma5 = ($dataSin['tgeneralh_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #63a537;">
                            <p>Jefes</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['totj_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            $suma6 = ($dataSin['totj_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tjefem_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma7 = ($dataSin['tjefem_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tjefeh_snt ']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma8 = ($dataSin['tjefeh_snt '] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #63a537;">
                            <p>Oficiales</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['toto_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            $suma9 = ($dataSin['toto_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['toficm_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma10 = ($dataSin['toficm_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tofich _snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma11 = ($dataSin['tofich _snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #63a537;">
                            <p>Tropa</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['tottropa_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            $suma12 = ($dataSin['tottropa_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['ttropam_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma13 = ($dataSin['ttropam_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['ttropah_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma14 = ($dataSin['ttropah_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #63a537;">
                            <p><strong>Total</strong></p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSin)) { echo $dataSin['total_snt']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            $suma12 = ($dataSin['total_snt'] / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                $suma012 = $dataSin['tgeneralm_snt'] + $dataSin['tjefem_snt'] + $dataSin['toficm_snt'] + $dataSin['ttropam_snt'];
                                if(isset($resSin)) { echo $suma012; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma13 = ($suma012 / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                $suma013 = $dataSin['tgeneralh_snt'] + $dataSin['tjefeh_snt'] + $dataSin['tofich_snt'] + $dataSin['ttropah_snt'];
                                if(isset($resSin)) { echo $suma013; };
                            ?>
                            </p>
                        </td>
                        <td>
                        <p>                            
                            <?php
                            $suma14 = ($suma013 / $dataSin['total_snt']) * 100 ;
                            if(isset($resSin)) { echo $suma2; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Evaluaci&oacute;n de tarea (encuesta de satisfacci&oacute;n)</span></h2>
            <p><strong>Participantes</strong></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Inscritos</p>
                        </td>
                        <td>
                            <p>Aprobados</p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899; color: #808080;">
                        <td>
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['inscrit_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['aprob_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Evaluaci&oacute;n de tarea</strong></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Instrucci&oacute;n</p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['ev_instr_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Contenidos</p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['ev_cont_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Materiales</p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['ev_mat_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Espacio</p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['ev_esp_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Calificaci&oacute;n final</p>
                        </td>
                        <td style="background-color: #ffac19; color: #808080;">
                            <p>
                            <?php
                            if(isset($resETar)) { echo $dataETar['ev_prom_ctar']; };
                            ?>
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
                    </strong></span>, se levanta la presente Acta en la que
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
                    <tr style="background-color: #000080; color: #ffff;">
                        <td><strong><br /> </strong>
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
                            <p></p>
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
                            <p></p>
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
                            <p></p>
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
                            <p></p>
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
                            <p></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Comentarios adicionales</p>
                        </td>
                        <td colspan="2" style="color: #808080;">
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
            <p><strong>Firmas</strong></p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p>Enlace responsable</p>
                        </td>
                        <td>
                            <p>Representante de proveedor</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #ff0000;">
                        <p>                            
                            <?php
                            if(isset($resG)) { echo $dataG['descripcion_g']; };
                            ?>
                        </p>
                        <p>                            
                            <?php
                            if(isset($resU)) { echo $dataU['nombre_usr']; };
                            if(isset($resU)) { echo $dataU['primerapell_usr']; };
                            if(isset($resU)) { echo $dataU['segundoapell_usr']; };
                            ?>
                        </p>
                        <p>                            
                            <?php
                            if(isset($resT)) { echo $dataT['id_usr_usuarios']; };
                            ?>
                        </p>
                            
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
<?php 
$resultado->close();
$conn->close();
?>