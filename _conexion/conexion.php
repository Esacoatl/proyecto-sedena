<?php

class Conexion {        
  private $_connection;
  //The single instance
  private static $_instance; 
  private $_host;
  private $_username;
  private $_password;
  private $_database;
  private $_ini;

  /*
   Se obtiene la instancia de la conexión
    @return Instance
  */
  public static function getInstance() {
    if(!self::$_instance) { 
        self::$_instance = new self();
    }
    return self::$_instance;
  }

  // Constructor
  private function __construct() {
    $this->_ini = parse_ini_file('config.ini');
    $this->_host = $this->_ini['mysqli.default_host'];
    $this->_username = $this->_ini['mysqli.default_user'];
    $this->_password = $this->_ini['mysqli.default_pw'];
    $this->_database = $this->_ini['mysqli.default_db'];
    // se crea la conexión
    $this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
    // Error handling
    if(mysqli_connect_error()) {
        trigger_error("Hubo una falla al conectarse a MySQL: " . mysqli_connect_error(), E_USER_ERROR);
    }
  }

  // Magic method clone is empty to prevent duplication of connection
  private function __clone() { }

  // Get mysqli connection
  public function getConnection() {
      return $this->_connection;
  }
  
  public function get_data($sql) {
      $ret = array('STATUS'=>'ERROR','ERROR'=>'','DATA'=>array());
      
      $mysqli = $this->getConnection();
      $res = $mysqli->query($sql);
      
      if($res)
          $ret['STATUS'] = "OK";
      else
          $ret['ERROR'] = mysqli_error($this->_connection);
      
      while($row = $res->fetch_array(MYSQLI_ASSOC)) {
          $ret['DATA'][] = $row;
      }
      return $ret;
  }
  
  public function exec($sql) {
      $ret = array('STATUS'=>'ERROR','ERROR'=>'');

      $mysqli = $this->getConnection();
      $res = $mysqli->query($sql);
      
      if($res)
          $ret['STATUS'] = "OK";
      else
          $ret['ERROR'] = mysqli_error($this->_connection);
      
      return $ret;
  }

}

?>