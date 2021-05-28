<?php
//funcion que calcula el tiempo
function calculaTiempo($entrada, $salida){
  $minutos= (strtotime($salida)-strtotime($entrada))/60; 
  $minutos = abs($minutos); 
  $minutos = floor($minutos);
  return $minutos;
}

//funcion que calcula importe
function calculaImporte($minutos){
  if($minutos<60){
        $valor=$minutos/10;
        $valor=abs($valor);
        $valor=floor($valor);
        $valor=$valor*45;
        if($valor>150){
          $valor=150;
        }
      } else if($minutos < 180){
        $valor=$minutos/60*150;
        if($valor>450){
          $valor=450;
        }
      } else if($minutos < 720){
        $valor=450;
      } else {
        $tiempo=$minutos/1440;
        $tiempo=abs($tiempo);
        $tiempo=floor($tiempo);
        $valor = 450 * ($tiempo);
      }
      return $valor;
}

//guardar estacionado
function guardarEstacionado($renglon){
  $archivo=fopen("estacionado.txt", "a");
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