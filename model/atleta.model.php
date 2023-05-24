<?php

//Importar la conexion
require_once 'Conexion.php';


class Plato extends Conexion{

  //Almacena la conexion
  private $conexion;

  //Pasamos la conexión
  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarPlatos(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM platos ORDER BY idplato");
      $consulta->execute();

      $tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $tabla;

    }catch(Exception $e){
      die($e->getMessage());
    }
  } //Fin de listar platos

  public function registrarPlato($datosPlatos=[]){

      $respuesta=[
        "status" => false,
        "message" => ""
      ];
      try{
        $consulta = $this->conexion->prepare("INSERT INTO platos (tipo, nombreplato, precio) VALUES (?,?,?)");
        $respuesta ["status"] = $consulta->execute(array(

          $datosPlatos['tipo'],
          $datosPlatos['nombreplato'],
          $datosPlatos['precio']
        ));
      }catch(Exception $e) {
        $respuesta["message"] = "No se pudo completar el proceso de registro. Codigo de error".$e->getMessage();
      }
      return $respuesta;
  }//Fin registrar plato

}//Fin de la clase

?>