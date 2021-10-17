<?php

include_once "basefuncionesEstacionamiento.php";

class estacionamiento{
	

	public static function leer(){
		$listaDeAutosLeida=array();
		$listaDeAutosLeida=TraerPatenteVehiculo();
		/*$listaDePatentes=array();
		//var_dump(listaDeAutosLeida);
		foreach($listaDeAutosLeida->patente as dato){
			if(isset(dato)){
				$listaDePatentes = dato;
			}
		}*/
		return $listaDeAutosLeida;
	}




	public static function leerSalidas(){
		$listaDeAutosLeida=array();
		$listaDeAutosLeida=recorreSalidas();
		return $listaDeAutosLeida;
	}	





}

?>

