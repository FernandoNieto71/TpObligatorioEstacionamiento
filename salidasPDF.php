<?php
//agregamos la libreria FPDF
require('fpdf183/fpdf.php');
include_once "funcionesEstacionamiento.php";
$renglones="";
$listadoEstacionado=array();
$listadoEstacionado=recorreSalidas();

$pdf = new FPDF('P','mm','A4');//creamos un objeto de la libreria
$pdf->AddPage();//Agregamos una pagina
$pdf->SetFont('Arial','B',9);//Establecemos tipo de fuente, negrita y tamaño 16
//Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha


$pdf->SetX(50);
$pdf->Cell(40,10,'Listado de salidas',0,1,'C'); 
$pdf->Cell(100,10,'Patente;Salida;Cobrado;PersonaEgreso;Entrada;GNC;Categoria;PersonaIngreso',0,1,'L'); 


foreach ($listadoEstacionado as $datos) {
   if(isset($datos[0])){
      $patente=$datos[0];
      $salida=$datos[2];
      $valor=$datos[3];
      $PerEgreso=$datos[4];
      $ingreso=$datos[5];
      $gnc=$datos[6];
      $categ=$datos[7];
      $PerIngreso=$datos[8];
      $renglones .= $patente." ".$salida." ".$valor." ".$PerEgreso." ".$ingreso." ".$gnc." ".$categ." ".$PerIngreso;
      
      
   }

}
$pdf->MultiCell(170,5,$renglones,0,'L',0);
$pdf->Output(); //Mostramos el PDF creado

?>




