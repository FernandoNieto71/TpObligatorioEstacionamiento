<?php

include_once ("clase/claseVehiculo.php");
include_once ("clase/baseEstacionados.php");

/******************* copiado de la funciona anterior************************/


function recorreEstacionado(){
  $listadoEstacionado=array();
  //$archivo=fopen("estacionado.txt", "r");
  //$listadoEstacionado = baseEstacionados::mostrarEstacionadosCompleto();
  $listadoEstacionado=TraerTodoLosVehiculos();
  //var_dump($listadoEstacionado);
  return $listadoEstacionado;
}

?>