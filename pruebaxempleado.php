<?php
include_once "estacionamiento.php";
$listado=estacionamiento::leer();
$empleado="fernando@mail.com";
echo "empleado= ".$empleado."<br>";
foreach($listado as $dato){
			//if($empleado==$dato[5]){
/*$tablaHtml.="<tr><td>$dato[5] </td>";
$tablaHtml.="<td>$dato[0] </td>";
$tablaHtml.="<td>$dato[2] </td>";
$tablaHtml.="<td width=\"15\"><Img src=\"archivos/".$dato[0].".jpg\" width=\"75%\"/></td></tr>";
			//}*/

if(!$empleado==""){
	if($empleado==rtrim($dato[5])){
		echo $dato[5]."<br>";
		}
	}else{
		echo "no esta";
	}

}

?>