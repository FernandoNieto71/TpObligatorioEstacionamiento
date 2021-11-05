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
      include_once "clase/claseConsulta.php";
      include_once "clase/claseVehiculo.php";
      include_once "clase/claseUsuario.php";
      $flag = 0;
      $flag2 = 0;
      if(isset($_POST["patente"])){
        $idpatente = $_POST["patente"];
        //echo $idpatente. "<br>";

        $buscadoID=claseVehiculo::vehiculoEstacionar($idpatente);
        //echo $buscadoID->id;
        if(isset($buscadoID->id)){
          $flag = 1;
          $carro = baseEstacionados::TraerRegistroEstadistica($buscadoID->id);
       
          foreach($carro as $dato){
            $fechaingreso=$dato->fechaingreso;
            $fechaegreso=$dato->fechaegreso;
            $patente = $dato->patente;
            $importe=$dato->importe;
            //echo $patente." ".$fechaingreso." ".$fechaegreso." ".$importe."<br>";
            }
          } else{
        $flag=0;

        }
      }

      if(isset($_POST["usuario"])){
        $mail = $_POST["usuario"];
        //echo $mail. "<br>";  
        $idUsuario = claseUsuario::buscaUsuario($mail);
        //var_dump($idUsuario->id);
        if(isset($idUsuario->id)){
          $datoUsu = baseEstacionados::TraerRegEstadUsuario($idUsuario->id);
          //var_dump($datoUsu);
          $flag2 = 1;
       }else{$flag2 = 0; }

      } else{
          $flag2 = 0;
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
    
  <h3 class="lead">Estadisticas de vehiculos por patente</h3>
</div>  	

<div align="center">
<form id="datoEstadistica" action="baseEstadistica.php" method="post">
  <label for="exampleFormControlSelect1">Ingrese patente a buscar</label>
  <input type="text" placeholder="Patente" id="patente" name="patente" minlength="4" maxlength="8" size="10">
  <input type="submit" value="Enviar">
</form> 

<div align="center">
<table>
  <tr>
    <th width="100">Patente</th>
    <th width="200">Fecha Ingreso</th>
    <th width="200">FechaEgreso</th>
    <th width="100">Importe</th>
  </tr>
  <?php 
  if($flag==1){
  foreach($carro as $dato){
        $patente = $dato->patente;
        $fechaingreso=$dato->fechaingreso;
        $fechaegreso=$dato->fechaegreso;
        $importe=$dato->importe;
        echo "<tr><td>$patente</td>";
        echo "<td>$fechaingreso</td>";
        echo "<td>$fechaegreso</td>";
        echo "<td>$importe</td></tr>";
      }
    }

?>
</table>
</div>
<br><br>
<div align="center">
  <h3 class="lead">Estadisticas de usuarios por mail</h3>
  <br>
<form id="datoUsuario" action="baseEstadistica.php" method="post">
  <label for="exampleFormControlSelect1">Ingrese usuario a buscar</label>
  <input type="text" placeholder="Usuario" id="usuario" name="usuario" minlength="10" maxlength="28" size="30">
  <input type="submit" value="Enviar">
</form> 

<div align="center">
<table>
  <tr>
    <th width="100">Patente</th>
    <th width="200">Fecha Ingreso</th>
    <th width="200">FechaEgreso</th>
    <th width="100">Importe</th>
  </tr>
  <?php 
  if($flag2==1){
  foreach($datoUsu as $dato){
        $patente = $dato->patente;
        $fechaingreso=$dato->ingreso;
        $fechaegreso=$dato->egreso;
        $importe=$dato->importe;
        echo "<tr><td>$patente</td>";
        echo "<td>$fechaingreso</td>";
        echo "<td>$fechaegreso</td>";
        echo "<td>$importe</td></tr>";
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



