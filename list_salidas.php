<?php

include_once "funcionesEstacionamiento.php";
$renglones="";

$listadoEstacionado=array();
$listadoEstacionado=recorreSalidas();

echo "Listado de salidas\n";
foreach ($listadoEstacionado as $datos) {
   if(isset($datos[1])){
      $renglones .= $datos[0].";".$datos[2].";".$datos[3] .";".$datos[4];
   }

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=archivo.csv");
echo $renglones;

?>