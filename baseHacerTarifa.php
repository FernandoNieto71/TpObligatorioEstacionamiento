<?php
/*var_dump($_GET);

echo "<br/>";

var_dump($_POST);*/
if(isset($_POST["indice"])){
$indice=$_POST["indice"];
$cgama=$_POST["cgama"];
$agama=$_POST["agama"];
$gnc=$_POST["gnc"];
include_once ("clase/AccesoBase.php");
include_once ("clase/claseTarifa.php");

$tarifaNueva=new claseTarifa();
$tarifaNueva->indice = $indice;
$tarifaNueva->cgama = $cgama;
$tarifaNueva->agama = $agama;
$tarifaNueva->gnc = $gnc;
date_default_timezone_set("America/Argentina/Buenos_Aires");
$date=date("Y-m-d");
$tarifaNueva->fecha = $date;
$tarifaNueva->InsertarTarifaParametros();
header ("Location: baseMostrarTarifas.php?");
} else{
	die();
}

/*include_once ("clase/AccesoBase.php");
include_once ("clase/ClaseUsuario.php");

$buscadoID=claseUsuario::buscaUsuario($mail);
if(isset($buscadoID->id)){
	//echo "ya existe el usuario";
	header ("Location: baseRegistro.php?error=Ya existe el usuario");
}
else{
	//echo "no lo encontro";
	if(!($clave==$copiaclave)){
		header ("Location: baseRegistro.php?error=Usuario inexistente");
	} 
	else{
		$ultimoID=claseUsuario::nuevoUsuario($name, $mail, $clave);
		header ("Location: baseLogin.php");
	}
}*/


?>