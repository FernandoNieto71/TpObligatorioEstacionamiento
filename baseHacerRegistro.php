<?php
/*var_dump($_GET);

echo "<br/>";

var_dump($_POST);*/
if(isset($_POST["nombre"]) && isset($_POST["correo"])){
$name=$_POST["nombre"];
$mail=$_POST["correo"];
$clave=$_POST["clave"];
$copiaclave=$_POST["copiaclave"];

} else{
	die();
}
include_once ("clase/AccesoBase.php");
include_once ("clase/ClaseUsuario.php");

$buscadoID=claseUsuario::buscaUsuario($mail);
if(isset($buscadoID->id)){
	echo "ya existe el usuario";
}
else{
	//echo "no lo encontro";
	if(!($clave==$copiaclave)){
		header ("Location: baseRegistro.php");
	} 
	else{
		$ultimoID=claseUsuario::nuevoUsuario($name, $mail, $clave);
		header ("Location: baseLogin.php");
	}
}


?>