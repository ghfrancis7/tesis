<?php
    $usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../../../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }

	include_once("../../modelo/Conexion.php");
	include_once("../../modelo/pdf/fpdf.php");
	include_once("../../modelo/Tratamiento.php");
	include_once("../../modelo/lote.php");

		$idtratamiento= $_GET['IDTratamiento'];
		$planta= $_GET['PlantaNombre'];

		$pdf=new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',10);
			$pdf->Image('../../../Images/GrupoAcademico.jpg',22,20,18,'JPG');
			$pdf->Cell(40,20,"",0);
			$pdf->Cell(120,40,"Grupo AGUAS",0);
			$pdf->SetFont("Arial",'',9);
			$pdf->Cell(40,20,'Fecha:'.date('d-m-Y').'',0);
			$pdf->Ln(2);
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(160,60,"",0);
			$pdf->Cell(40,50,"Tecnico: ".$usuario.'',0);
			$pdf->Ln(30);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(70,8,"",11);
			$pdf->Cell(100,8,"Tratamientos de la Planta: ".$planta.'',0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(90,8,"Nombre de Tratamiento",'TRLB',0);
			$pdf->Cell(40,8,"Numero de Analisis",'TRLB',0);
			$pdf->Cell(30,8,"Fecha de Inicio",'TRLB',0);
			$pdf->Cell(20,8,"Estado",'TRLB',0);
			$pdf->Ln(15);
			$pdf->SetFont("Arial",'',12);
			
			


				$controlador = new Tratamiento();
					$sql= $controlador->listarTratamientoActivoPlanta($idUsuario,$idtratamiento);

				$controladorlote = new Lote();
					$sqll=$controladorlote->listarLote($idtratamiento);


		foreach($sql as $row){ 

			

					$pdf->Cell(90,8,$row['TrataNombre'],'TRLB',0);
					$pdf->Cell(40,8,$row['TrataNumAnalisis'],'TRLB',0);
					$pdf->Cell(30,8,$row['TrataFecha'],'TRLB',0);
					$pdf->Cell(20,8,$row['TrataEstado'],'TRLB',0); 
					$pdf->Ln(8);
	 				}
				$pdf->Ln(12);
	 			$pdf->SetFont("Arial",'B',12);
	 			$pdf->Cell(70,12,"",11);
				$pdf->Cell(110,12,"Productos requeridos",0);
				$pdf->SetFont("Arial",'B',9);
				$pdf->Ln(23);
				$pdf->Cell(50,12,"Nombre del Producto",'TRLB',0);
				$pdf->Cell(38,12,"Dosificacion Semanal",'TRLB',0);
				$pdf->Cell(41,12,"Dosificacion Anual aprox.",'TRLB',0);
				$pdf->Cell(30,12,"Precio Semanal",'TRLB',0);
				$pdf->Cell(38,12,"Precio Anual aprox.",'TRLB',0);
				$pdf->Ln(15);
				$pdf->SetFont("Arial",'',9);

				$total=0;
				$totalanual=0;

				foreach($sqll as $row){ 

					$pdf->Cell(50,8,$row['ProductoNombre'],'TRLB',0);
					$pdf->Cell(38,8,$row['LoteCantidad'],'TRLB',0);
					$pdf->Cell(41,8,$row['LoteCantidad']*52,'TRLB',0);
					$pdf->Cell(30,8,'$'.$row['LoteCantidad']*$row['ProductoPrecio'],'TRLB',0);
					$pdf->Cell(38,8,'$'.($row['LoteCantidad']*52)*$row['ProductoPrecio'],'TRLB',0);
					
					$total+=$row['LoteCantidad']*$row['ProductoPrecio'];
					$totalanual+=($row['LoteCantidad']*52)*$row['ProductoPrecio'];
					$pdf->Ln(8);
	 				}
	 				$pdf->Ln(8);
	 				$pdf->Cell(30,8,"Total Mensual",'TRLB',0);
	 				$pdf->Cell(30,8,'$'.$total,'TRLB',0);
	 				$pdf->Cell(30,8,"Total Anual",'TRLB',0);
	 				$pdf->Cell(30,8,'$'.$totalanual,'TRLB',0);
	 				$pdf->Cell(30,12,"",0);
	 				$pdf->Ln(100);


	 				


			$pdf->Output();
	?>