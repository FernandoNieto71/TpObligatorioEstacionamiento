<?php
include_once ("clase/AccesoBase.php");
include_once ("clase/claseVehiculo.php");

//$listadoPatentes=claseVehiculo::TraerPatenteVehiculo();
$listadoPatentes=claseVehiculo::TraerTodoLosVehiculos();

$patente="";
foreach($listadoPatentes as $dato){
	$patente.="'".$dato->patente."',";
}
var_dump($patente);




?>


