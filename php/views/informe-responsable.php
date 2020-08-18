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
            padding-left:2px;
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
            <h1><span style="color: #63a537;">Informe de Subactividad</span></h1>
            <p><span style="color: #808080;">Llenada por el <strong>Responsable</strong></span></p>
            <p><span style="color: #808080;">Captura con datos entregados por Proveedor</span></p>
            <h2><span style="color: #99cc00;">Datos generales de Subactividad</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Nombre de subactividad</strong></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                        
                            <?php
                            if(isset($resSub)) { echo $dataSub['nombre_sbact']; };
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
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Fecha o per&iacute;odo de realizaci&oacute;n</strong></p>
                        </td>
                        <td  style="color: #808080;">
                            <p>                        
                            <?php
                            if(isset($resSub)) 
                            {   
                                echo $dataSub['fechain_sbact']; 
                            };
                            ?>
                            </p>
                            <p>                        
                            <?php
                            if(isset($resSub)) 
                            {   
                                echo $dataSub['fecfin_sbact'];
                            };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Responsable de ejecuci&oacute;n</strong></p>
                        </td>
                        <td  style="color: #808080;">
                            <p></p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p><strong>Recursos invertidos</strong></p>
                        </td>
                        <td  style="color: #808080;">
                            <p>                        
                                <?php
                                if(isset($resSub)) 
                                {   
                                    echo $dataSub['recursoejer_sbact']; 
                                };
                                ?>
                            </p>
                            <p>                        
                                <?php
                                if(isset($resSub)) 
                                {   
                                    echo $dataSub['prov_sbact'];
                                };
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p><strong>Proveedor </strong><span style="color: #808080;">(p.ej. instancia
                                    educativa)</span></p>
                        </td>
                        <td  style="color: #808080;">
                            <p></p>
                            <p></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <table>
                <tbody>
                    <tr>
                        <td >
                            <p><strong>Descripci&oacute;n general de subactividad</strong></p>
                        </td>descrip_sbact
                        <td  style="color: #808080; background-color: #FFF899;">
                            <p>                        
                                <?php
                                if(isset($resSub)) { echo $dataSub['descrip_sbact']; };
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p><strong>Beneficiarios esperados </strong><span
                                    style="color: #808080;">(capacitados/receptores/usuarios)</span></p>
                        </td>
                        <td  style="color: #808080; background-color: #FFF899;">
                            <p>                        
                                <?php
                                if(isset($resSub)) { echo $dataSub['benefesp_sbact']; };
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p><strong>Documento(s) adjunto(s)</strong></p>
                        </td>
                        <td  style="color: #808080; background-color: #FFF899;">
                            <p>                        
                                <?php
                                if(isset($resETar)) { echo $dataETar['descrip_evi']; };
                                ?>
                                <?php
                                if(isset($resETar)) { echo $dataETar['adjunto_evi']; };
                                ?>
                                 <?php
                                if(isset($resETar)) { echo $dataETar['tipoevi_tar']; };
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p><strong>Notas adicionales</strong></p>
                        </td>
                        <td  style="color: #808080; background-color: #FFF899;">
                            <p>                        
                                <?php
                                if(isset($resSub)) { echo $dataSub['notaad_sbact']; };
                                ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Control estad&iacute;stico agregado</span></h2>
            <table class="big-table">
                <tbody>
                    <tr style="color: #ffff; background-color: #63a537;">
                        <td colspan="3" >
                            <p><strong>&nbsp;</strong></p>
                        </td>
                        <td colspan="8" >
                            <p><strong>Generales</strong></p>
                        </td>
                        <td colspan="8" >
                            <p><strong>Jefes</strong></p>
                        </td>
                        <td colspan="8" >
                            <p><strong>Oficiales</strong></p>
                        </td>
                        <td colspan="6" >
                            <p><strong>Tropa</strong></p>
                        </td>
                        <td rowspan="4" >
                            <p><strong>Total</strong></p>
                        </td>
                    </tr>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td >
                            <p>No.</p>
                        </td>
                        <td >
                            <p>Sede</p>
                        </td>
                        <td >
                            <p>Lugar</p>
                        </td>
                        <td colspan="8" >
                            <p>Secretario, de divisi&oacute;n, de brigada / de ala, brigadier / de grupo</p>
                        </td>
                        <td colspan="8" >
                            <p>Coronel, Teniente Coronel y Mayor</p>
                        </td>
                        <td colspan="8" >
                            <p>Capit&aacute;n 1/o, Capit&aacute;n 2/o, <br /> Teniente y Subteniente</p>
                        </td>
                        <td colspan="6" >
                            <p>Sargento 1/o, Sargento 2/o,<br /> Cabo, Soldado de 1/a y Soldado</p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td colspan="4" >
                            <p>Hombre</p>
                        </td>
                        <td colspan="4" >
                            <p>Mujer</p>
                        </td>
                        <td colspan="4" >
                            <p>Hombre</p>
                        </td>
                        <td colspan="4" >
                            <p>Mujer</p>
                        </td>
                        <td colspan="4" >
                            <p>Hombre</p>
                        </td>
                        <td colspan="4" >
                            <p>Mujer</p>
                        </td>
                        <td colspan="3" >
                            <p>Hombre</p>
                        </td>
                        <td colspan="3" >
                            <p>Mujer</p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>61 y m&aacute;s</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>61 y m&aacute;s</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 60 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 55 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>51 a 55 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>20 a 30 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>31 a 40 a&ntilde;os</p>
                        </td>
                        <td >
                            <p>41 a 50 a&ntilde;os</p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899;">
                        <td  style="background-color: #ffff;">
                            <p>&nbsp;</p>
                        </td>
                        <td  style="background-color: #fff;">
                            <p>&nbsp;</p>
                        </td>
                        <td  style="background-color: #fff;">
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>1</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>1</p>
                        </td>
                        <td >
                            <p>4</p>
                        </td>
                        <td >
                            <p>1</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>16</p>
                        </td>
                        <td >
                            <p>20</p>
                        </td>
                        <td >
                            <p>1</p>
                        </td>
                        <td >
                            <p>6</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td  style="background-color: #ffac19;">
                            <p><strong>50</strong></p>
                        </td>
                    </tr>
                    <tr style="background-color: #ffac19;">
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p><strong>&nbsp;</strong></p>
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
            <p><strong>&nbsp;</strong></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><strong>Tabla de s&iacute;ntesis de participantes<span style="color: #808080;"> (</span></strong><span
                    style="color: #808080;">Se genera con los datos capturados)</span></p>
            <table >
                <tbody>
                    <tr style="color: #ffff; background-color: #99cc00;;">
                        <td >
                            <p>Rango</p>
                        </td>
                        <td >
                            <p>Total</p>
                        </td>
                        <td >
                            <p>Porcentaje</p>
                        </td>
                        <td >
                            <p>Mujeres</p>
                        </td>
                        <td >
                            <p>Porcentaje</p>
                        </td>
                        <td >
                            <p>Hombres</p>
                        </td>
                        <td >
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
            <p>Avance porcentual de tareas realizadas respecto de las totales:                             
                            <?php
                                //$suma014 = ($dataT['cumplida_tarea']/$dataSub['id_sbact_subactividades']) * 100;
                                //if(isset($resSin)) { echo $suma014; };
                            ?>
                            </p>
            <h2><span style="color: #99cc00;">Concentrado</span></h2>
            <p><strong>Tabla concentrada de tareas</strong></p>
            <table>
                <tbody>
                    <tr style="color: #ffff; background-color: #63a537;;">
                        <td colspan="4" >
                            <p><strong>Sede</strong></p>
                        </td>
                        <td >
                            <p><strong>Realizado</strong></p>
                        </td>
                        <td colspan="2" >
                            <p><strong>Participantes</strong></p>
                        </td>
                        <td colspan="5" >
                            <p><strong>Evaluaci&oacute;n</strong></p>
                        </td>
                    </tr>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td >
                            <p><strong>No.</strong></p>
                        </td>
                        <td >
                            <p><strong>Sede</strong></p>
                        </td>
                        <td >
                            <p><strong>Lugar de impartici&oacute;n</strong></p>
                        </td>
                        <td >
                            <p><strong>RM</strong></p>
                        </td>
                        <td >
                            <p><strong>Si/No</strong></p>
                        </td>
                        <td >
                            <p><strong>Inscritos</strong></p>
                        </td>
                        <td >
                            <p><strong>Aprobados</strong></p>
                        </td>
                        <td >
                            <p><strong>Instrucci&oacute;n</strong></p>
                        </td>
                        <td >
                            <p><strong>Contenidos</strong></p>
                        </td>
                        <td >
                            <p><strong>Materiales</strong></p>
                        </td>
                        <td >
                            <p><strong>Espacio</strong></p>
                        </td>
                        <td >
                            <p><strong>Total</strong></p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899;">
                        <td  style="background-color: #fff;">
                            <p>&nbsp;</p>
                        </td>
                        <td  style="background-color: #fff;">
                            <p>                            
                            <?php
                            if(isset($resDPC)) { echo $dataDPC['denomina_dpc']; };
                            ?>
                            </p>
                        </td>
                        <td  style="background-color: #fff;">
                            <p>                            
                            <?php
                            if(isset($resT)) { echo $dataT['sede_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['inscrit_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['aprob_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['ev_instr_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['ev_cont_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['ev_mat_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['ev_esp_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td  style="background-color: #ffac19;">
                            <p>                            
                            <?php
                            if(isset($resET)) { echo $dataEt['ev_prom_ctar']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr style="background-color: #ffac19;">
                        <td colspan="3" style="background-color: #FFF;">
                            <p><strong>Subtotales</strong></p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            //suma?
                            if(isset($resET)) { echo $dataEt['ev_prom_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            //suma?
                            if(isset($resET)) { echo $dataEt['inscrit_ctar ']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>                            
                            <?php
                            //suma?
                            if(isset($resET)) { echo $dataEt['aprob_ctar']; };
                            ?>
                            </p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
                        </td>
                        <td >
                            <p>&nbsp;</p>
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