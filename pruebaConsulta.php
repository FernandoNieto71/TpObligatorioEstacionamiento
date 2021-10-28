    <?php include_once "clase/claseConsulta.php"; 
    include_once "clase/AccesoBase.php";
    include_once "clase/baseEstacionados.php";
    //claseConsulta::mostrarTablaConsultasprueba(); 
    $id = 32;
    $buscar=baseEstacionados::TraerRegistroEstadistica($id); 
    echo $buscar->fechaingreso;
     ?>