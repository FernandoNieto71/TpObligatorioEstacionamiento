<?php
/*var_dump($_GET);

echo "<br/>";

var_dump($_POST);*/
$mail=$_POST["correo"];
$clave=$_POST["clave"];
$copiaclave=$_POST["copiaclave"];
$pasar = 0;
/*$copiaclave=$_POST["copiaclave"];
echo "Su mail es ".$mail. " , la clave es ".$clave. " y la copia es ".$copiaclave;*/
$archivo=fopen("usuarios.txt", "r");
while(!feof($archivo)){
	//echo "renglon: ".fgets($archivo)."<br>";
	$renglon=fgets($archivo);
	$datosDeUnUsuario=explode("=>", $renglon);
	//echo $datosDeUnUsuario[0];
	if($datosDeUnUsuario[0]==$mail)//[0]!=" ")
		{
			//echo "usuario repetido";
			//header ("Location: errorUsuario.php");
			$pasar = 1;
		}
	}
fclose($archivo);
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