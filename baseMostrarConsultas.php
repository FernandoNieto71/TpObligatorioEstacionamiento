<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Consulta de usuarios</title>
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
    <br><br><br>
  <img class="mb-4" src="imagen/descarga.png" width="72" height="72">
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Estacionamiento Wilde</h1>
  
  <?php
    //echo "<h3>¡Hola " . htmlspecialchars($_COOKIE["mail"]) . "!</h3>";
    $datoEstacionado = baseEstacionados::TraerCantidadEstacionados();
    $datoSalido = baseEstacionados::TraerCantidadSalidos();
    print("Estacionados: $datoEstacionado - Salidos: $datoSalido ");
    echo("<br>");
    echo("<br>");
    $listaCantEstacionadoUsuario = baseEstacionados::TraerCantidadEstacionadosUsuario();
    $listaCantSalidosUsuario = baseEstacionados::TraerCantidadSalidosUsuario();
    ?>
    <table>
      <th width="400">Cantidad estacionado por usuario</th>
      <th width="900">Cantidad salidos por usuario y monto</th>
      <tr>
        <td>
          <?php 
            if(isset($listaCantEstacionadoUsuario) ){
             foreach($listaCantEstacionadoUsuario as $dato){
                print("Usuario: $dato->email: $dato->cantidad");
                echo("<br>");
              }
            }
          ?>
        </td>
        <td>
          <?php
            if(isset($listaCantSalidosUsuario) ){
              foreach($listaCantSalidosUsuario as $dato){
                print("Usuario: $dato->email: $dato->cantidad, total cobrado: \$ $dato->monto");
                echo("<br>");
              }
            }  
          ?> 
        </td>
      </tr>
    </table>

    <br><br>
    
  <p class="lead">Bienvenido administrador a las consultas de los usuarios</p>
</div>  	

<div align="center">
<?php 
$leido= claseConsulta::TraerCantidadTotal();
$noLeido = claseConsulta::TraerCantidadNoLeidos();
echo "Cantidad de mensajes No Leidos: " .$leido;
echo "<br>";
echo "Cantidad de mensajes No Leidos: " .$noLeido;
?>
</div>
<br><br>
	<table align="center">
  		<th align="center"></th>
  		<th></th>
  		<tr>
    		<td>
    <?php //include_once "clase/claseConsulta.php"; 
    
    claseConsulta::mostrarTablaConsultas();  
     ?>
  			</td>
 		 
		</tr>

	</table>

	<br><br>
	<!--div align="center-h ">
		<a class="recuadro" href="index.php">Volver</a>
    <a href="index.php" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Volver</a>
	</div-->

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        
      </div>
      <div class="col-6 col-md">
         <a href="baseEstadistica.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Estadisticas</a>
      </div>
      <div class="col-6 col-md">
       
        
      </div>
      <div class="col-6 col-md">
        <a href="index.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Salir</a
      </div>
    </div>
  </footer>

</body>
</html>



