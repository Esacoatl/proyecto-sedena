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
            <h1><span style="color: #63a537;">Informe de Actividad</span></h1>
            <p><span style="color: #808080;">Formulario para planeaci&oacute;n por parte del
                    <strong>Titular</strong></span></p>
            <p><span style="color: #808080;">Para efectos de decidir que tareas se realizan de cada subactividad</span>
            </p>
            <h2><span style="color: #99cc00;">Datos generales de Subactividad</span></h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p><strong>Nombre de subactividad</strong></p>
                        </td>
                        <td style="color: #808080; background-color: #FFF899;">
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
                            <p><strong>Seleccionar Componente</strong> <span style="color: #808080;">(solo se puede
                                    seleccionar uno)</span></p>
                        </td>
                        <td>
                            <p><strong>Seleccionar Actividad</strong> <span style="color: #808080;">(solo se puede
                                    seleccionar una)</span></p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899;">
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSub)) { echo $dataSub['descripcion_cmt']; };
                            ?>
                            </p>
                            <p>[]&nbsp; A capacitaci&oacute;n para la transversalizaci&oacute;n de la perspectiva de
                                g&eacute;nero en la vida institucional del ej&eacute;rcito y fuerza a&eacute;rea
                                mexicanos realizada.</p>
                            <p>[]&nbsp; B campa&ntilde;a de difusi&oacute;n interna para la sensibilizaci&oacute;n de
                                los integrantes del ej&eacute;rcito y fuerza a&eacute;rea mexicanos implementada.</p>
                            <p>[]&nbsp; C infraestructura en el ej&eacute;rcito y fuerza a&eacute;rea mexicanos
                                implementada.</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                            if(isset($resSub)) { echo $dataSub['descripcion_act']; };
                            ?>
                            </p>
                            <p>[]&nbsp; A 1 profesionalizaci&oacute;n de personal militar en perspectiva de
                                g&eacute;nero.</p>
                            <p>[]&nbsp; A 2 talleres en materia de igualdad de g&eacute;nero.</p>
                            <p>[]&nbsp; A 3 cursos de capacitaci&oacute;n virtual en prevenci&oacute;n del hostigamiento
                                y acoso sexual y capacitaci&oacute;n en perspectiva de g&eacute;nero.</p>
                            <p>[]&nbsp; B 4 difusi&oacute;n de la campa&ntilde;a interna.</p>
                            <p>[]&nbsp; C 5 adquisici&oacute;n de servidores para el esquema tecnol&oacute;gico del
                                centro de capacitaci&oacute;n virtual.</p>
                            <p>[]&nbsp; C 6 construcci&oacute;n de un auditorio como complemento del sistema militar de
                                capacitaci&oacute;n virtual, de salas de lactancia; construcci&oacute;n y
                                adecuaci&oacute;n en las instalaciones de las prisiones militares y construcci&oacute;n
                                adecuaci&oacute;n y remodelaci&oacute;n de instalaciones militares con perspectiva de
                                g&eacute;nero.</p>
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
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['fechain_sbact']; };
                            ?>
                            </p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['fechain_sbact']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Responsable de ejecuci&oacute;n</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resU)) { echo $dataU['nombre_usr']; };
                            ?>
                            </p>
                            <p>                            
                            <?php
                                if(isset($resU)) { echo $dataU['primerapell_usr']; };
                            ?>
                            </p>
                            <p>                            
                            <?php
                                if(isset($resU)) { echo $dataU['segundoapell_usr']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Descripci&oacute;n general de subactividad</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['descrip_sbact']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Recursos invertidos</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['recursoejer_sbact']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Beneficiarios </strong><span
                                    style="color: #808080;">(capacitados/receptores/usuarios)</span></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['cant_prog_somi']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Proveedor </strong><span style="color: #808080;">(p.ej. instancia
                                    educativa)</span></p>
                        </td>
                        <td style="color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['proveedor_sbact']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><strong>Alcance de la subactividad</strong> <span style="color: #808080;">(se pueden seleccionar
                    varias)</span></p>
            <table style="background-color: #FFF899;">
                <tbody>
                    <tr>
                        <td>
                            <p>[]&nbsp; Nacional</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['nacional_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Regiones Militares</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['rmilitares_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Zonas Militares</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['zmilitares_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Dependencias y Unidades Operativas</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['duo_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Planteles Escolares</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['pe_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Campos Militares</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['cm_sbact']; };
                            ?>
                            </p>
                            <p>[]&nbsp; Otro</p>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['otro_sbact']; };
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
                            <p><strong>Documento(s) adjunto(s)</strong></p>
                        </td>
                        <td style="background-color: #FFF899; color: #808080;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['id_sbact']; };
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
                                if(isset($resSub)) { echo $dataSub['notaad_sbact']; };
                            ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><span style="color: #99cc00;">Registro de programaci&oacute;n</span></h2>
            <table>
                <tbody>
                    <tr style="color: #ffff; background-color: #63a537;">
                        <td colspan="3">
                            <p><strong>Sede</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>Programaci&oacute;n</strong></p>
                        </td>
                        <td colspan="4">
                            <p><strong>Ejecuci&oacute;n</strong></p>
                        </td>
                    </tr>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td>
                            <p><strong>No.</strong></p>
                        </td>
                        <td>
                            <p><strong>Sede</strong></p>
                        </td>
                        <td>
                            <p><strong>Lugar de impartici&oacute;n</strong></p>
                        </td>
                        <td>
                            <p><strong>Fecha de inicio</strong></p>
                        </td>
                        <td>
                            <p><strong>Fecha de termino</strong></p>
                        </td>
                        <td>
                            <p><strong>Realizado (Si / No)</strong></p>
                        </td>
                        <td>
                            <p><strong>Responsable</strong></p>
                        </td>
                        <td>
                            <p><strong>Recursos</strong></p>
                        </td>
                        <td>
                            <p><strong>&nbsp;</strong></p>
                        </td>
                    </tr>
                    <tr style="background-color: #FFF899;">
                        <td>
                            <p>&nbsp;</p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resDPC)) { echo $dataDPC['denomina_dpc']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resT)) { echo $dataT['lugar_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resT)) { echo $dataT['fechain_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resT)) { echo $dataT['fecfin_tarea']; };
                            ?>
                            </p>
                        </td>
                        <td style="background-color: #fff;">
                            <p>                            
                            <?php
                                if(isset($resT)) { echo $dataT['cumplida_tarea']; };recursoprog_tarea
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['id_usr']; };recursoprog_tarea
                            ?>
                            </p>
                        </td>
                        <td>
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['recursoprog_tarea']; };recursoprog_tarea
                            ?>
                            </p>
                        </td>
                        <td style="background-color: #fff;">
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p><strong>Subtotales</strong></p>
                        </td>
                        <td style="background-color: #ffac19;">
                            <p>                            
                            <?php
                                if(isset($resSub)) { echo $dataSub['total_abs_sbact']; };recursoprog_tarea
                            ?>
                            </p>
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
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Control estad&iacute;stico agregado</span> <span
                    style="color: #808080;">(como informe)</span></h2>
            <p><strong>Gr&aacute;fico de control estad&iacute;stico agregado</strong></p>
            <p><span style="color: #808080;">Se genera autom&aacute;ticamente con los datos capturados
                    de las Tareas</span></p>
            <div>
                <script>
                    /*document.write('<img src="https://image-charts.com/chart?' +
                        'chbh=a&' +
                        'chco=ffac19%2C63a537&' +
                        //datos de la grafica
                        'chd=t' +
                        '%3A' + '1' +
                        '%2C' + '5' +
                        '%2C' + '15' +
                        '%2C' + '10' +

                        '%7C' + '2' +
                        '%2C' + '4' +
                        '%2C' + '10' +
                        '%2C' + '7' +

                        '%7C' + '1' +
                        '%2C' + '1' +
                        '%2C' + '7' +
                        '%2C' + '5' +

                        '%7C' + '1' +
                        '%2C' + '2' +
                        '%2C' + '3' +
                        '%2C' + '1' +
                        //-----
                        '&' +
                        //labels de la grafica
                        'chdl=20%20a%2030%7C%2031%20a%2040%7C%2041%20a%2050%7C%2051%20a%2060' +
                        //-----
                        '&' +
                        'chds=0%2C120&' +
                        'chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&' +
                        'chma=0%2C0%2C10%2C10&' +
                        // tamano
                        'chs=700x150' +
                        //-----
                        '&' +
                        //tipo de grafica
                        'cht=bvg' +
                        //-----
                        '&' +
                        'chxs=0%2C000000%2C0%2C0%2C_&' +
                        'chxt=y">')*/
                </script>
                <img  width="500" height="280" src="https://quickchart.io/chart?c={type:'bar',data:{labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500],}]}}">
                <!--<img src="https://image-charts.com/chart?chbh=a&chco=ffac19%2C63a537&chd=t%3A1%2C5%2C15%2C10%7C2%2C4%2C10%2C7%7C1%2C1%2C7%2C5%7C1%2C2%2C3%2C1&chdl=20%20a%2030%7C%2031%20a%2040%7C%2041%20a%2050%7C%2051%20a%2060&chds=0%2C120&chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&chma=0%2C0%2C10%2C10&chs=700x150&cht=bvg&chxs=0%2C000000%2C0%2C0%2C_&chxt=y">-->
            </div>
            <p>&nbsp;</p>
            <p><strong>Tabla de s&iacute;ntesis de participantes <span style="color: #808080;">(</span></strong><span
                    style="color: #808080;">Se genera con los datos capturados)</span></p>
            <table>
                <tbody>
                    <tr style="background-color: #99cc00;">
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
            <p>Avance porcentual de tareas realizadas respecto de las totales: ___%</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h2><span style="color: #99cc00;">Concentrado de avances</span> <span style="color: #808080;">(como
                    informe)</span></h2>
            <p><strong>Tabla concentrada de tareas</strong></p>
            <table>
                <tbody>
                    <tr style="color: #ffff; background-color: #63a537;">
                        <td colspan="3">
                            <p><strong>Sede</strong></p>
                        </td>
                        <td colspan="2">
                            <p><strong>Participantes</strong></p>
                        </td>
                        <td colspan="5">
                            <p><strong>Evaluaci&oacute;n</strong></p>
                        </td>
                    </tr>
                    <tr style="color: #ffff; background-color: #99cc00;">
                        <td>
                            <p><strong>No.</strong></p>
                        </td>
                        <td>
                            <p><strong>Sede</strong></p>
                        </td>
                        <td>
                            <p><strong>Lugar de impartici&oacute;n</strong></p>
                        </td>
                        <td>
                            <p><strong>Inscritos</strong></p>
                        </td>
                        <td>
                            <p><strong>Aprobados</strong></p>
                        </td>
                        <td>
                            <p><strong>Instrucci&oacute;n</strong></p>
                        </td>
                        <td>
                            <p><strong>Contenidos</strong></p>
                        </td>
                        <td>
                            <p><strong>Materiales</strong></p>
                        </td>
                        <td>
                            <p><strong>Espacio</strong></p>
                            <p><strong>&nbsp;</strong></p>
                        </td>
                        <td>
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
            <p><strong>&nbsp;</strong></p>
            <p><strong>Gr&aacute;fica de evaluaci&oacute;n <span
                        style="color: #808080;">(s&iacute;ntesis)</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>
            <p><span style="color: #808080;">Se genera autom&aacute;ticamente con datos capturados de
                    las Tareas</span></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div>
            <img  width="200" height="200"src="https://quickchart.io/chart?c={type:'pie',data:{labels:['January','February', 'March','April', 'May'], datasets:[{data:[50,60,70,180,190]}]}}">
            <img  width="350" height="200"src="https://quickchart.io/chart?c={type:'bar',data:{labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500],}]}}">
                <script>
                    /*document.write('<img src="https://image-charts.com/chart?' +
                        'chbh=a&' +
                        'chco=63a537&' +
                        //datos de la grafica (deberan ser cambiados por datos PHP)
                        'chd=t' +
                        '%3A' + '50' +
                        '%2C' + '5' +
                        '%2C' + '7' +
                        '%2C' + '1' +
                        '%2C' + '2' +
                        //-----
                        '&' +
                        //labels de la grafica
                        'chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal' +
                        //-----
                        '&' +
                        'chds=0%2C120&' +
                        'chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&' +
                        'chma=0%2C0%2C10%2C10&' +
                        // tamano
                        'chs=200x200' +
                        //-----
                        '&' +
                        //tipo de grafica
                        'cht=p' +
                        //-----
                        '&' +
                        'chxs=0%2C000000%2C0%2C0%2C_&' +
                        'chxt=y">')*/
                </script>
                <!--<img src="https://image-charts.com/chart?chbh=a&chco=63a537&chd=t%3A50%2C5%2C7%2C1%2C2&chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal&chds=0%2C120&chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&chma=0%2C0%2C10%2C10&chs=200x200&cht=p&chxs=0%2C000000%2C0%2C0%2C_&chxt=y">-->
                <script>
                    /*document.write('<img src="https://image-charts.com/chart?' +
                        'chbh=a&' +
                        'chco=ffac19%2C63a537&' +
                        //datos de la grafica (deberan ser cambiados por datos PHP) t%3A5%2C5%2C4%2C5%7C10%2C11%2C10%2C9%7C15%2C16%2C17%2C15%7C15%2C15%2C15%2C15
                        'chd=t' +
                        '%3A' + '5' +
                        '%2C' + '5' +
                        '%2C' + '4' +
                        '%2C' + '5' +

                        '%7C' + '10' +
                        '%2C' + '11' +
                        '%2C' + '10' +
                        '%2C' + '9' +

                        '%7C' + '15' +
                        '%2C' + '16' +
                        '%2C' + '17' +
                        '%2C' + '15' +

                        '%7C' + '15' +
                        '%2C' + '15' +
                        '%2C' + '15' +
                        '%2C' + '15' +
                        //-----
                        '&' +
                        //labels de la grafica
                        'chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal' +
                        //-----
                        '&' +
                        'chds=0%2C120&' +
                        'chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&' +
                        'chma=0%2C0%2C10%2C10&' +
                        // tamano
                        'chs=450x200' +
                        //-----
                        '&' +
                        //tipo de grafica
                        'cht=bhs' +
                        //-----
                        '&' +
                        'chxr=1%2C0%2C100&' +
                        'chxt=y,x">')*/
                </script>
                <!--<img src="https://image-charts.com/chart?chbh=a&chco=ffac19%2C63a537&chd=t%3A5%2C5%2C4%2C5%7C10%2C11%2C10%2C9%7C15%2C16%2C17%2C15%7C15%2C15%2C15%2C15&chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal&chds=0%2C120&chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&chma=0%2C0%2C10%2C10&chs=450x200&cht=bhs&chxr=1%2C0%2C100&chxt=y,x">-->
            </div>
            <p>Grafica 2: 0 = Sede, 1 = Material, 2 = Contenido, 3 = Instructores/as</p>
            <p><strong>&nbsp;</strong></p>
            <p>Valor general de evaluaci&oacute;n de la subactividad: ____</p>
            <p><strong>&nbsp;</strong></p>
            <div>
                <p><strong>Gr&aacute;fica de evaluaci&oacute;n <span style="color: #808080;">(barra por
                            sede)&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp; </strong></p>
                <p><span style="color: #808080;">Se genera autom&aacute;ticamente con datos capturados de
                        las Tareas</span></p>
                <script>
                    /*document.write('<img src="https://image-charts.com/chart?' +
                        'chbh=a&' +
                        'chco=63a537&' +
                        //datos de la grafica (deberan ser cambiados por datos PHP) t%3A5%2C5%2C4%2C5%7C10%2C11%2C10%2C9%7C15%2C16%2C17%2C15%7C15%2C15%2C15%2C15
                        'chd=t' +
                        '%3A' + '50' +
                        '%2C' + '50' +
                        '%2C' + '40' +
                        '%2C' + '60' +
                        '%2C' + '70' +
                        '%2C' + '50' +
                        '%2C' + '34' +
                        '%2C' + '56' +
                        '%2C' + '34' +
                        '%2C' + '10' +
                        '%2C' + '34' +
                        '%2C' + '54' +
                        '%2C' + '76' +
                        '%2C' + '32' +
                        '%2C' + '45' +
                        '%2C' + '55' +
                        '%2C' + '60' +
                        '%2C' + '70' +
                        '%2C' + '50' +
                        '%2C' + '34' +
                        '%2C' + '56' +
                        '%2C' + '34' +
                        '%2C' + '10' +
                        '%2C' + '45' +
                        '%2C' + '55' +
                        '%2C' + '60' +
                        '%2C' + '70' +
                        '%2C' + '50' +
                        '%2C' + '34' +
                        '%2C' + '54' +
                        '%2C' + '76' +
                        //-----
                        '&' +
                        //labels de la grafica
                        'chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal' +
                        //-----
                        '&' +
                        'chds=0%2C120&' +
                        'chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&' +
                        'chma=0%2C0%2C10%2C10&' +
                        // tamano
                        'chs=450x800' +
                        //-----
                        '&' +
                        //tipo de grafica
                        'cht=bhg' +
                        //-----
                        '&' +
                        'chxr=1%2C0%2C100&' +
                        'chxt=y,x">')*/
                </script>
                <!--<img src="https://image-charts.com/chart?chbh=a&chco=63a537&chd=t%3A50%2C50%2C40%2C60%2C70%2C50%2C34%2C56%2C34%2C10%2C34%2C54%2C76%2C32%2C45%2C55%2C60%2C70%2C50%2C34%2C56%2C34%2C10%2C45%2C55%2C60%2C70%2C50%2C34%2C54%2C76&chdl=Excelente%7CMuy%20bien%7CBien%7CRegular%7CMal&chds=0%2C120&chm=N%2C000000%2C0%2C%2C10%7CN%2C000000%2C1%2C%2C10%7CN%2C000000%2C2%2C%2C10&chma=0%2C0%2C10%2C10&chs=450x800&cht=bhg&chxr=1%2C0%2C100&chxt=y,x">-->
                <img width="500" height="280" src="https://quickchart.io/chart?c={type:'bar',data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]}}" alt="">
                <p>&nbsp;</p>
            </div>
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