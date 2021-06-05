<?php

/*
echo "<br/>";

var_dump($_POST);*/
//vincula con archivo que contiene funciones
include_once "funcionesEstacionamiento.php";
include_once "estacionamiento.php";

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
/*$funcion que guarda en archivo el ingreso*/
guardarEstacionado($renglon);
$nada="";
header ("Location: estacionar.php?&correo=$correo");
} else{
	//echo "patente ".$patente." movimiento ".$movimiento;
	//funcion que busca registros en estacionado y devuelve vector
	//$listadoEstacionado = recorreEstacionado();
	$listadoEstacionado=estacionamiento::leer();
	$NoExiste=0;
	
	foreach ($listadoEstacionado as $datos) {
	if($datos[0]==$patente){
		
		if($datos[1]=='I'){
			//echo "Auto egresado existe";
			$salida=date("Y-m-d H:i:s");
			$egreso=$salida;
			//llama a funcion que calcula el tiempo*/
			$segundo=calculaTiempo($datos[2], $salida);
			
			//funcion que devuelve valor
			$valor=calculaImporte($segundo);
			$renglon="\n".$patente."=>".$movimiento."=>".$egreso."=>".$valor."=>".$correo;
			guardarSalidas($renglon);
			$NoExiste = 2;
			//echo "<br>entrada ".$datos[2]." salida ".$salida." duracion ".$minutos. " valor $".$valor;
			//$mostrar="entrada=$datos[2]-salida=$salida-duracion=$minutos-valor=$valor";
			$mostrar="valor=$valor a";
			modificarEstacionado($datos[0],$datos[1],$datos[2],$dato[3]);
			//no funciona;
			break;
			} else {
			$NoExiste=1;
			break;
			} 
		
		}
	}
	if($NoExiste==1){
		//echo "<br>la patente ".$patente." ya se retiro";
		$mostrar="$patente_se_retiro a";
	}
	if($NoExiste==0){
		//echo "<br>No existe el vehiculo";
		$mostrar="No_existe_vehiculo a";
	}
	//$mostrar="hola";
	header ("Location: estacionar.php?&correo=$correo&patente=$mostrar");
}
//var_dump($listadoDeUsuario);
    

?>