<?php


class claseConsulta
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

  	public static function TraerTodoLosConsultas()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id, id_usuario, texto, fechaevento FROM consulta");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseConsulta');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, texto, fechaevento  FROM consulta where id = $id");
			$consulta->execute();
			$ConsultaBuscado= $consulta->fetchObject('claseConsulta');
			return $ConsultaBuscado;				

			
	}

	public function traerIDConsulta()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				SELECT id FROM consulta where id_usuario = :id_usuario");	
				$consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_INT);		
				$consulta->execute();
				$ConsultaBuscado= $consulta->fetchObject('claseConsulta');//fetchColumn();
				return $ConsultaBuscado;

	 }

  	public static function Traerid_usuarioConsulta()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario FROM Consulta");
			$consulta->execute();			
			return $consulta->fetchColumn();		
	}


	 public function ModificarConsulta()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update Consulta
				set id_usuario='$this->id_usuario',
				texto='$this->texto',
				fechaevento='$this->fechaevento',
				leido='$this->leido'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarConsultaParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into consulta (id_usuario,texto,fechaevento)values(:id_usuario,:texto,:fechaevento)");
				$consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_STR);
				$consulta->bindValue(':texto', $this->texto, PDO::PARAM_STR);
				$consulta->bindValue(':fechaevento', $this->fechaevento, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

	 public static function dameUnConsulta($id_usuario, $texto, $fechaevento){
	 		$unConsulta=new claseConsulta();
	 		$unConsulta->id_usuario=$id_usuario;
			$unConsulta->texto=$texto;
			$unConsulta->fechaevento=$fechaevento;
			
			return $unConsulta;
	 }

	 //nuevo -> busca id_usuario si existe , luego exista devuelve id Consulta
	 public static function ConsultaEstacionar($id_usuario){

	 	$unConsulta=new claseConsulta();
		$unConsulta->id_usuario=$id_usuario;
		$buscadoID=$unConsulta->traerIDConsulta();
		return $buscadoID;
	 }

	 //crea un nuevo Consulta es llamado en pantalla
	 public static function ConsultaNuevo($id_usuario,$texto,$fechaevento){
	 	$unConsulta=new claseConsulta();
		$unConsulta->id_usuario=$id_usuario;
		$unConsulta->texto=$texto;
		$unConsulta->fechaevento=$fechaevento;
		
		$buscadoID=$unConsulta->InsertarConsultaParametros();

	}


	public static function TraerConsultadasIngresadas(){
		$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
		$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT a.id as id, c.email as email, a.texto as texto, a.fechaevento as fecha, a.leido as leido FROM consulta as a inner join usuarios as c on a.id_usuario = c.id ");
			$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, 'claseConsulta');	
	 }

		 public static function mostrarTablaConsultas()
	{
		$consultadas = claseConsulta::TraerConsultadasIngresadas();
	
		if(isset($consultadas))
		{	 
			echo "<form id=\"consultaForm\" action=\"baseConsultaMarcar.php\" method=\"post\">";
			echo "<table border=1cellpadding=1px>";
			echo "<tr><th colspan =\"5\" align= \"center\">Consultas</th></tr>";
			echo "<th> Usuario </th>";
			echo "<th> Texto ingresado por usuario </th>";
			echo "<th> Fecha </th>";
			echo "<th> Leido </th>";
			echo "<th> Marcar </th>";

			foreach($consultadas as $datos) 
			{
				echo "<input type=\"hidden\" value=$datos->id name=\"idConsulta\">";
				echo "<tr><td>$datos->email</td>";
				echo "<td>$datos->texto</td>";
				echo "<td>$datos->fecha</td>";
				if($datos->leido == 1 ){
					echo "<td>Si</td>";
				} else {
					//echo "<td><input type=\"checkbox\" name=\"calcular[ ]\" id=\"ckBox\" value=\"no\" ></td></tr>";
					echo "<td>No</td>";
				}
				echo "<td><input type=\"checkbox\" name=\"marcar[]\" id=\"ckBox\" value=\"$datos->id\"></td></tr>";
 
				
			}
	
			echo "</table>";

			echo "<br>";
        	echo "<div align = \"center\">";
          	echo "<input type=\"submit\" value=\"Enviar\">";
        	echo "</div>";

			echo "</form>";

		}
	}



	 public function ModificarConsultaLeido()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update Consulta
				set leido='$this->leido'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public static function marcaConsultaLeido($id){
	 	$unConsulta=new claseConsulta();
		$unConsulta->id=$id;
		$unConsulta->leido=1;
				
		$buscadoID=$unConsulta->ModificarConsultaLeido();		

	}

	 public static function TraerCantidadNoLeidos()
		{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT count(*) as consulta FROM `consulta` WHERE leido = 0");
			$consulta->execute();			
			//return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			return $consulta->fetchColumn(0);	
		}

	 public static function TraerCantidadTotal()
		{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT count(*) as consulta FROM `consulta` ");
			$consulta->execute();			
			//return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			return $consulta->fetchColumn(0);	
		}

}
?>