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
function modificarEstacionado($patente, $movimiento, $horaIngreso,$correo,$horaSalida,$valor){
  $archivo = 'estacionado.txt';
  $a = file($archivo); // lo carga a un vector
  foreach($a as $k => $l){
    // recorre el vector pareseando las líneas
    $ll = explode('|', $l);
    if ($ll[0] == $patente){
      // si encuentra la línea, modifica
      $ll[1] = $movimiento;
      $ll[2] = $horaIngreso;
      $ll[3] = $correo;
      $ll[4] = $horaSalida;
      $ll[5] = $valor;
      // rearma la cadena
      $tmp = implode('=>', $ll);
      // la asigna al vector en la posición orginal
      $a[$k] = $tmp;
      // sale del foreach, porque no tiene sentido seguir buscando.
      break;
    }
  }
  // Guarda el vector resultado sobreescribiendo el archivo
  // Unir archivo
  $contenido = implode(PHP_EOL,$a);
  $abrir = fopen($archivo,'w');
  fwrite($abrir,$contenido);
  fclose($abrir);
  return true;
}

?>