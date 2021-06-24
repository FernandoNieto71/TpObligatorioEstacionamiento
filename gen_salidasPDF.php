<?php
//agregamos la libreria FPDF
require('fpdf183/fpdf.php');
include_once "funcionesEstacionamiento.php";
$renglones="";
$listadoEstacionado=array();
$listadoEstacionado=recorreSalidas();

$pdf = new FPDF('P','mm','A4');//creamos un objeto de la libreria
$pdf->AddPage();//Agregamos una pagina
$pdf->SetFont('Arial','B',16);//Establecemos tipo de fuente, negrita y tamaño 16
//Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha


$pdf->SetX(80);
$pdf->Cell(40,10,'Listado de Salidas',0,1,'C'); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'Patente',0,0,'L');
$pdf->Cell(32,10,'Entrada',0,0,'L');
$pdf->Cell(25,10,'Salida',0,0,'L');
$pdf->Cell(20,10,'Cobrado',0,0,'L');
$pdf->Cell(10,10,'GNC',0,0,'L');
$pdf->Cell(20,10,'Categoria',0,0,'L');
$pdf->Cell(30,10,'PersonaIngreso',0,0,'L');
$pdf->Cell(32,10,'PersonaEgreso',0,1,'L');
//$pdf->Cell(10,10,'Patente;Salida;Cobrado;PersonaEgreso;Entrada;GNC;Categoria;PersonaIngreso',0,0,'L'); 

$pdf->SetFont('Arial','B',9);
foreach ($listadoEstacionado as $datos) {
   if(isset($datos[0])){
      $patente=$datos[0];
      $pdf->Cell(15,10,$patente,0,0,'L');
      $ingreso=$datos[5];
      $pdf->Cell(33,10,$ingreso,0,0,'L');
      $salida=$datos[2];
      $pdf->Cell(32,10,$salida,0,0,'L');
      $valor=$datos[3];
      $pdf->Cell(15,10,$valor,0,0,'R');
      $gnc=$datos[6];
      $gncl="No";
      if($gnc==1){
            $gncl="Si";
      }
      $pdf->Cell(13,10,$gncl,0,0,'C');
      $categ=$datos[7];
      $pdf->Cell(15,10,$categ,0,0,'C');
      $PerIngreso=$datos[8];
      $pdf->Cell(35,10,$PerIngreso,0,0,'L');
      $PerEgreso=$datos[4];
      $pdf->Cell(32,10,$PerEgreso,0,1,'L');
      //$renglones .= $patente." ".$salida." ".$valor." ".$PerEgreso." ".$ingreso." ".$gnc." ".$categ." ".$PerIngreso;
      
      
   }

}
$pdf->MultiCell(170,5,$renglones,0,'L',0);
$pdf->Output(); //Mostramos el PDF creado

?>