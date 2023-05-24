<?php

//Incorporamos el modelo (lógica)
require_once '../model/atleta.model.php';

//Si existe alguna operacion en curso
if (isset($_POST['op'])){
  $plato = new Plato();

  if ($_POST['op'] == 'listarPlatos'){
    $datos = $plato->listarPlatos();

    if($datos) {
      echo json_encode($datos);
    }
  } //Fin if ($_POST)

  if($_POST['op'] == 'registrarPlatos'){
    $datosSolicitados=[
    "tipo"        => $_POST['tipo'],
    "nombreplato" => $_POST['nombreplato'],
    "precio"      => $_POST['precio']
    ];
    $respuesta = $plato->registrarPlato($datosSolicitados);
    echo json_encode($respuesta);
  }
  

} //Fin de if isset()

?>