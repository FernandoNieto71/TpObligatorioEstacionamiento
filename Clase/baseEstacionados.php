<?php
include_once "basefuncionesCalculo.php";

class baseEstacionados
{
	public $id;
 	public $id_usuario;
  	public $id_vehiculo;
  	public $fechaingreso;
  	public $fechaegreso;
  	public $importe;
  	public $id_usu_egreso;

  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->id_usuario."  ".$this->id_vehiculo."  ".$this->fechaingreso."  ".$this->fechaegreso."  ".$this->importe."  ".$this->id_usu_egreso;
	}

  	public static function TraerTodoLosEstacionados()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, id_vehiculo, fechaingreso, fechaegreso, importe, id_usu_egreso FROM estacionados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');		
	}

	public static function TraerUnRegistro($id) 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, id_vehiculo, fechaingreso, fechaegreso, importe, id_usu_egreso FROM estacionados where id = $id");
			$consulta->execute();
			$idBuscado= $consulta->fetchObject('baseEstacionados');
			return $idBuscado;				

			
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
				set fechaegreso='$this->fechaegreso',
				importe='$this->importe',
				id_usu_egreso='$this->id_usu_egreso'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function ModificarEstacionadoUsu($idU)
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				update estacionados 
				set fechaegreso='$this->fechaegreso',
				importe='$this->importe',
				id_usu_egreso=$idU 
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

	 public function InsertarUsuarioParametros()
	 {
				$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
				$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into estacionados (id_usuario, id_vehiculo, fechaingreso) values(:id_usuario,:id_vehiculo,:fechaingreso)");
				/*$consulta =$Obj_Acceso_Datos->RetornarConsulta("INSERT into estacionados (id_usuario, id_vehiculo) values(:id_usuario,:id_vehiculo)");*/
				$consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_STR);
				$consulta->bindValue(':id_vehiculo', $this->id_vehiculo, PDO::PARAM_STR);
				$consulta->bindValue(':fechaingreso', $this->fechaingreso, PDO::PARAM_STR);
				$consulta->execute();		
				return $Obj_Acceso_Datos->RetornarUltimoIdInsertado();
	 }

	 	public function traerDatosEstacionados()
	 {

			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("
				SELECT * FROM estacionados where id_vehiculo = :id_vehiculo and fechaingreso is not null and fechaegreso is null");
				$consulta->bindValue(':id_vehiculo',$this->id, PDO::PARAM_INT);
				$consulta->execute();
				$UsuarioBuscado= $consulta->fetchObject('baseEstacionados');//fetchColumn();
				return $UsuarioBuscado;

	 }

	
	 //con los datos usuario y vehiculo ID genera un nuevo estacionado
	public static function estacionarUnVehiculoUsuario($usuario, $vehiculo){
	 	$unEstacionardo=new baseEstacionados();
		$unEstacionardo->id_usuario=$usuario;
		$unEstacionardo->id_vehiculo=$vehiculo;
		date_default_timezone_set("America/Argentina/Buenos_Aires");

		$date=date("Y-m-d H:i:s");
		$unEstacionardo->fechaingreso=$date;
		$estacionadID=$unEstacionardo->insertarUsuarioParametros();
		return $estacionadID;
	 }

	 
	 public static function salidaEstacionado($idV, $idU){
		$buscarSalida=new baseEstacionados();
		$buscarSalida->id=$idV;
		$salidaID=$buscarSalida->traerDatosEstacionados();
		$buscarSalida->id=$salidaID->id;
		date_default_timezone_set("America/Argentina/Buenos_Aires");
		$date=date("Y-m-d H:i:s");
		$buscarSalida->fechaegreso=$date;
		$buscarSalida->importe=$buscarSalida->buscaImporte($salidaID->fechaingreso, $salidaID->id_vehiculo, $date);
		$buscarSalida->id_usu_egreso=$idU;
		$buscarSalida->ModificarEstacionado();	 	
	 }

	 public static function buscaImporte($entrada, $id_vehiculo,$salida){
	 	$segundo=calculaTiempo($entrada, $salida);
	 	return calculaImporte($segundo,$id_vehiculo);

	 }


	 public static function mostrarEstacionadosCompleto(){
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.patente as patente, c.email as email, b.gnc as gnc, b.clase as categoria, a.fechaingreso as ingreso FROM estacionados as a inner join vehiculo as b on a.id_vehiculo = b.id inner join usuarios as c on a.id_usuario = c.id WHERE fechaegreso is null");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
	 }

	 public static function mostrarRetiradosCompleto(){
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.patente as patente, c.email as email, b.gnc as gnc, b.clase as categoria, a.fechaingreso as ingreso, a.fechaegreso as salida, a.importe as importe FROM estacionados as a inner join vehiculo as b on a.id_vehiculo = b.id inner join usuarios as c on a.id_usu_egreso = c.id WHERE fechaegreso is not null");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
	 }

	 public static function TraerEstacionadosEstacionar(){
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.patente as patente, c.email as email, a.fechaingreso as ingreso, b.foto as foto FROM estacionados as a inner join vehiculo as b on a.id_vehiculo = b.id inner join usuarios as c on a.id_usuario = c.id WHERE a.fechaegreso is null");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
	 }





	 public static function mostrarTablaEstacionados()
	{
		$estacionados = baseEstacionados::TraerEstacionadosEstacionar();
	
		if(isset($estacionados))
		{
			
			echo "<table border=1 cellpadding=5px>";
			echo "<tr><th colspan =\"4\" align= \"center\">Estacionados</th></tr>";
			echo "<th> Patente </th>";
			echo "<th> Usuario Ingreso </th>";
			echo "<th> Fecha Ingreso </th>";
			echo "<th> Foto </th>";

			foreach($estacionados as $datos)
			{
				
				echo "<tr><td>$datos->patente</td>";
				echo "<td>$datos->email</td>";
				echo "<td>$datos->ingreso</td>";
				echo "<td><img src='$datos->foto' width=\"50\" height=\"50\"></td></tr>";
			}
	
			echo "</table>";
	
		}
	}

		 public static function TraerEstacionadosSalidos(){
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.patente as patente, c.email as email, a.fechaegreso as egreso, a.importe as importe FROM estacionados as a inner join vehiculo as b on a.id_vehiculo = b.id inner join usuarios as c on a.id_usu_egreso = c.id WHERE a.fechaegreso is not null");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
	 }





	 public static function mostrarTablaSalidos()
	{
		$estacionados = baseEstacionados::TraerEstacionadosSalidos();
	
		if(isset($estacionados))
		{
			
			echo "<table border=1 cellpadding=5px>";
			echo "<tr><th colspan =\"4\" align=\"center\">Salidas</th></tr>";
			echo "<th> Patente </th>";
			echo "<th> Usuario Engreso </th>";
			echo "<th> Fecha Egreso </th>";
			echo "<th> Importe </th>";

			foreach($estacionados as $datos)
			{
				
				echo "<tr><td>$datos->patente</td>";
				echo "<td>$datos->email</td>";
				echo "<td>$datos->egreso</td>";
				echo "<td>$datos->importe</td></tr>";
			}
	
			echo "</table>";
	
		}
	}




	 	public static function traerDatosSalido() 
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.patente as patente, c.email as email, a.fechaegreso as egreso, a.importe as importe FROM estacionados as a inner join vehiculo as b on a.id_vehiculo = b.id inner join usuarios as c on a.id_usu_egreso = c.id where a.fechaegreso is not null order by a.fechaegreso DESC LIMIT 1");
			$consulta->execute();
			$idBuscado= $consulta->fetchObject('baseEstacionados');
			return $idBuscado;				

			
	}

		 public static function mostrarCobroSalido()
	{
		//$id = 29;
		$estacionados = baseEstacionados::traerDatosSalido();
	
		if(isset($estacionados))
		{
			echo "<table border=1 cellpadding=5px>";
			echo "<td colspan =\"2\" align = \"center\">TICKET</td>";
			echo "<tr><th> Patente </th>";
			echo "<td>$estacionados->patente</td></tr>";
			echo "<tr><th> Usuario Egreso </th>";
			echo "<td>$estacionados->email</td></tr>";
			echo "<tr><th> Fecha Egreso </th>";
			echo "<td>$estacionados->egreso</td></tr>";
			echo "<tr><th> Importe </th>";
			echo "<td>$estacionados->importe</td></tr>";
				
			echo "</table>";
	
		}
	}

  	public static function TraerCantidadEstacionados()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT count(*) as estacionados FROM `estacionados` WHERE fechaingreso is not null and fechaegreso is null");
			$consulta->execute();			
			//return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			return $consulta->fetchColumn(0);	
	}

  	public static function TraerCantidadSalidos()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT count(*) as estacionados FROM `estacionados` WHERE fechaingreso is not null and fechaegreso is not null");
			$consulta->execute();			
			//return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			return $consulta->fetchColumn(0);	
	}	

  	public static function TraerCantidadEstacionadosUsuario()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, count(*) as cantidad FROM `estacionados` as a inner join usuarios as b on b.id = a.id_usuario WHERE a.fechaingreso is not null and a.fechaegreso is null group by email");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			//return $consulta->fetchObject('baseEstacionados');	

			
	}	

  	public static function TraerCantidadSalidosUsuario()
	{
			$Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); 
			$consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT b.email as email, count(*) as cantidad, sum(a.importe) as monto FROM `estacionados` as a inner join usuarios as b on b.id = a.id_usuario WHERE a.fechaingreso is not null and a.fechaegreso is not null group by email");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, 'baseEstacionados');	
			//return $consulta->fetchObject('baseEstacionados');	

			
	}		

}
?>