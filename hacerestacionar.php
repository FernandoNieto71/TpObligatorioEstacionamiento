<?php

/*
echo "<br/>";

var_dump($_POST);*/

include_once "modificarArchivo.php";

if(isset($_POST["movimiento"]) && isset($_POST["patente"])){
	$correo=$_POST["correo"];
	$movimiento=$_POST["movimiento"];
	$patente=$_POST["patente"];
}else{
	die();
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
if($movimiento=='I'){


$ahora=date("Y-m-d H:i:s");
$renglon="\n".$patente."=>".$movimiento."=>".$ahora."=>".$correo;
$archivo=fopen("estacionado.txt", "a");
fwrite($archivo, $renglon);
fclose($archivo);
echo "se realizo el ingreso ";
$nada="";
header ("Location: estacionar.php?&correo=$correo");
} else{
	//echo "patente ".$patente." movimiento ".$movimiento;
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

	$NoExiste=0;
	
	foreach ($listadoEstacionado as $datos) {
	if($datos[0]==$patente){
		
		if($datos[1]=='I'){
			//echo "Auto egresado existe";
			$salida=date("Y-m-d H:i:s");
			$minutos= (strtotime($salida)-strtotime($datos[2]))/60; 
			$minutos = abs($minutos); 
			$minutos = floor($minutos);
			
			if($minutos<60){
				$valor=$minutos/10;
				$valor=abs($valor);
				$valor=floor($valor);
				$valor=$valor*45;
			} else if($minutos < 180){
				$valor=$minutos/60*150;
			} else if($minutos < 720){
				$valor=450;
			}
			$NoExiste = 2;
			echo "<br>entrada ".$datos[2]." salida ".$salida." duracion ".$minutos. " valor $".$valor;
			//modificarEstacionado($datos[0],$datos[1],$datos[2],$datos[3],$salida,$valor);
			//no funciona;
			break;
			} else {
			$NoExiste=1;
			break;
			} 
		
		}
	}
	if($NoExiste==1){
		echo "<br>la patente ".$patente." ya se retiro";
	}
	if($NoExiste==0){
		echo "<br>No existe el vehiculo";
	}
}
//var_dump($listadoDeUsuario);
    

?>