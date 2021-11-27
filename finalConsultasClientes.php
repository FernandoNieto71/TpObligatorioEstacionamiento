<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Usuarios Consultan</title>
    <link rel="shortcut icon" href="imagen/favicon.ico">
   

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

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Consultas de clientes</h1>
  
  <p class="lead">Bienvenidos clientes al sistema de consultas al administrador</p>


<div class ="justify-content-center">
  <div class="container">
    <!--div class="card-deck mb-3 text-center"-->

      <form id="miform"  action="FinalHacerConsultasClientes.php" method="post">
        <h5 align = "center">Ingrese su e-mail</h5>
        <input name="correo" type="text" id="correo" class="btn btn-lg btn-block btn-outline-primary minusc-text" >
        <br>
        <h5 align = "center">seleccione tipo de comunicacion</h5>
        <select name="motivo">
          <option value="-1">Seleccione una opcion</option>
          <option value="1">Opiniones</option>
          <option value="2">Recomendaciones</option>
          <option value="3">Quejas</option>
        </select>

        
        <br>
        <ul class="list-unstyled mt-3 mb-4">
         <h5 align = "center">Ingrese Comentario</h5>
        <textarea name="comentarios" rows="5" cols="60"></textarea> 
        
        
         <br><br>
          <input type="submit" value="Enviar">
        </div>

      </form>

    <!--/div-->
  </div>
</div>

</body>
</html>

