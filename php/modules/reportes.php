<?php

if(isset($_POST) && !empty($_POST)) {
  $datos = $_POST;
} else if(isset($_GET) && !empty($_GET)) {
  $datos = $_GET;
}


include_once '../../_conexion/conexion.php';
include_once '../models/programa_presupuestario.php';

// Se obtiene la instancia y la conexión
$instance = Conexion::getInstance();
$conexion = $instance->getConnection();
// Se crea la instancia del model de Indicadores
$clsProgramaPresupuestario = new ProgramaPresupuestario($conexion);

$resultado = $clsProgramaPresupuestario->obtenerProgramaPresupuestario();

if(count($resultado) > 0) {
  $datos['accion'] = 'UPDATE';
  $datos['idSedena'] = $resultado['id_sed'];
  $datos['idProgramap'] = $resultado['id_prgp_programap'];
} else {
  $datos = array("accion" => "INSERT", "idSedena" => "", "idProgramap" => "");
}
//print_r($resultado);

include '../vistas/programa_presupuestario.php';
?>