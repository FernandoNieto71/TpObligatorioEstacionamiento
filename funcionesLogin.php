<?php

function cargaUsuarios(){
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
		
	}
	fclose($archivo);
	return $listadoDeUsuario;
}

function func_ingreso($listadoDeUsuario, $mail, $clave){
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
	return $ingreso;
}


function revisaUsuario($mail){
	$pasar = 0;
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
	return $pasar;
}

?>

