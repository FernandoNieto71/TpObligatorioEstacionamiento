<?php


class claseVehiculo
{
	public $id;
 	public $patente;
  	public $color;
  	public $foto;
  	
  	
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->patente."  ".$this->color."  ".$this->foto;
	}

  	public static function TraerTodoLosVehiculos()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT patente, color, foto FROM Vehiculo");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseVehiculo');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT patente, color, foto FROM Vehiculo where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('claseVehiculo');
			return $cdBuscado;				

			
	}

	public function traerIDVehiculo()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				SELECT id FROM Vehiculo where patente = :patente");	
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_INT);		
				$consulta->execute();
				$VehiculoBuscado= $consulta->fetchObject('claseVehiculo');//fetchColumn();
				return $VehiculoBuscado;

	 }

	 public function ModificarVehiculo()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update Vehiculo
				set patente='$this->patente',
				color='$this->color',
				foto='$this->foto' 
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarVehiculoParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into Vehiculo (patente,color,foto)values(:patente,:color,:foto)");
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				//$consulta->bindValue(':fechainscrip', $this->fechainscrip, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

	 public static function dameUnVehiculo($patente, $color, $foto){
	 		$unVehiculo=new claseVehiculo();
	 		$unVehiculo->patente=$patente;
			$unVehiculo->color=$color;
			$unVehiculo->foto=$foto;
			return $unVehiculo;
	 }

	 //nuevo
	 public static function vehiculoEstacionar($patente){

	 	$unVehiculo=new claseVehiculo();
		$unVehiculo->patente=$patente;
		$buscadoID=$unVehiculo->traerIDVehiculo();
		if(!isset($buscadoID->id)){
			//insertar en vehiculo
			$unVehiculo->color="azul";
			$unVehiculo->foto="una foto";
			$buscadoID=$unVehiculo->InsertarVehiculoParametros();
			//var_dump($buscadoID);	
			$unVehiculo->patente=$patente;
		$buscadoID=$unVehiculo->traerIDVehiculo();		
		}

		return $buscadoID;
	 }

}
?>