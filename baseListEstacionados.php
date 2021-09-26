<?php

include_once ("clase/AccesoBase.php");
include_once ("clase/baseEstacionados.php");
$listadoEstacionado = baseEstacionados::mostrarEstacionadosCompleto();

$renglones="";

echo "Listado Estacionados\n";
echo "Patente;Entrada;GNC;Categoria;PersonaIngreso\n";
foreach ($listadoEstacionado as $datos) {
 if(isset($datos->patente)){
      $patente=$datos->patente;
      $ingreso=$datos->ingreso;
      if($datos->gnc){
      $gnc="Con GNC";
      }  else{
         $gnc="Sin GNC";
      }
      switch($datos->categoria){
         case 'S':
            $categ="Normal";
            break;
         case 'A':
            $categ="Alta Gama";
            break;
         case 'C':
            $categ="Camioneta";
            break;
      } 
      $PerIngreso=$datos->email;
      $renglones .= $patente.";".$ingreso.";".$gnc.";".$categ.";".$PerIngreso."\n";
   }

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=estacionados.csv");
echo $renglones;

?>