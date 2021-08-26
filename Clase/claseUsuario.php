<?php


class claseUsuario
{
	public $id;
 	public $nombre;
  	public $email;
  	public $password;
  	public $fechainscrip;
  	
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->email."  ".$this->password."  ".$this->fechainscrip;
	}

  	public static function TraerTodoLosUsuarios()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT nombre, email, password, fechainscrip FROM usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseUsuario');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT nombre, email, password, fechainscrip FROM usuarios where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('claseUsuario');
			return $cdBuscado;				

			
	}

	public function traerDatosUsuario()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				SELECT id, password FROM usuarios where email = :email");	
				$consulta->bindValue(':email',$this->email, PDO::PARAM_INT);		
				$consulta->execute();
				$UsuarioBuscado= $consulta->fetchObject('claseUsuario');//fetchColumn();
				return $UsuarioBuscado;

	 }

	 public function ModificarUsuario()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update usuarios 
				set nombre='$this->nombre',
				mail='$this->email',
				password='$this->password' 
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarUsuarioParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into usuarios (nombre,email,password)values(:nombre,:email,:password)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
				//$consulta->bindValue(':fechainscrip', $this->fechainscrip, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

	 public static function dameUnUsuario($nombre, $mail, $password){
	 		$unUsuario=new claseUsuario();
	 		$unUsuario->nombre=$nombre;
			$unUsuario->email=$mail;
			$unUsuario->password=$password;
			return $unUsuario;
	 }

}
?>