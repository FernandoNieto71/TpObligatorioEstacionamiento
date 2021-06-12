<?php
//funcion que calcula el tiempo
function calculaTiempo($entrada, $salida){
  $segundo= (strtotime($salida)-strtotime($entrada)); 
  /*$segundo = abs($segundo); 
  $segundo = floor($segundo);*/
  return $segundo;
}

//funcion que calcula importe
function calculaImporte($segundo){
  $indice=0;
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
        $valor=450;
        $indice=0;
      } else {
        //$valor=$segundo*.00521;//diario
        $indice=.00521;
      }
      if($indice!=0){
        $valor=$segundo*$indice;
      }
      
      return sprintf('%.2f', $valor);//$valor;
}

//guardar estacionado
function guardarEstacionado($renglon){
  $archivo=fopen("estacionado.txt", "a");
  fwrite($archivo, $renglon);
  fclose($archivo);
  echo "se realizo el ingreso ";
}

//guarda salidas
function guardarSalidas($renglon){
  $archivo=fopen("salidas.txt", "a");
  fwrite($archivo, $renglon);
  fclose($archivo);
  echo "se realizo el ingreso ";
}

//recorre estacionado
function recorreEstacionado(){
  $listadoEstacionado=array();
  $archivo=fopen("estacionado.txt", "r");
  while(!feof($archivo)){
    
    $renglon=fgets($archivo);
    $datosEstacionado=explode("=>", $renglon);
    if(isset($datosEstacionado[1]))//[0]!=" ")
    {
      $listadoEstacionado[]=$datosEstacionado;
    }
  }
  fclose($archivo);
  return $listadoEstacionado;
}

//recorre salida
function recorreSalidas(){
  $listadoSalidas=array();
  $archivo=fopen("salidas.txt", "r");
  while(!feof($archivo)){
    
    $renglon=fgets($archivo);
    $datosSalidas=explode("=>", $renglon);
    if(isset($datosSalidas[1]))//[0]!=" ")
    {
      $listadoSalidas[]=$datosSalidas;
    }
  }
  fclose($archivo);
  return $listadoSalidas;
}


//guardar cobrado
function modificarEstacionado($patente, $tipo, $horaIngreso, $mail)
    {
        $registro = $patente."=>".$tipo."=>".$horaIngreso."=>".$mail;
        $listadoDePatentes = file_get_contents("estacionado.txt");
        $listadoDePatentes = str_replace($registro, '', $listadoDePatentes);
        /*foreach($listadoDePatentes as $dato){
          if($dato[0]!=$patente){
            $sout[]=$dato;
          }
        }*/
        
        file_put_contents("estacionado.txt", $listadoDePatentes);
    }


?>