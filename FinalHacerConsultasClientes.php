<?php


include_once ("clase/AccesoBase.php");
include_once ("clase/claseClientes.php");
include_once ("funcionCodigoQR.php");


if(isset($_POST["correo"]) && isset($_POST["motivo"])){
	$unCliente=new claseClientes();
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$date=date("Y-m-d H:i:s");
	$unCliente->mail= $_POST["correo"];
	$unCliente->fecha=$date;
	$unCliente->observaciones=$_POST["comentarios"];
	$motivo = $_POST["motivo"];
	switch($motivo){
		case 1:
			$texto='Opiniones';
			break;
		case 2:
			$texto='Recomendaciones';
			break;
		case 3:
			$texto='Quejas';
			break;
	}
	$unCliente->titulo=$texto;
	$unCliente->leido = 0;
	$unCliente->InsertarclientesParametros();
	$textoCodigo=$_POST["correo"]." ".$date." ".$texto." ".$_POST["comentarios"];
	//var_dump($textoCodigo);
	generaQR($textoCodigo);

	
	
	header ("Location: finalConsultaClientes.php?");

	
}else{
	
	//die();
	//header ("Location: error.php");
}

?>