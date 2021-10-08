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
//include_once ("clase/baseEstacionados.php");
//include_once ("clase/ClaseUsuario.php");

if(isset($_POST["color"]) && isset($_POST["patente"])){
	$correo=$_POST["correo"];
	$color=$_POST["color"];
	$patente=$_POST["patente"];
	$foto="WebCam-master/archivos/".$_POST["patente"].".jpg";
	if($_POST["gnc"]){
	$gnc=$_POST["gnc"];
	} else {
		$gnc=0;
	}
	$clase=$_POST["categoria"];
	//$buscadoID=
	claseVehiculo::vehiculoNuevo($patente,$color,$foto,$gnc,$clase);
	
	header ("Location: baseEstacionar.php?&correo=$correo&patente=$patente");

	
}else{
	
	//die();
	//header ("Location: error.php");
}

?>