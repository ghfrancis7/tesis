<?php 
require("../../modelo/pdf/fpdf.php");
include_once("../../modelo/Producto.php");

		

 	class PDF extends FPDF 
 	{
 		

 		function LoadData($sql)
		{
		    // Leer las líneas del fichero
		    $data = array();
		    foreach($sql as $row){
		        $data[] = "{$row['IDProducto']} ; {$row['ProductoNombre']} ; {$row['ProductoPrecio']} ; {$row['ProductoFechaAltaDB']} ; {$row['ProductoFechaBajaDB']} ; {$row['ProductoEstado']}"; 

 				}
	 			 	
 				
		    return $data;
		}

		function BasicTable($header, $data)
	{
	    // Cabecera
	    foreach($header as $col)
	        $this->Cell(40,7,$col,1);
	    $this->Ln();
	    // Datos
	    foreach($data as $row)
	    {
	        foreach($row as $col)
	            $this->Cell(40,6,$col,1);
	        $this->Ln();
	    }
	}
 	}

 ?>