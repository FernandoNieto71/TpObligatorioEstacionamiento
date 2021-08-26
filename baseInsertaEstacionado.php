<?php
include_once ("Clase/AccesoBase.php");
include_once ("Clase/baseEstacionados.php");

$unEstacionado=new baseEstacionados();
$unEstacionado->id_usuario=4;
$unEstacionado->id_vehiculo=4;
$unEstacionado->fechaingreso='2021-08-20';
$ultimoID=$unEstacionado->insertarUsuarioParametros();
print("Ultimo ID: $ultimoID <br>");
https://onlinegdb.com/1VMCPbBs5   pagina gdb
?>