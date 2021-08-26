<?php
try
   {



	$db = new PDO('mysql:host=localhost;dbname=estacionamiento;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$sql = $db->query('SELECT usuarios.nombre as nombre, usuarios.email as email, vehiculo.color as color 				FROM `estacionados`
						inner join usuarios on usuarios.id = estacionados.id_usuario
						inner join vehiculo on vehiculo.id = estacionados.id_vehiculo
						WHERE estacionados.id = 1 ');

                          
	$catidadFilas = $sql->rowCount();

	echo "cantidad de filas: ".$catidadFilas."<br>";


	$resultado = $sql->fetchall();
                       
                          
	foreach($resultado as $fila)
		{
		echo "nombre: ".$fila[0];
		echo "-- eMail: ".$fila['email'];
		echo "-- Color: ". $fila['color'].'<br />';

		}

    } 
catch(PDOException $ex)
	{
    echo "error ocurrido!"; 
    echo $ex->getMessage();
    }


?>