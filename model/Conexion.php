<?php

class Conexion {

  //Guarda la conexión
  protected $pdo;

  //Acceder a la BD
  private function Conectar(){
    $cn = new PDO("mysql:host=localhost;port=3306;dbname=Olimpiadas;charset=utf8", "root", "");
    return $cn;
  }

  //Retornar la conexión
  public function getConexion(){
    try{
      $pdo = $this->Conectar();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }catch(Exception $e){
      die($e->gerMessage());
    }
  }

} //Fin de la clase

?>