<?php
/*var_dump($_GET);

echo "<br/>";

var_dump($_POST);*/
$mail=$_POST["correo"];
$clave=$_POST["clave"];
$copiaclave=$_POST["copiaclave"];
include_once "funcionesLogin.php";

/* revisa si existe el usuario */
$pasar=revisaUsuario($mail);
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
}

?>