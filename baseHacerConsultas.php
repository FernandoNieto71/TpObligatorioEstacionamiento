<?php


include_once ("clase/AccesoBase.php");
include_once ("clase/claseConsulta.php");
include_once("clase/claseUsuario.php");


if(isset($_POST["correo"]) && isset($_POST["comentarios"])){
	$correo=$_POST["correo"];
	$busqueda=claseUsuario::buscaUsuario($correo);
	$buscadoID=$busqueda->id;
	$comentarios=$_POST["comentarios"];
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$date=date("Y-m-d H:i:s");

	claseConsulta::ConsultaNuevo($buscadoID,$comentarios,$date);
	
	header ("Location: baseEstacionar.php?&correo=$correo");

	
}else{
	
	//die();
	//header ("Location: error.php");
}

?>