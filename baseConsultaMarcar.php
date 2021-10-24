<?php
include_once "clase/AccesoBase.php";
include_once "clase/claseConsulta.php";
if(isset($_POST["marcar"])){
	foreach($_POST['marcar'] as $marcado){
	//echo $marcado."<br>";
		claseConsulta::marcaConsultaLeido($marcado);
		header ("Location: baseMostrarConsultas.php");
}
} else{
	echo "NO";

}


?>