<?php

/*
echo "<br/>";

var_dump($_POST);
echo $_POST["movimiento"];
echo "<br>";
echo $_POST["patente"];*/
//vincula con archivo que contiene funciones
/*include_once "funcionesEstacionamiento.php";
include_once "estacionamiento.php";*/
include_once ("clase/AccesoBase.php");
include_once ("clase/claseVehiculo.php");
include_once ("clase/baseEstacionados.php");
include_once ("clase/ClaseUsuario.php");

if(isset($_POST["movimiento"]) && isset($_POST["patente"])){
	$correo=$_POST["correo"];
	$movimiento=$_POST["movimiento"];
	$patente=$_POST["patente"];
	//$usuarioID=$_POST["usuarioID"];
	
}else{
	//die();
	//header ("Location: error.php");
}
//$usuarioID=claseUsuario::usuarioEstacionar($correo);
$usuarioID=claseUsuario::buscaUsuario($correo);

$buscadoID=claseVehiculo::vehiculoEstacionar($patente);
//var_dump($buscadoID);
if(!$buscadoID){
	//aca va la pagina de la carga del nuevo vehiculo
	header ("Location: baseVehiculoNuevo.php?&correo=$correo&usuario=$usuarioID->id&patente=$patente");

}



if($movimiento=='I'){
	//insertar estacionado
	$estacionadID=baseEstacionados::estacionarUnVehiculoUsuario($usuarioID->id, $buscadoID->id);
	header ("Location: baseEstacionar.php?&correo=$correo&patente=$patente");
}
else{
	baseEstacionados::salidaEstacionado($buscadoID->id);
	header ("Location: baseEstacionar.php?&correo=$correo&patente=$patente");
}




?>