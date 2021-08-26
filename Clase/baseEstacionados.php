<?php

class baseEstacionados
{
	public $id;
 	public $id_usuario;
  	public $id_vehiculo;
  	public $fechaingreso;
  	public $fechaegreso;
  	public $importe;

  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->id_usuario."  ".$this->id_vehiculo."  ".$this->fechaingreso."  ".$this->fechaegreso."  ".$this->importe;
	}

  	public static function TraerTodoLosEstacionados()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, id_vehiculo, fechaingreso, fechaegreso, importe FROM estacionados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, id_vehiculo, fechaingreso, fechaegreso, importe FROM estacionados where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('baseEstacionados');
			return $cdBuscado;				

			
	}

	public function BorrarFilaEstacionado()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				delete 
				from estacionados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }

	 public function ModificarEstacionado()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update estacionados 
				set id_fechaegreso='$this->fechaegreso',
				importe='$this->importe'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarUsuarioParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into estacionados (id_usuario, id_vehiculo, fechaingreso) values(:id_usuario,:id_vehiculo,:fechaingreso)");
				$consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_STR);
				$consulta->bindValue(':id_vehiculo', $this->id_vehiculo, PDO::PARAM_STR);
				$consulta->bindValue(':fechaingreso', $this->fechaingreso, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

}
?>