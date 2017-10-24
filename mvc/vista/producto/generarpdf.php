<?php 
require("../../modelo/pdf/fpdf.php");
include_once("../../modelo/Producto.php");
		$controlador = new Producto();
		$sql= $controlador->listarProducto();


 		


$pdf=new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',14);

foreach($sql as $row){ 

				if (strcasecmp($row['ProductoEstado'],"Activo") == 0) { ?>
 				<tr>
	 			<td><?php echo "{$row['IDProducto']}"; ?></td>
	 			$pdf->Cell(0,10,'{$row['ProductoNombre']}',1,1);
	 			<td><?php echo "{$row['ProductoPrecio']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>
 				</tr>
 		<?php

 				}
		}
	

		$pdf->Output();

		?>