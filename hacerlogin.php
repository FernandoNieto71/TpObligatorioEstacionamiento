<?php

/*
echo "<br/>";

var_dump($_POST);*/
if(isset($_POST["correo"]) && isset($_POST["clave"])){
	$mail=$_POST["correo"];
	$clave=$_POST["clave"];
}else{
	die();
}
include_once "funcionesLogin.php";

//devuelve los datos de usuarios
$listadoDeUsuario=cargaUsuarios();

//var_dump($listadoDeUsuario);
$ingreso=0;

//revisa si existe usuario, si la clave esta bien y da acceso
$ingreso=func_ingreso($listadoDeUsuario, $mail, $clave);


echo $ingreso;
switch($ingreso){
	case 0:
		header ("Location: errorLogin.php");
		break;
	case 1:
		header ("Location: errorLoginClave.php");
		break;
	case 2:
		/*echo '<a href="' . htmlspecialchars("/estacionar.php?correo=&mail=" .
        urlencode($mail)) . '">'."\n";*/
        $nada="ingrese_patente del";
		header ("Location: estacionar.php?&correo=$mail&patente=$nada");
		break;
}
    

?>