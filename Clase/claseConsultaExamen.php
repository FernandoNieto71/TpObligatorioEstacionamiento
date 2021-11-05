<?php


class claseExamen
{
	public $id;
 	public $id_usuario;
  	public $texto;
  	public $fechaevento;
  	public $leido;
  	
  	
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->id_usuario."  ".$this->texto."  ".$this->fechaevento;
	}

  
		public static function TraerConsulta2fechas($fecha1, $fecha2) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, a.texto as mensaje, a.fechaevento as fecha FROM `consulta` as a inner join usuarios as b on a.id_usuario = b.id
				WHERE substring(a.fechaevento,1,10) BETWEEN '$fecha1' and '$fecha2'");
			//$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->execute();
			$idBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, 'claseExamen');
			return $idBuscado;				

			
	}	

	public static function TraerConsulta3fechas($fecha1, $fecha2) 
	{
			/*$valor1 = $fecha1;
			$valor2 = $fecha2;*/
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, a.texto as mensaje, a.fechaevento as fecha FROM `consulta` as a inner join usuarios as b on a.id_usuario = b.id
				WHERE substring(a.fechaevento,1,10) BETWEEN '$fecha1' and '$fecha2'");
			//$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->execute();
			$idBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, 'claseExamen');
			return $idBuscado;				

			
	}	

	public static function TraerConsultaHoras($hora1, $hora2) 
	{		
			$valor1 = $hora1;
			$valor2 = $hora2;
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, a.texto as mensaje, a.fechaevento as fecha FROM `consulta` as a inner join usuarios as b on a.id_usuario = b.id
				WHERE substring(fechaevento,12,20) BETWEEN '$hora1' and '$hora2'");
			//$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->execute();
			$idBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, 'claseExamen');
			return $idBuscado;				

			
	}	

	public static function TraerConsultaAcepta($fecha1, $fecha2, $leido, $acepta) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, a.texto as mensaje, a.fechaevento as fecha, c.email as administrador FROM `consulta` as a inner join usuarios as b on a.id_usuario = b.id inner join usuarios as c on a.id_acepta = c.id WHERE substring(fechaevento,1,10) BETWEEN '$fecha1' and '$fecha2' and leido = '$leido' and acepta = '$acepta'");
			//$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->execute();
			$idBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, 'claseExamen');
			return $idBuscado;				

			
	}			

}
?>