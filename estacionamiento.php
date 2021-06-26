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

	public static function crearTablaEstacionadoXempleado($empleado){
		//$empleado="octavio@mail.com";
		$listado=estacionamiento::leer();
		$tablaHtml="<h4>Estacionados</h4><table border=1>";
		$tablaHtml.="<th>";
		$tablaHtml.="empleado";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="patente";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="ingreso";
		$tablaHtml.="</th>";
		$tablaHtml.="<th>";
		$tablaHtml.="imagen";
		$tablaHtml.="</th>";

		foreach($listado as $dato){
			//if($empleado==$dato[5]){
				$tablaHtml.="<tr><td>$dato[5] </td>";
				$tablaHtml.="<td>$dato[0] </td>";
				$tablaHtml.="<td>$dato[2] </td>";
				$tablaHtml.="<td width=\"15\"><Img src=\"archivos/".$dato[0].".jpg\" width=\"75%\"/></td></tr>";
			//}
		}

		$tablaHtml.="</table>";
		$archivo=fopen("tablaEstacionadoXempleado.php","w");
		fwrite($archivo,$tablaHtml);
		fclose($archivo);
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
		$tablaHtml.="<th>";
		$tablaHtml.="imagen";
		$tablaHtml.="</th>";

		foreach($listado as $dato){
			$tablaHtml.="<tr><td>$dato[0] </td>";
			$tablaHtml.="<td>$dato[2] </td>";
			$tablaHtml.="<td width=\"15\"><Img src=\"archivos/".$dato[0].".jpg\" width=\"75%\"/></td></tr>";
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

public static function crearTablaCobro($patente,$valor,$existe,$entrada,$salida,$segundo){

		//$listado=estacionamiento::leerSalidas();
	
		$tablaHtml="<h4>Cobrado</h4><table border=1>";
		$tablaHtml.="<tr>";
		$tablaHtml.="<th>";
		$tablaHtml.="patente";
		$tablaHtml.="</th>";
		$tablaHtml.="<td>";
		$tablaHtml.=$patente;
		$tablaHtml.="</td>";
		$tablaHtml.="</tr>";
		$tablaHtml.="<tr>";
		$tablaHtml.="<th>";
		$tablaHtml.="Importe";
		$tablaHtml.="</th>";
		$tablaHtml.="<td>";
		switch($existe){
			case 0:
				$valor="No Existe Vehiculo";
				$tablaHtml.=$valor;
				$tablaHtml.="</td>";
				break;
			case 1:
			$valor="Vehiculo se retiro";
				$tablaHtml.=$valor;
				$tablaHtml.="</td>";
				break;
			case 2:
				$tablaHtml.=number_format($valor,2,',','.');
				$tablaHtml.="</td>";
				$tablaHtml.="<tr>";
				$tablaHtml.="<th>";
				$tablaHtml.="Hora Entrada";
				$tablaHtml.="</th>";
				$tablaHtml.="<td>";
				$tablaHtml.=$entrada;
				$tablaHtml.="</td>";
				$tablaHtml.="</tr>";
				$tablaHtml.="<tr>";
				$tablaHtml.="<th>";
				$tablaHtml.="Hora Salida";
				$tablaHtml.="</th>";
				$tablaHtml.="<td>";
				$tablaHtml.=$salida;
				$tablaHtml.="</td>";
				$tablaHtml.="</tr>";
				$tablaHtml.="<tr>";
				$tablaHtml.="<th>";
				$tablaHtml.="Duracion";
				$tablaHtml.="</th>";
				$tablaHtml.="<td>";
				$minutos=$segundo/60;
				$tablaHtml.=number_format($minutos,0,',','.');
				$tablaHtml.="</td>";
				//$tablaHtml.="</tr>";								
				break;
			case 3:
			$valor="";
				$tablaHtml.=$valor;
				$tablaHtml.="</td>";
				break;
	}
		//$tablaHtml.="</td>";
		$tablaHtml.="</tr>";
		$tablaHtml.="</table>";
		

		$archivo=fopen("tablaCobro.php","w");
		fwrite($archivo,$tablaHtml);
		fclose($archivo);
		
	}

	public static function retornarListadoAutocomplit() {
		$arrayPatentes = estacionamiento::leer();//"estacionados"
		$listadoRetorno="";
		foreach($arrayPatentes as $datos){
			$listadoRetorno.="\"$datos[0]\","; 
		}
		return $listadoRetorno;
	}

}

?>

