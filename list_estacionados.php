<?php

include_once "estacionamiento.php";
$renglones="";

$listadoEstacionado=array();
$listadoEstacionado=estacionamiento::leer();

echo "Listado Estacionados\n";
echo "Patente;Entrada;GNC;Categoria;PersonaIngreso\n";
foreach ($listadoEstacionado as $datos) {
   if(isset($datos[1])){
      $patente=$datos[0];
      $ingreso=$datos[2];
      $gnc=$datos[3];
      $categ=$datos[4];
      $PerIngreso=$datos[5];
      $renglones .= $patente.";".$ingreso.";".$gnc.";".$categ.";".$PerIngreso;
   }

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=estacionados.csv");
echo $renglones;

?>