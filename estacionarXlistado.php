<?php

if(isset($_POST["correo"])) {
$correo = $_POST["correo"];
}
else {
  //$correo ="";
  header ("Location: error.php");
}
/*
if(isset($_GET["patente"])) {
//$patente = $_GET["patente"];
}
else {
  $patente =" ";
}*/
//echo "el correo es ".$correo;
include_once "estacionamiento.php";
estacionamiento::crearTablaEstacionadoXempleado($correo);

echo '¡Hola ' . htmlspecialchars($_COOKIE["mail"]) . '!';
$correo=htmlspecialchars($_COOKIE["mail"]);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <!--title>Movimiento de playa v4.6</title>
    <link rel="shortcut icon" href="imagen/favicon.ico"-->
    <?php 
    include_once("titulo.php");
    ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">

    <!--script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/funcionAutoCompletar.js"></script-->
 


    <!-- Bootstrap core CSS -->
<!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!--no funciona .center-h-->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .center-h {
         justify-content:  center;

      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .recuadro{
        display: flex;
        margin: auto;
        width: 65%;
        height: 35px;
        text-align: center;
        border-color: lightskyblue;
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Estacionamiento Wilde</h5>
</div>   

<div class="card mb-4 shadow-sm">
  <div class="card-header">
        <h4 class="my-0 font-weight-normal">Listado estacionado</h4>
  </div>
 

<div class="card-body">
   <h1 class="card-title pricing-card-title"> <!--small class="text-muted">/ mo</small--></h1>
     <ul class="list-unstyled mt-3 mb-4">
        <li>Muestra los vehiculos</li>
        <li>estacionado con el nombre</li>
        <li>del empleado que lo ingreso </li>
        <li>Puede seleccionar solo uno</li>
          <!--li>Help center access</li-->
    </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-primary">Get started</button-->
</div>


  

    <!--/div-->
 
<table>
  <tr>
  <th width="250"></th>
  <th width="450"></th>
  
  </tr>
  </table>
<table>
<tr>
  <th width="150"></th>
  <th width="650">
    <?php include "tablaEstacionadoXempleado.php";?>
  </th>
 
</tr>
</table>
<br><br>
</div>


  <!--footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="https://uxwing.com/wp-content/themes/uxwing/download/07-design-and-development/bootstrap-4.png" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">&copy; 2017-2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer-->
</div>


    
  </body>
</html>


