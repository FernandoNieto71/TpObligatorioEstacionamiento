<?php


class claseClientes
{
	public $id;
 	public $mail;
  	public $fecha;
  	public $titulo;
  	public $observaciones;
  	public $leido;
  	
  	
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->mail."  ".$this->fecha."  ".$this->titulo."  ".$this->observaciones."  ".$this->leido;
	}

    public static function TraerTodosclientes()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT mail, fecha, titulo, observaciones, leido FROM clientes");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseclientes');		
	}
	
	public function InsertarclientesParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into clientes (mail, fecha, titulo, observaciones, leido) values(:mail,:fecha,:titulo,:observaciones,:leido)");
				$consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
				$consulta->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
				$consulta->bindValue(':observaciones', $this->observaciones, PDO::PARAM_STR);
				$consulta->bindValue(':leido', $this->leido, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }	
	public static function mostrarTablaclientes()
	{
		$clientess = claseClientes::TraerTodosclientes();
	
		if(isset($clientess))
		{
			
			echo "<table border=1 cellpadding=5px>";
			echo "<tr><th colspan =\"5\" align= \"center\">clientess</th></tr>";
			echo "<th> Mail </th>";
			echo "<th> fecha </th>";
			echo "<th> Motivo </th>";
			echo "<th> Observaciones </th>";
			echo "<th> leido </th>";

			foreach($clientess as $datos)
			{
				
				echo "<tr><td>$datos->mail</td>";
				echo "<td>$datos->fecha</td>";
				echo "<td>$datos->titulo</td>";
				echo "<td>$datos->observaciones</td>";
				echo "<td>$datos->leido</td></tr>";
			}
	
			echo "</table>";
	
		}
	}	 	

}
?>