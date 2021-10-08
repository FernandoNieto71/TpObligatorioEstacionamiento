<?php

include_once ("clase/AccesoBase.php");
include_once ("clase/baseEstacionados.php");
$listadoSalidos = baseEstacionados::mostrarRetiradosCompleto();

$renglones="";


echo "Listado Autos Retirados en el día\n";
echo "Patente;Entrada;GNC;Categoria;PersonaIngreso;Salida;Importe\n";
foreach ($listadoSalidos as $datos) {
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
      $salida=$datos->salida;
      $importe= $datos->importe;
      $renglones .= $patente.";".$ingreso.";".$gnc.";".$categ.";".$PerIngreso.";".$salida.";".$importe."\n";
   }

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=estacionados.csv");
echo $renglones;

?>