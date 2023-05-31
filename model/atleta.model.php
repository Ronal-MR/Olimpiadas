<?php

//Importar la conexion
require_once 'Conexion.php';


class Atleta extends Conexion{

  //Almacena la conexion
  private $conexion;

  //Pasamos la conexión
  public function __construct()
  {
    $this->conexion = parent::getConexion();
  }

  public function listarAtletas(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM Atleta ORDER BY idatleta");
      $consulta->execute();

      $tabla = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $tabla;

    }catch(Exception $e){
      die($e->getMessage());
    }
  } //Fin de listar platos

  public function registrarAtletas($datosAtletas=[]){

      $respuesta=[
        "status" => false,
        "message" => ""
      ];
      try{
        $consulta = $this->conexion->prepare("CALL spu_Insertar_Atleta(?,?,?,?,?,?,?,?)");
        $respuesta ["status"] = $consulta->execute(array(

          $datosAtletas['nombreatleta'],
          $datosAtletas['edad'],
          $datosAtletas['estatura'],
          $datosAtletas['peso'],
          $datosAtletas['genero'],
          $datosAtletas['idpais'],
          $datosAtletas['idcategoria'],
          $datosAtletas['iddeporte']
        ));
      }catch(Exception $e) {
        $respuesta["message"] = "No se pudo completar el proceso de registro. Codigo de error".$e->getMessage();
      }
      return $respuesta;
  }//Fin registrar plato

}//Fin de la clase

?>