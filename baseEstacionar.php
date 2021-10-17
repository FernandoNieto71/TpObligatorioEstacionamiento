<?php
//var_dump($_GET);
//&& isset($_POST["patente"]))
if(isset($_GET["correo"])) {
 
$correo=htmlspecialchars($_COOKIE["mail"]);

if(isset($_GET["usuarioID"])){
  $usuarioID=$_GET["usuarioID"];
  }
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
//include_once "baseEstacionamiento.php";

//hacer
//baseEstacionamiento::crearTablaEstacionado();
//baseEstacionamiento::crearTablaSalidas();
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
  <h5 class="my-0 mr-md-auto font-weight-normal">Estacionamiento Wilde</h5>

  <!nav class="my-2 my-md-0 mr-md-3">

    <a class="p-2 text-dark" href="baselistSalidas.php">Listar Salidas</a>
    <a class="p-2 text-dark" href="baseListEstacionados.php">Listar Entradas</a>
    <a class="p-2 text-dark" href="baseGenSalidasPDF.php">Salida PDF</a>
    <a class="p-2 text-dark" href="baseConsultas.php?&correo">Consultas</a>
    <!--a class="recuadro" href="baseConsultas.php">Consultas</a-->
  <!--/nav-->
  <!--form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
   <p> Enviar mi archivo: <input name="subir_archivo" type="file" /></p>
   <p> <input type="submit" value="Enviar Archivo" /></p>
</form>
  <form enctype="multipart/form-data" action="estacionarXlistado.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" /-->
   <!--p> Listado por empleado <input name="subir_archivo" type="file" /></p-->
   <!--input name="correo" type="text" class="recuadro">
   <p> <input type="submit" value="Listado por empleado" /></p>
</form>  
</nav>
  <a class="btn btn-outline-primary" href="#">Sign up</a-->
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Estacionamiento Wilde</h1>
  <?php
    echo "<h3>¡Hola " . htmlspecialchars($_COOKIE["mail"]) . "!</h3>";
  ?>
  <p class="lead">Bienvenidos a la pagina de tareas de nuestra playa de estacionamiento. <br>
  Ingrese el numero de dominio y seleccione Ingreso o Egreso</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Fraccion hora</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$45 <!--small class="text-muted">/ mo</small--></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Cada 10 minutos.</li>
          <li>Pasado los 60</li>
          <li>minutos se cobra</li>
          <li>por hora.</li>
        </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button-->
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Hora</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$150 <!--small class="text-muted">/ mo</small--></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Por el total de horas</li>
          <li>y proporcional minutos</li>
          <li>desde que el vehiculo </li>
          <li>ingreso hasta que salio</li>
          <!--li>Help center access</li-->
        </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-primary">Get started</button-->
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Estadia</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$450 <!--small class="text-muted">/ mo</small--></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Desde la tercer hora</li>
          <li>hasta la duodecima</li>
          <li>hora que el vehiculo</li>
          <li>esta en custodia</li>
        </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button-->
      </div>
    </div>
  </div>

<div class ="justify-content-center">
  <div class="container">
    <!--div class="card-deck mb-3 text-center"-->

      <form id="miform"  action="baseHacerEstacionar.php" method="post"><!--action="primerPag.html"-->
        <input name="correo" type="text" id="correo" class="btn btn-lg btn-block btn-outline-primary mayusc-text" value="<?php echo $correo;?>"> 
        <br>
        <!--input name="patente" type="text" id="patente" class="btn btn-lg btn-block btn-outline-primary mayusc-text"-->
        <input name="patente" type="text" id="autocomplete" class="recuadro" placeholder="Ingrese Patente" required autofocus>  <!--value="<?php //$patente; ?>"-->
        <ul class="list-unstyled mt-3 mb-4">
         <h5 align = "center">Ingrese Patente del Vehiculo</h5>
         <br>
         <!--div style="text-align:center;">
         <a class="btn btn-primary btn-lg" href="webcam-master/webcam.php" role="button">Usar Webcam </a>
         <br><br><br>
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
      </div-->
        </ul>
        
        <div align = "center">
         <input name="movimiento" type="radio" value="I"> Ingreso  <input name="movimiento" type="radio" value="E"> Egreso
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
<table align="center">
  
  <tr>
    <th width="250"></th>
    <th width="450"><?php include_once "clase/baseEstacionados.php"; 
    include_once "clase/AccesoBase.php";

    baseEstacionados::mostrarCobroSalido(); ?></th>
  <!--th><a class="btn btn-primary btn-lg" href="list_salidas.php" role="button">Ticket </a></th-->
  </tr>
  </table>

<br><br>
<div>
<table>
  <th align="center"></th>
  <th></th>
  <tr>
    <td>
    <?php include_once "clase/baseEstacionados.php"; 
    include_once "clase/AccesoBase.php";
    baseEstacionados::mostrarTablaEstacionados();   ?>
  </td>
  <td>
  <!--th width="350"-->
    <?php include_once "clase/baseEstacionados.php"; 
    include_once "clase/AccesoBase.php";
    baseEstacionados::mostrarTablaSalidos();   ?>
  </td>
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


