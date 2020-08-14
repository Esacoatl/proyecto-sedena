<?php
date_default_timezone_set('America/Mexico_City');

class ProgramaPresupuestario  {
  /**
   * 
   */
  protected $conexion;

  /**
   * 
   */
  function __construct($conexion) {
    $this->conexion = $conexion;
  }

  
  /**
   * 
   */
  public function obtenerProgramaPresupuestario() {
    $result = array();
    $result_1 = array();
    $result_2 = array();

    $result_1 = $this->obtenerDatosSedena();
    $result_2 = $this->obtenerDatosProgramaAt($result_1['id_prgp_programap']);
    $result = array_merge($result_1, $result_2);

    return $result;
  }


  /**
   * 
   */
  private function obtenerDatosSedena() {
    $result = array();
    $vsSQL = "SELECT a.id_sed, a.desc_sed, a.mision_sed, a.vision_sed, a.id_usr_usuarios, id_prgp_programap
              FROM sedena a";

    if($resultado = mysqli_query($this->conexion, $vsSQL)) {
      if(mysqli_num_rows($resultado) > 0) {
        while($row = mysqli_fetch_assoc($resultado)) {
          $result['id_sed'] = $row['id_sed'];
          $result['desc_sed'] = utf8_encode($row['desc_sed']);
          $result['mision_sed'] = utf8_encode($row['mision_sed']);
          $result['vision_sed'] = utf8_encode($row['vision_sed']);
          $result['id_usr_usuarios'] = $row['id_usr_usuarios'];
          $result['id_prgp_programap'] = $row['id_prgp_programap'];
        }
      } else {
        $result['respuesta'] = false;
        $result['mensaje'] = 'No hay registros';
      }
    } else {
      $result['respuesta'] = false;
			$result['mensaje'] = mysqli_error($this->conexion);
    }

    return $result;
  }


  /**
   * 
   */
  private function obtenerDatosProgramaAt($idProgramap) {
    $result = array();
    $vsSQL = "SELECT a.descrip_prgp, a.clave_prgp, a.ramo_prgp, a.enf_transv_prgp, a.ejer_f_prgp, a.finalidad_prgp, a.funcion_prgp, a.subfun_prgp, a.act_int_prgp
              FROM programap a
              WHERE a.id_prgp = ".$idProgramap;
    
    if($resultado = mysqli_query($this->conexion, $vsSQL)) {
      if(mysqli_num_rows($resultado) > 0) {
        while($row = mysqli_fetch_assoc($resultado)) {
          $result['descrip_prgp'] = utf8_encode($row['descrip_prgp']);
          $result['clave_prgp'] = utf8_encode($row['clave_prgp']);
          $result['ramo_prgp'] = $row['ramo_prgp'];
          $result['enf_transv_prgp'] = utf8_encode($row['enf_transv_prgp']);
          $result['ejer_f_prgp'] = $row['ejer_f_prgp'];
          $result['finalidad_prgp'] = utf8_encode($row['finalidad_prgp']);
          $result['funcion_prgp'] = utf8_encode($row['funcion_prgp']);
          $result['subfun_prgp'] = utf8_encode($row['subfun_prgp']);
          $result['act_int_prgp'] = utf8_encode($row['act_int_prgp']);
        }
      } else {
        $result['respuesta'] = false;
        $result['mensaje'] = 'No hay registros';
      }
    } else {
      $result['respuesta'] = false;
			$result['mensaje'] = mysqli_error($this->conexion);
    }
    
    return $result;
  }
  

  /**
   * 
   */
  public function insertProgramaPresupuestario($datos) {
    $res = "";

    $res = $this->insertProgramAp($datos);
    if($res['respuesta']) {
      $res = $this->insertSedena($datos, $res['id_programap']);
    }

    return $res;
  }


  /**
   * 
   */
  private function insertProgramAp($datos) {
    $vsSQL = "";
    $fecha = date('Y-m-d H:i:s');

    $vsSQL = "INSERT INTO programap(descrip_prgp, clave_prgp, ramo_prgp, enf_transv_prgp, ejer_f_prgp, finalidad_prgp, funcion_prgp, subfun_prgp, act_int_prgp, 
              usuario_ins, fecha_ins)
              VALUES('".utf8_decode($datos['txtDescripcion'])."', '".utf8_decode($datos['txtClave'])."', '".utf8_decode($datos['txtRamo'])."', '".utf8_decode($datos['txtEnfoques'])."', 
                ".$datos['cmbEjercicio'].", '".utf8_decode($datos['txtFuncionalidad'])."', '".utf8_decode($datos['txtFuncion'])."', '".utf8_decode($datos['txtSubfuncion'])."', 
                '".utf8_decode($datos['txtActividadFuncional'])."', '".utf8_decode($datos['usuario'])."', '".$fecha."')";
    
    if(mysqli_query($this->conexion, $vsSQL)) {
      $result['respuesta'] = true;
      $result['mensaje'] = '';
      $result['id_programap'] = mysqli_insert_id($this->conexion);
    } else {
      $result['respuesta'] = false;
      $result['mensaje'] = mysqli_error($this->conexion);
    }

    return $result;
    
  }


  /**
   * 
   */
  private function insertSedena($datos, $idProgramap) {
    $vsSQL = "";
    $fecha = date('Y-m-d H:i:s');
    $datos['idUsuario'] = 1;

    $vsSQL = "INSERT INTO sedena(desc_sed, mision_sed, vision_sed, id_usr_usuarios, id_prgp_programap, usuario_ins, fecha_ins)
              VALUES('".utf8_decode($datos['txtDescripcionSecretaria'])."', '".utf8_decode($datos['txtMision'])."', '".utf8_decode($datos['txtVision'])."', 
                ".$datos['idUsuario'].", ".$idProgramap.", '".utf8_decode($datos['usuario'])."', '".$fecha."')";
    //echo $vsSQL;
    if(mysqli_query($this->conexion, $vsSQL)){
      $result['respuesta'] = true;
      $result['mensaje'] = '';
    } else {
      $result['respuesta'] = false;
      $result['mensaje'] = mysqli_error($this->conexion);
    }

    return $result;
  }


  /**
   * 
   */
  public function updateProgramaPresupuestario($datos) {
    $res = "";

    $res = $this->updateProgramAp($datos);
    if($res['respuesta']) {
      $res = $this->updateSedena($datos);
    }

    return $res;
  }


  /**
   * 
   */
  private function updateProgramAp($datos) {
    $vsSQL = "";
    $fecha = date('Y-m-d H:i:s');

    $vsSQL = "UPDATE programap 
              SET descrip_prgp = '".utf8_decode($datos['txtDescripcion'])."', clave_prgp = '".utf8_decode($datos['txtClave'])."', ramo_prgp = '".utf8_decode($datos['txtRamo'])."', 
                enf_transv_prgp = '".utf8_decode($datos['txtEnfoques'])."', ejer_f_prgp = ".$datos['cmbEjercicio'].", finalidad_prgp = '".utf8_decode($datos['txtFuncionalidad'])."', 
                funcion_prgp = '".utf8_decode($datos['txtFuncion'])."', subfun_prgp = '".utf8_decode($datos['txtSubfuncion'])."', act_int_prgp = '".utf8_decode($datos['txtActividadFuncional'])."', 
                usuario_upd = '".utf8_decode($datos['usuario'])."', fecha_upd = '".$fecha."'
              WHERE id_prgp = ".$datos['txtIdProgramap'];
    
    if(mysqli_query($this->conexion, $vsSQL)) {
      $result['respuesta'] = true;
      $result['mensaje'] = '';
    } else {
      $result['respuesta'] = false;
      $result['mensaje'] = mysqli_error($this->conexion);
    }

    return $result;
    
  }


  /**
   * 
   */
  private function updateSedena($datos) {
    $vsSQL = "";
    $fecha = date('Y-m-d H:i:s');
    $datos['idUsuario'] = 1;

    $vsSQL = "UPDATE sedena 
              SET desc_sed = '".utf8_decode($datos['txtDescripcionSecretaria'])."', mision_sed = '".utf8_decode($datos['txtMision'])."', vision_sed = '".utf8_decode($datos['txtVision'])."', 
                id_usr_usuarios = ".$datos['idUsuario'].", id_prgp_programap = ".$datos['txtIdProgramap'].", usuario_upd = '".utf8_decode($datos['usuario'])."', 
                fecha_ins ='".$fecha."'
              WHERE id_sed = ".$datos['txtIdSedena'];
    //echo $vsSQL;
    if(mysqli_query($this->conexion, $vsSQL)){
      $result['respuesta'] = true;
      $result['mensaje'] = '';
    } else {
      $result['respuesta'] = false;
      $result['mensaje'] = mysqli_error($this->conexion);
    }

    return $result;
  }

}