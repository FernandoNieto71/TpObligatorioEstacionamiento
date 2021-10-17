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
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT patente, color, foto, gnc, clase FROM Vehiculo");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseVehiculo');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT patente, color, foto, gnc, clase FROM Vehiculo where id = $id");
			$consulta->execute();
			$vehiculoBuscado= $consulta->fetchObject('claseVehiculo');
			return $vehiculoBuscado;				

			
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

  	public static function TraerPatenteVehiculo()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT patente FROM Vehiculo");
			$consulta->execute();			
			return $consulta->fetchColumn();		
	}


	 public function ModificarVehiculo()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update Vehiculo
				set patente='$this->patente',
				color='$this->color',
				foto='$this->foto'
				gnc= '$this->gnc';
				clase='$this->clase';
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarVehiculoParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into Vehiculo (patente,color,foto,gnc,clase)values(:patente,:color,:foto,:gnc,:clase)");
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				$consulta->bindValue(':gnc', $this->gnc, PDO::PARAM_STR);
				$consulta->bindValue(':clase', $this->clase, PDO::PARAM_STR);
				//$consulta->bindValue(':fechainscrip', $this->fechainscrip, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

	 public static function dameUnVehiculo($patente, $color, $foto, $gnc, $clase){
	 		$unVehiculo=new claseVehiculo();
	 		$unVehiculo->patente=$patente;
			$unVehiculo->color=$color;
			$unVehiculo->foto=$foto;
			$unVehiculo->gnc=$gnc;
			$unVehiculo->clase=$clase;

			return $unVehiculo;
	 }

	 //nuevo -> busca patente si existe , luego exista devuelve id vehiculo
	 public static function vehiculoEstacionar($patente){

	 	$unVehiculo=new claseVehiculo();
		$unVehiculo->patente=$patente;
		$buscadoID=$unVehiculo->traerIDVehiculo();
		return $buscadoID;
	 }

	 //crea un nuevo vehiculo es llamado en pantalla
	 public static function vehiculoNuevo($patente,$color,$foto,$gnc,$clase){
	 	$unVehiculo=new claseVehiculo();
		$unVehiculo->patente=$patente;
		$unVehiculo->color=$color;
		$unVehiculo->foto=$foto;
		$unVehiculo->gnc=$gnc;
		$unVehiculo->clase=$clase;
		$buscadoID=$unVehiculo->InsertarVehiculoParametros();

	}
		

}
?>