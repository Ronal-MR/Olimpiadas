<?php

//Incorporamos el modelo (lógica)
require_once '../model/atleta.model.php';

//Si existe alguna operacion en curso
if (isset($_POST['op'])){
  $atleta = new Atleta();

  if ($_POST['op'] == 'listarAtletas'){
    $datos = $atleta->listarAtletas();

    if($datos) {
      echo json_encode($datos);
    }
  } //Fin if ($_POST)

  if($_POST['op'] == 'registrarAtletas'){
    $datosSolicitados=[
    "nombreatleta"  => $_POST['nombreatleta'],
    "edad"          => $_POST['edad'],
    "estatura"      => $_POST['estatura'],
    "peso"          => $_POST['peso'],
    "genero"        => $_POST['genero'],
    "idpais"        => $_POST['idpais'],
    "idcategoria"   => $_POST['idcategoria'],
    "iddeporte"     => $_POST['iddeporte']
    ];
    $respuesta = $atleta->registrarAtletas($datosSolicitados);
    echo json_encode($respuesta);
  }
  

} //Fin de if isset()

?>