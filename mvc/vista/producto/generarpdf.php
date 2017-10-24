<?php 
include_once("../../modelo/Conexion.php");
include_once("../../modelo/pdf/fpdf.php");
include_once("../../modelo/Producto.php");

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(15,8,"ID",0);
	$pdf->Cell(15,8,"Nombre",0);
	$pdf->Cell(15,8,"Precio",0);
	$pdf->Cell(15,8,"Fecha de Alta en DB",0);
	$pdf->Cell(15,8,"Fecha de Baja en DB",0);
	$pdf->Cell(15,8,"Activo/Inactivo",0);
	$pdf->Ln(8);
	$pdf->SetFont("Arial",'',8);

	$controlador = new Producto();
		$sql= $controlador->listarProducto();
		$sql->fetch(PDO::FETCH_ASSOC);

	foreach($sql as $row){ 

		$pdf->Cell(15,8,$row['IDProducto'],0); 
		$pdf->Cell(15,8,$row['ProductoNombre'],0);
		$pdf->Cell(15,8,$row['ProductoPrecio'],0);
		$pdf->Cell(15,8,$row['ProductoFechaAltaDB'],0);
		$pdf->Cell(15,8,$row['ProductoFechaBajaDB'],0);
		$pdf->Cell(15,8,$row['ProductoEstado'],0);
		
	$pdf->Ln(8);

 				}
		$pdf->Output();
		?>






