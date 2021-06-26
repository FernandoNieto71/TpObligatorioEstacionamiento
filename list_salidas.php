<?php

include_once "funcionesEstacionamiento.php";
$renglones="";

$listadoEstacionado=array();
$listadoEstacionado=recorreTicket();

foreach ($listadoEstacionado as $datos) {
   if(isset($datos[0])){
      $patente=$datos[0];
      $ingreso=$datos[1];
      $salida=$datos[2];
      $valor=$datos[3];
      $PerEgreso=$datos[4];
      $gnc=$datos[5];
      $categ=$datos[6];
      
      //$renglones .= $patente.";".$salida.";".$valor.";".$PerEgreso.";".$ingreso.";".$gnc.";".$categ.";".$PerIngreso;
   }

}
echo "Ticket Salida de Vehiculo\n";
echo "Patente: ".$patente."\n";
echo "Entrada: ".$ingreso."\n";
echo "Salida: ".$salida."\n";
$vGnc="Sin";
if($gnc==1){
   $vGnc="Con";
}
echo "GNC: ".$vGnc."\n";
switch($categ){
   case 'N':
      $mcateg="Normal";
      break;
   case 'C':
      $mcateg="Camioneta";
      break;
   case 'A':
      $mcateg="Alta Gama";
      break;
}
echo "Categoria: ".$mcateg."\n";
echo "Cobrado: ".$valor."\n";
echo "PersonaEgreso: ".$PerEgreso."\n";

//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=salidas.csv");
//echo $renglones;

?>