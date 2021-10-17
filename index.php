<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <!--title>Estacionamiento Wilde</title>
    <link rel="shortcut icon" href="imagen/favicon.ico"-->
    <?php 
    include_once("titulo.php");
    ?>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/jumbotron/">

    

    <!-- Bootstrap core CSS -->
<!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <!--a class="navbar-brand" href="#">Nombre de la aplicacion</a-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="baseLogin.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="baseRegistro.php">Registrate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="baseLoginAdm.php">Administrador</a>
      </li>
      <!--li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="baseLogin.php">Administrador</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li-->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Estacionamiento Wilde!</h1>
      <p>Esta es la pagina web de la empresa Estacionamieno Wilde. Aqui podra ingresar y egresar 
      vehiculos, obtener el arancel y listarlos.</p>
      <!--p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p-->
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Estacionar</h2>
        <p>Nuestro personal, al llegar el cliente, lo recibira y le indicara lugar donde estacionar el 
        vehiculo. Dependiendo del servicio, en cuanto al tiempo, debera dejar la llave o se la podra llevar.
      Al retirarse se le entregara un ticket con los datos de patente y hora de ingreso</p>
        <!--p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p-->
      </div>
      <div class="col-md-4">
        <h2>Retiro</h2>
        <p>Cuando lo requiera el dueño del vehiculo, el mismo se presentara en la caja para avisar
        a nuestros empleados que hara el retiro del mismo. Luego de presentar el ticket y abonar
       prodra retirar el mismo. En el caso que sea una hora pico, nuestros empleados lo llevaran 
     hasta la puerta.</p>
        <!--p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p-->
      </div>
      <div class="col-md-4">
        <h2>Adminitracion</h2>
        <p>Los empleados administradores pueden ingresar el vehiculo para mas tarde retirar el 
        mismo. El sistema mostrara hora de ingreso y de salida, el tiempo de duracion y el valor
      del importe a cobrar. Tambien se pueden listar los vehiculos ya retirados.</p>
        <!--p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p-->
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Company 2017-2021</p>
</footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <!--script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

      
  </body>
</html>
