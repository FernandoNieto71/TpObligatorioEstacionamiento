<?php
include_once ("Clase/AccesoBase.php");
include_once ("Clase/baseEstacionados.php");

$borrarUnEstacionado=new baseEstacionados();
$borrarUnEstacionado->id=2;
$registroBorrado=$borrarUnEstacionado->borrarFilaEstacionado();
print("Registros Borrados: $registroBorrado <br>");
//https://onlinegdb.com/Her-f2_3H   pagina gdb
?>