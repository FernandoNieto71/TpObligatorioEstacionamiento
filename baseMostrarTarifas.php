<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Tarifas</title>
    <link rel="shortcut icon" href="imagen/favicon.ico">
    <?php 
      include_once "clase/AccesoBase.php";
      include_once "clase/baseEstacionados.php"; 
      include_once "clase/claseConsulta.php";
      
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
  
  <body class="text-center">
    <br>
    <?php
    $indiceCokie= htmlspecialchars($_COOKIE["indice"]);
    $cgamaCokie= htmlspecialchars($_COOKIE["cgama"]);
    $gncCokie= htmlspecialchars($_COOKIE["gnc"]);
    $agamaCokie= htmlspecialchars($_COOKIE["agama"]);   
    echo $indiceCokie." ".$cgamaCokie." ".$agamaCokie." ".$gncCokie; 

    ?>
    <br><br>
  <img class="mb-4" src="imagen/descarga.png" width="72" height="72">
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Estacionamiento Wilde</h1>
  
  
    

    <br><br>
    
  <p class="lead">Bienvenido administrador a las consultas de las tarifas</p>
</div>  	

<div align="center">
<?php
    //echo "<h3>¡Hola " . htmlspecialchars($_COOKIE["mail"]) . "!</h3>";
     include_once "clase/claseTarifa.php"; 
     claseTarifa::mostrarTablaTarifa();
     $tarifaBuscada=claseTarifa::traerDatosTarifa();
     $fecha= $tarifaBuscada->fecha;
     $indice=$tarifaBuscada->indice;
     $cgama=$tarifaBuscada->cgama;
     $agama=$tarifaBuscada->agama;
     $gnc=$tarifaBuscada->gnc;
    ?>
</div>
<br><br>
<div align="center">
  <h5>Los datos mostrados son de la tarifa vigente, Ingrese los nuevos valores</h5>
  <div class="container">
    <!--div class="card-deck mb-3 text-center"-->

      <form id="miform"  action="baseHacerTarifa.php" method="post">
        <label align = "center">Indice</label>
        <input name="indice" type="text" id="indice" value="<?php echo "$indice"; ?>" >
        <br>
        <label align = "center">% camioneta</label>
        <input name="cgama" type="text" id="cgama" value="<?php echo "$cgama"; ?>" >
        <br>       
        <label align = "center">% Alta Gama</label>
        <input name="agama" type="text" id="agama" value="<?php echo "$agama"; ?>" >
        <br>
        <label align = "center">GNC</label>
        <input name="gnc" type="text" id="gnc" value="<?php echo "$gnc"; ?>" >
        <br>        
        <br>

         <br><br>
          <input type="submit" value="Enviar">
        </div>

      </form>

    <!--/div-->
  </div>
</div>

	<br><br>
	<!--div align="center-h ">
		<a class="recuadro" href="index.php">Volver</a>
    <a href="index.php" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Volver</a>
	</div-->

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-6 col-md">
        
      </div>
      <div class="col-6 col-md">
        
      </div>
      <div class="col-6 col-md">
         <a href="baseMostrarConsultas.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Volver</a>
      </div>
      <div class="col-6 col-md">
         <a href="index.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Ir a Inicio</a>
        
      </div>
      <div class="col-6 col-md">
        
      </div>
    </div>
  </footer>

</body>
</html>
