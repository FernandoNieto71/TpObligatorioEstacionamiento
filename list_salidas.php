<?php


/*$Patente="ebb666";
$fechaIngreso= date("Y-m-d  h:i:sa");
$fechaSalida=date("Y-m-d h:i:sa");
$importe="100";
$contador=0;
$renglones="";
$usuario="anonimo";*/

$listadoEstacionado=array();
$archivo=fopen("salidas.txt", "r");

while(!feof($archivo)){
    $renglon=fgets($archivo);
    $datosEstacionado=explode("=>", $renglon);
    if(isset($datosEstacionado[1]))//[0]!=" ")
    {
      $listadoEstacionado[]=$datosEstacionado;
      
    }
  }
fclose($archivo);
echo "Listado de salidas\n";
foreach ($listadoEstacionado as $datos) {
   if(isset($datos[1])){
      $renglones .= $datos[0].";".$datos[2].";".$datos[3] .";".$datos[4];//."\n"
   }
/*$renglones=$listadoEstacionado;
$contador=0;
while ($contador<6)
{
   $renglones .= $Patente.";".$fechaIngreso.";".$usuario .";".$fechaSalida."\n";
   echo $renglones[1];
    $contador++;*/

}
//aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=archivo.csv");
echo $renglones;

?>