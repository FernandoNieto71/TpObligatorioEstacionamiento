<?php

include_once "funcionesEstacionamiento.php";
$renglones="";

$listadoEstacionado=array();
$listadoEstacionado=recorreSalidas();

echo "Listado de salidas\n";
echo "Patente;Salida;Cobrado;PersonaEgreso;Entrada;GNC;Categoria;PersonaIngreso\n";
foreach ($listadoEstacionado as $datos) {
   if(isset($datos[0])){
      $patente=$datos[0];
      $salida=$datos[2];
      $valor=$datos[3];
      $PerEgreso=$datos[4];
      $ingreso=$datos[5];
      $gnc=$datos[6];
      $categ=$datos[7];
      $PerIngreso=$datos[8];
      $renglones .= $patente.";".$salida.";".$valor.";".$PerEgreso.";".$ingreso.";".$gnc.";".$categ.";".$PerIngreso;
   }

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=salidas.csv");
echo $renglones;

?>