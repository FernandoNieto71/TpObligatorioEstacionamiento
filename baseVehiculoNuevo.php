<?php
//var_dump($_GET);
//&& isset($_POST["patente"]))
if(isset($_GET["correo"])) {
//$correo = $_GET["correo"];
$correo=htmlspecialchars($_COOKIE["mail"]);
$usuarioID=$_GET["usuario"];
$patente = $_GET["patente"];
}
else {
  //$correo ="";
  header ("Location: error.php");
}
/*if(isset($_GET["patente"])) {
//$patente = $_GET["patente"];
}
else {
  $patente =" ";
}*/
//echo "el correo es ".$correo;
include_once "estacionamiento.php";
estacionamiento::crearTablaEstacionado();
estacionamiento::crearTablaSalidas();
/*echo '¡Hola ' . htmlspecialchars($_COOKIE["mail"]) . '!';
$correo=htmlspecialchars($_COOKIE["mail"]);*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Movimiento de playa</title>
    <link rel="shortcut icon" href="imagen/favicon.ico">
    <?php 
    //include_once("titulo.php");
    ?>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/funcionAutoCompletar.js"></script>
 


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
  <h5 class="my-0 mr-md-auto font-weight-normal">Ingrese Nuevo Vehiculo</h5>

  
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Estacionamiento Wilde</h1>
  <?php
    echo "<h3>¡Hola " . htmlspecialchars($_COOKIE["mail"]) . "!</h3>";
  ?>
  <p class="lead">Bienvenidos al formulario de ingreso de vehiculos nuevos de nuestra playa de estacionamiento. <br>
  Ingrese el numero de dominio, saque foto al vehiculo y seleccione Ingresar</p>
</div>



<div class ="justify-content-center">
  <div class="container">
    <!--div class="card-deck mb-3 text-center"-->

      <form id="miform"  action="baseHacerVehiculo.php" method="post"><!--action="primerPag.html"-->
        <input name="correo" type="hidden" id="correo" class="btn btn-lg btn-block btn-outline-primary mayusc-text" value="<?php echo $correo;?>"> 
        <br>
        <!--input name="patente" type="text" id="patente" class="btn btn-lg btn-block btn-outline-primary mayusc-text"-->
        <input name="patente" type="text" id="autocomplete" class="recuadro"  value="<?php echo $patente; ?>"> <!--placeholder="Ingrese Patente" required autofocus -->
        <ul class="list-unstyled mt-3 mb-4">
         <h5 align = "center">Patente del Vehiculo</h5>
         <br>
         <div style="text-align:center;">
         <a class="btn btn-primary btn-lg" href="webcam-master/webcam.php?patente=$patente" role="button">Usar Webcam </a>
         <br><br>
         <input name="color" type="text" id="autocomplete" class="recuadro" ><br>
         <h5 align = "center">Color del Vehiculo</h5>
         <br>
         <table>
          <tr>
            <input name="categoria" type="radio" value="S" checked> Normal  <input name="categoria" type="radio" value="C"> Camioneta <input name="categoria" type="radio" value="A"> Alta Gama 
          </tr>
          <tr>
            <br>
            <br>
          </tr>
          
          <tr>
            <input name="gnc" type="checkbox" id="decla" value="1" "text-align:center; vertical-align: middle;"> Vehiculo a GNC</td>
          </tr>
        </table>
      </div>
        </ul>
        
        <div align = "center">
         
        </div>
        <br/>
        <div align = "center">
          <input type="submit" value="Enviar">
        </div>

      </form>

    <!--/div-->
  </div>
</div>

<br><br>
</div>


 
</div>


    
  </body>
</html>


