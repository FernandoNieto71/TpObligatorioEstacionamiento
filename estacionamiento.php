<?php

include_once "funcionesEstacionamiento.php";

class estacionamiento{
	
	public static function saludar(){
		echo "hola";
	}

	public static function leer(){
		$listaDeAutosLeida=array();
		$listaDeAutosLeida=recorreEstacionado();




		return $listaDeAutosLeida;
	}



	public static function crearTablaEstacionado(){

		$listado=estacionamiento::leer();
		$tablaHtml="<h4>Estacionados</h4><table border=1>";

		$tablaHtml.="<th>";
		$tablaHtml.="patente";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="ingreso";
		$tablaHtml.="</th>";

		foreach($listado as $dato){
			$tablaHtml.="<tr><td>$dato[0] </td>";
			$tablaHtml.="<td>$dato[2] </td></tr>";

		}

		$tablaHtml.="</table>";
		$archivo=fopen("tablaEstacionado.php","w");
		fwrite($archivo,$tablaHtml);
		fclose($archivo);
	}

	public static function GuardarListado($arrayListado){
		$archivo=fopen("estacionado.txt","w");
		foreach($arrayListado as $dato){
			fwrite($archivo,$dato[0]."=>".$dato[1]."\n");
		}
		fclose($archivo);
	}

	public static function leerSalidas(){
		$listaDeAutosLeida=array();
		$listaDeAutosLeida=recorreSalidas();
		return $listaDeAutosLeida;
	}	

	public static function crearTablaSalidas(){

		$listado=estacionamiento::leerSalidas();
		$tablaHtml="<h4>Retirados</h4><table border=1>";

		$tablaHtml.="<th>";
		$tablaHtml.="patente";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="Egreso";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="Importe";
		$tablaHtml.="</th>";

		foreach($listado as $dato){
			$tablaHtml.="<tr><td>$dato[0] </td>";
			$tablaHtml.="<td>$dato[2] </td>";
			$tablaHtml.="<td>$dato[3] </td></tr>";

		}

		$tablaHtml.="</table>";
		$archivo=fopen("tablaSalidas.php","w");
		fwrite($archivo,$tablaHtml);
		fclose($archivo);
	}

}

?>

