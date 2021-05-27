<?php

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
      $tmp = implode('|', $ll);
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