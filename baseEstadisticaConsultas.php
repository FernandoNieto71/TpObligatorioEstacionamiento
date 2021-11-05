<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Estadisticas</title>
    <link rel="shortcut icon" href="imagen/favicon.ico">
    <?php 
      include_once "clase/AccesoBase.php";
      include_once "clase/baseEstacionados.php"; 
      //include_once "clase/claseConsulta.php";
      include_once "clase/claseConsultaExamen.php";
      include_once "clase/claseVehiculo.php";
      include_once "clase/claseUsuario.php";
      $flag = 0;
      $flag2 = 0;
      $flag3= 0;
      if(isset($_POST["fecha1"])){
        $pFecha = $_POST["fecha1"];
        $sFecha = $_POST["fecha2"];
        
        $buscado=claseExamen::TraerConsulta3fechas($pFecha, $sFecha);
          
        $flag = 1;
  
      }

      if(isset($_POST["horaD"])){
        $pHoras = $_POST["hora1"];
        $sHoras = 'algo';

        $sHoras = $_POST["horaD"];

        $horaListado = claseExamen::TraerConsultaHoras($pHoras, $sHoras);
        $flag2 = 1;


      } else{
          $flag2 = 0;
      }

      if(isset($_POST["fAcepta1"])){
        $flag3= 1;
        $fechaAcepta1 = $_POST["fAcepta1"];
        $fechaAcepta2 = $_POST["fAcepta2"];
        if(isset($_POST["leido"])){
          $leido = 1;
        } else{
          $leido = 0;
        }
        if(isset($_POST["acepta"])){
          $acepta = 1;
        } else{
          $acepta = 1;
        }  

        $aceptaListado = claseExamen::TraerConsultaAcepta($fechaAcepta1, $fechaAcepta2, $leido , $acepta);

      } else{
        $flag3= 0;
      }
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
  
 
    
    <br><br>
    
  <h3 class="lead">Estadisticas de consultas por fecha</h3>
</div>  	

<div align="center">
<form id="datoEstadistica" action="baseEstadisticaConsultas.php" method="post">
  <label for="exampleFormControlSelect1">Ingrese primer fecha</label>
  <input type="text" placeholder="fecha" id="fecha1" name="fecha1" minlength="4" maxlength="12" size="10">
  <label for="exampleFormControlSelect1">Ingrese segunda fecha</label>
  <input type="text" placeholder="fecha" id="fecha2" name="fecha2" minlength="4" maxlength="12" size="10">  
  <input type="submit" value="Enviar">
</form> 

<div align="center">
<table>
  <tr>
    <th width="100">Email</th>
    <th width="200">Mensaje</th>
    <th width="200">Fecha</th>
    
  </tr>
  <?php 
  if($flag==1){
  foreach($buscado as $dato){
        $email = $dato->email;
        $mensaje=$dato->mensaje;
        $fecha=$dato->fecha;
        //$importe=$dato->importe;
        echo "<tr><td>$email</td>";
        echo "<td>$mensaje</td>";
        echo "<td>$fecha</td>";
        //echo "<td>$importe</td></tr>";
      }
    }

?>
</table>
</div>
<br><br>
<div align="center">
  <h3 class="lead">Estadisticas de mensajes por hora</h3>
  <br>
<form id="datoEstadisticahora" action="baseEstadisticaConsultas.php" method="post">
  <label for="exampleFormControlSelect1">Ingrese primer hora</label>
  <input type="text" placeholder="hora" id="hora1" name="hora1" minlength="4" maxlength="12" size="10">
  <label for="exampleFormControlSelect1">Ingrese segunda hora</label>
  <input type="text" placeholder="hora" id="horaD" name="horaD" minlength="4" maxlength="12" size="10">  
  <input type="submit" value="Enviar">
</form> 

<div align="center">
<table>
  <tr>
    <th width="100">Email</th>
    <th width="200">Mensaje</th>
    <th width="200">Fecha</th>
    
  </tr>
  <?php 
  if($flag2==1){
  foreach($horaListado as $dato){
        $email = $dato->email;
        $mensaje=$dato->mensaje;
        $fecha=$dato->fecha;
        //$importe=$dato->importe;
        echo "<tr><td>$email</td>";
        echo "<td>$mensaje</td>";
        echo "<td>$fecha</td>";
      }
    }
/*$leido= claseConsulta::TraerCantidadTotal();
$noLeido = claseConsulta::TraerCantidadNoLeidos();
echo "Cantidad de mensajes No Leidos: " .$leido;
echo "<br>";
echo "Cantidad de mensajes No Leidos: " .$noLeido;*/
?>
</table>
</div>

<br>
<br>
<div align="center">
  <h3 class="lead">Estadisticas de mensajes por aceptacion</h3>
  <br>
<form id="datoEstadisticaEstado" action="baseEstadisticaConsultas.php" method="post">
  <label for="exampleFormControlSelect1">Ingrese primer fecha</label>
  <input type="text" placeholder="primer fecha" id="fAcepta1" name="fAcepta1" minlength="4" maxlength="12" size="10">
  <label for="exampleFormControlSelect1">Ingrese segunda fecha</label>
  <input type="text" placeholder="segunda fecha" id="fAcepta2" name="fAcepta2" minlength="4" maxlength="12" size="10"> 
  <br>
  <label for="exampleFormControlSelect1">Leido</label>
  <input name="leido" type="checkbox" id="decla" value="1" "text-align:center; vertical-align: middle;"> 
  <label for="exampleFormControlSelect1">Acepta</label>
  <input name="acepta" type="checkbox" id="decla" value="1" "text-align:center; vertical-align: middle;">
  <br>
  <input type="submit" value="Enviar">
</form> 

<div align="center">
<table>
  <tr>
    <th width="100">Email</th>
    <th width="200">Mensaje</th>
    <th width="200">Fecha</th>
    
  </tr>
  <?php 
  if($flag3==1){
  foreach($aceptaListado as $dato){
        $email = $dato->email;
        $mensaje=$dato->mensaje;
        $fecha=$dato->fecha;
        $admin=$dato->administrador;
        echo "<tr><td>$email</td>";
        echo "<td>$mensaje</td>";
        echo "<td>$fecha</td>";
        echo "<td>$admin</td>";
      }
    }
/*$leido= claseConsulta::TraerCantidadTotal();
$noLeido = claseConsulta::TraerCantidadNoLeidos();
echo "Cantidad de mensajes No Leidos: " .$leido;
echo "<br>";
echo "Cantidad de mensajes No Leidos: " .$noLeido;*/
?>
</table>
</div>



</div>
<br><br>
	<!--table align="center">
  		<th align="center"></th>
  		<th></th>
  		<tr>
    		<td>
    <?php //include_once "clase/claseConsulta.php"; 
    
    //claseConsulta::mostrarTablaConsultas();  
     ?>
  			</td>
 		 
		</tr>

	</table-->

	<br><br>
	<!--div align="center-h ">
		<a class="recuadro" href="index.php">Volver</a>
    <a href="index.php" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Volver</a>
	</div-->

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        
      </div>
      <!--div class="col-6 col-md">
         <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Estadisticas</a>
      </div-->
      <div class="col-6 col-md">
       
        
      </div>
      <div class="col-6 col-md">
        <a href="index.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Salir</a
      </div>
    </div>
  </footer>

</body>
</html>



