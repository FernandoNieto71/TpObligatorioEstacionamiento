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
$unEmail=new claseUsuario();
$unEmail->email=$mail;
$buscadoID=$unEmail->traerDatosUsuario();
if(isset($buscadoID->id)){
	echo "ya existe el usuario";
}
else{
	//echo "no lo encontro";
	if(!($clave==$copiaclave)){
		header ("Location: baseRegistro.php");
	} 
	else{
		$unUsuario=claseUsuario::dameUnUsuario($name, $mail, $clave);
		$ultimoID=$unUsuario->insertarUsuarioParametros();
		header ("Location: baseRegistro.php");
	}
}
// revisa si existe el usuario 
/*$pasar=
if($pasar == 0){
	if($clave==$copiaclave){
		date_default_timezone_set("America/Argentina/Buenos_Aires");
		$ahora=date("Y-m-d H:i:s");
		$renglon="\n".$mail."=>".$clave."=>".$ahora;
		$archivo=fopen("usuarios.txt", "a");
		fwrite($archivo, $renglon);
		fclose($archivo);
		header ("Location: login.php");
	}
	else{
		echo "Error en CLAVE!!";
	}	
} else {
	header ("Location: errorUsuario.php");
}*/

/*
//inserta en usuarios el nuevo usuario

$unUsuario=claseUsuario::dameUnUsuario($_POST["nombre"], $_POST["correo"], $_POST["clave"]);
$ultimoID=$unUsuario->insertarUsuarioParametros();

//print("Ultimo ID: $ultimoID <br>");
*/


?>