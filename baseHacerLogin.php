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

include_once ("clase/AccesoBase.php");
include_once ("clase/ClaseUsuario.php");
$unEmail=new claseUsuario();
$unEmail->email=$mail;
$buscadoID=$unEmail->traerDatosUsuario();
if(isset($buscadoID->id)){
	if($buscadoID->password == $clave){
		setcookie("mail",$mail);
        $nada="ingrese_patente del";
        $usuarioID=$buscadoID->id;
		header ("Location: baseEstacionar.php?&correo=$mail&patente=$nada&usuarioID=$usuarioID");
	}
	else{
		echo "error en clave";
		header ("Location: baseLogin.php");
	}
	
}
else{
	header ("Location: baseRegistro.php");
}

/*
//include_once "funcionesLogin.php";

//devuelve los datos de usuarios
//$listadoDeUsuario=cargaUsuarios();


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
		
        setcookie("mail",$mail);
        $nada="ingrese_patente del";
		header ("Location: estacionar.php?&correo=$mail&patente=$nada");
		break;
}
    */

?>