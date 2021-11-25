<?php


class claseTarifa
{
	public $id;
 	public $fecha;
  	public $indice;
  	public $cgama;
  	public $agama;
  	public $gnc;
  	
  	
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->fecha."  ".$this->indice."  ".$this->cgama."  ".$this->agama."  ".$this->gnc;
	}

    public static function TraerTodosTarifa()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT fecha, indice, cgama, agama, gnc FROM tarifa");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseTarifa');		
	}
	
	public function InsertarTarifaParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into tarifa (fecha, indice, cgama, agama, gnc) values(:fecha,:indice,:cgama,:agama,:gnc)");
				$consulta->bindValue(':fecha',$this->fecha, PDO::PARAM_STR);
				$consulta->bindValue(':indice', $this->indice, PDO::PARAM_STR);
				$consulta->bindValue(':cgama', $this->cgama, PDO::PARAM_STR);
				$consulta->bindValue(':agama', $this->agama, PDO::PARAM_STR);
				$consulta->bindValue(':gnc', $this->gnc, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }	
	public static function mostrarTablaTarifa()
	{
		$tarifas = baseEstacionados::TraerTodosTarifa();
	
		if(isset($tarifas))
		{
			
			echo "<table border=1 cellpadding=5px>";
			echo "<tr><th colspan =\"5\" align= \"center\">Tarifas</th></tr>";
			echo "<th> Fecha </th>";
			echo "<th> Indice </th>";
			echo "<th> Camioneta </th>";
			echo "<th> Alta Gama </th>";
			echo "<th> GNC </th>";

			foreach($tarifas as $datos)
			{
				
				echo "<tr><td>$datos->fecha</td>";
				echo "<td>$datos->indice</td>";
				echo "<td>$datos->cgama</td>";
				echo "<td>$datos->agama</td>";
				echo "<td>$datos->gnc</td></tr>";
			}
	
			echo "</table>";
	
		}
	}	 	

}
?>