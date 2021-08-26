<!DOCTYPE html>
<html>
     <head>
        <title> Mostrar base estacionados</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
      <div class="container">
            <div class="page-header">
                <h1>Ejemplos de PHP</h1>      
            </div>
            <div class="jumbotron">
                <h3 class="text-info">Pasaje de parametros por el orden en un array </h3>
                    <div class="well well-sm text-info">
                                  class cd
                                    {<br>
                                        public static function TraerTodoLosEstacionados() 
                                        {<br>
                                            $Obj_Acceso_Datos = AccesoBase::dameUnObjetoAcceso(); <br>
                                            $consulta =$Obj_Acceso_Datos->RetornarConsulta("SELECT id_usuario, id_vehiculo, fechaingreso, fechaegreso FROM estacionados");<br>
                                            $consulta->execute();<br>
                                            $estacionados= $consulta->fetchObject('baseEstacionados');<br>
                                            return $estacionados;<br>        

                                            
                                        }
                                    
                                    
                                    }<br>
                                    //utilización del método estatico<br>
                                       $unEst =baseEstacionados::TraerUnRegistro(1);<br>
                                   
                                        if(isset($unEst->id_usuario))<br>
                                         print_r($unEst->mostrarDatos());<br>
                                        else<br>
                                           print("No existe");<br>

                                       


                                    
                    </div>
             </div>
             <h3 >  Método de la clase  </h3>
                                    <?php
                                    include_once ("Clase/AccesoBase.php");
                                    include_once ("Clase/baseEstacionados.php");

                                     $unEst =baseEstacionados::TraerUnRegistro(2);
                                   
                                        if(isset($unEst->id_usuario))
                                         print_r($unEst->mostrarDatos());
                                        else
                                           print("No existe este");

                                        print("<br>");

                                    $todoEst=baseEstacionados::TraerTodoLosEstacionados();
                                    //var_dump($todoEst);
                                    	foreach($todoEst as $objetoEstacionado){

                                          print_r($objetoEstacionado->mostrarDatos());
                                          print_r("<br>");
                                          }

                                    ?>
                            <a class="btn btn-info" href="indexPDO.html">Menu principal</a>


                  </div>

    </body>
</html>