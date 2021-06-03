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
//if(issset())

$listadoDeUsuario=array();
$archivo=fopen("usuarios.txt", "r");
while(!feof($archivo)){
	//echo "renglon: ".fgets($archivo)."<br>";
	$renglon=fgets($archivo);
	$datosDeUnUsuario=explode("=>", $renglon);
	if(isset($datosDeUnUsuario[1]))//[0]!=" ")
	{
		$listadoDeUsuario[]=$datosDeUnUsuario;
	}
	/*var_dump($datosDeUnUsuario);
	echo "<br>";*/
	/*if($datosDeUnUsuario[0]==$mail){
		if($datosDeUnUsuario[1]==$clave){
			echo "Bienvenido";
		}
	}*/
}
fclose($archivo);

//var_dump($listadoDeUsuario);
$ingreso=0;

foreach ($listadoDeUsuario as $datos) {
	if($datos[0]==$mail){
		$ingreso++;
		if($datos[1]==$clave){
			//echo "Bienvenido";
			$ingreso++;
			$ing_clave="Ingreso";
			break;
		}
	}
}
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