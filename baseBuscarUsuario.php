<?php
include_once ("Clase/AccesoBase.php");
include_once ("Clase/claseUsuario.php");

$unEmail=new claseUsuario();
$unEmail->email='fernando@mail.com';
$buscadoID=$unEmail->traerIdUsuario();
var_dump($buscadoID);
print("<br>Buscado: $buscadoID->id $buscadoID->email $buscadoID->password <br>");

?>