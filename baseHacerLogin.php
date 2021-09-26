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

$buscadoID=claseUsuario::buscaUsuario($mail);
if(isset($buscadoID->id)){
	if($buscadoID->password == $clave){
		setcookie("mail",$mail);
        $nada="ingrese_patente del";
        $usuarioID=$buscadoID->id;
		header ("Location: baseEstacionar.php?&correo=$mail&patente=$nada&usuarioID=$usuarioID");
	}
	else{
		echo "error en clave";
		header ("Location: baseLogin.php?error=Clave incorrecta");
	}
	
}
else{
	header ("Location: baseRegistro.php?error=No exite usuario, tiene que generar uno nuevo");
}


?>