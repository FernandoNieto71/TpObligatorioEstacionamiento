<?php

include_once ("clase/claseVehiculo.php");
include_once ("clase/baseEstacionados.php");

//funcion que calcula el tiempo
/*
function calculaTiempo($entrada, $salida){
  $segundo= (strtotime($salida)-strtotime($entrada)); 
  /*$segundo = abs($segundo); 
  $segundo = floor($segundo);
  return $segundo;
}

//funcion que calcula importe
function calculaImporte($segundo,$id_vehiculo){ //$gnc,$categoria
  $objVehiculo=claseVehiculo::TraerUnRegistro($id_vehiculo);
  $indice=0;
  $porcentaje=1;

  switch ($objVehiculo->clase) {
    case 'N':
      // code...
      break;
    case 'C':
      $porcentaje=$porcentaje+0.1;
      break;
    case 'A':
      $porcentaje=$porcentaje+0.2;
      break;   
    /*default:
      // code...
      break;
  }

  if($segundo<3600){//menor a una hora
        //$valor=$segundo*.075;
        $indice=.075;
        if($segundo>3000){
          $indice=.041667;
        }
      } else if($segundo < 10800){//menor a 3 horas
        //$valor=$segundo*.041667;
        $indice=.041667;
        
      } else if($segundo < 43200){//menor a 12 horas
        $valor=450 * $porcentaje;
        $indice=0;
      } else {
        //$valor=$segundo*.00521;//diario
        $indice=.00521;
      }
      if($indice!=0){
        $valor=$segundo*$indice * $porcentaje;
      }
  
  if($objVehiculo->gnc==1){
    $valor=$valor + 50;
  }  
  return sprintf('%.2f', $valor);//$valor;
}

*/
/******************* copiado de la funciona anterior************************/


function recorreEstacionado(){
  $listadoEstacionado=array();
  //$archivo=fopen("estacionado.txt", "r");
  $listadoEstacionado = baseEstacionados::mostrarEstacionadosCompleto();
  
  return $listadoEstacionado;
}

?>