<?php
/*var_dump($_GET);

echo "<br/>";

var_dump($_POST);*/
$mail=$_POST["correo"];
$clave=$_POST["clave"];
$copiaclave=$_POST["copiaclave"];
/*$copiaclave=$_POST["copiaclave"];
echo "Su mail es ".$mail. " , la clave es ".$clave. " y la copia es ".$copiaclave;*/

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

?>