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
if(isset($_POST["gnc"])){
	$gnc=$_POST["gnc"];
}else
{
	$gnc=0;
}
if(isset($_POST["categoria"])){
	$categoria=$_POST["categoria"];
}else
{
	$categoria="";
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
if($movimiento=='I'){


$ahora=date("Y-m-d H:i:s");
if($gnc==1){
	//$gnc=1;
}else{
	$gnc=0;
}
$renglon="\n".$patente."=>".$movimiento."=>".$ahora."=>".$gnc."=>".$categoria."=>".$correo;
/*$funcion que guarda en archivo el ingreso*/
guardarEstacionado($renglon);
estacionamiento::crearTablaEstacionado();
$nada="ingrese_patente a";
header ("Location: estacionar.php?&correo=$correo&patente=$nada");
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
			$valor=calculaImporte($segundo,$datos[3],$datos[4]);
			$renglon="\n".$patente."=>".$movimiento."=>".$egreso."=>".$valor."=>".$correo."=>".$datos[2]."=>".$datos[3]."=>".$datos[4]."=>".$datos[5];
			guardarSalidas($renglon);
			
			$NoExiste = 2;
			//echo "<br>entrada ".$datos[2]." salida ".$salida." duracion ".$minutos. " valor $".$valor;
			//$mostrar="entrada=$datos[2]-salida=$salida-duracion=$minutos-valor=$valor";
			$mostrar="valor=$valor a";
			modificarEstacionado($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
			estacionamiento::crearTablaSalidas();
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