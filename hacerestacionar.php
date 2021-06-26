<?php

/*
echo "<br/>";

var_dump($_POST);
echo $_POST["movimiento"];
echo "<br>";
echo $_POST["patente"];*/
//vincula con archivo que contiene funciones
include_once "funcionesEstacionamiento.php";
include_once "estacionamiento.php";

if(isset($_POST["movimiento"]) && isset($_POST["patente"])){
	$correo=$_POST["correo"];
	$movimiento=$_POST["movimiento"];
	$patente=$_POST["patente"];
	
	
}else{
	//die();
	//header ("Location: error.php");
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
//$funcion que guarda en archivo el ingreso
guardarEstacionado($renglon);
//estacionamiento::crearTablaEstacionado();
include_once "generarAutocompletar.php";  
$nada="ingrese_patente a";
estacionamiento::crearTablaCobro("",$valor,3,$entrada,$salida,$segundo);
header ("Location: estacionar.php?&correo=$correo");//?&correo=$correo&patente=$nada
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
			//llama a funcion que calcula el tiempo
			$entrada=$datos[2];
			$segundo=calculaTiempo($datos[2], $salida);
			
			//funcion que devuelve valor
			$valor=calculaImporte($segundo,$datos[3],$datos[4]);
			$renglon="\n".$patente."=>".$movimiento."=>".$egreso."=>".$valor."=>".$correo."=>".$datos[2]."=>".$datos[3]."=>".$datos[4]."=>".$datos[5];
			guardarSalidas($renglon);
			$ticket="\n".$patente."=>".$entrada."=>".$egreso."=>".$valor."=>".$correo."=>".$datos[3]."=>".$datos[4];
			generaTicket($ticket);
			
			$NoExiste = 2;
			//echo "<br>entrada ".$datos[2]." salida ".$salida." duracion ".$minutos. " valor $".$valor;
			//$mostrar="entrada=$datos[2]-salida=$salida-duracion=$minutos-valor=$valor";
			$mostrar="valor=$valor a";
			modificarEstacionado($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
			//estacionamiento::crearTablaSalidas();
			
			//no funciona;
			break;
			} else {
			$NoExiste=1;
			break;
			} 
		
		}

	}
	
	estacionamiento::crearTablaCobro($patente,$valor,$NoExiste,$entrada,$salida,$segundo);

	header ("Location: estacionar.php?&correo=$correo"); 		//&correo=$correo&patente=$mostrar");
}
//var_dump($listadoDeUsuario);
  

?>