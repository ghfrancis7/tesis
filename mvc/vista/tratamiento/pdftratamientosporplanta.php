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
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(70,8,"",11);
			$pdf->Cell(100,8,"Tratamientos de la Planta: ".$planta.'',0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(5,8,"ID",0);
			$pdf->Cell(60,8,"Nombre de Tratamiento",0);
			$pdf->Cell(30,8,"Numero de Analisis",0);
			$pdf->Cell(30,8,"Fecha de Inicio",0);
			$pdf->Cell(20,8,"Estado",0);
			$pdf->Ln(15);
			$pdf->SetFont("Arial",'',10);
			
			


				$controlador = new Tratamiento();
					$sql= $controlador->listarTratamientoActivoPlanta($idUsuario,$idtratamiento);

				$controladorlote = new Lote();
					$sqll=$controladorlote->listarLote($idtratamiento);


		foreach($sql as $row){ 

			$pdf->Cell(5,8,$idtratamiento,0);

					$pdf->Cell(60,8,$row['TrataNombre'],0);
					$pdf->Cell(30,8,$row['TrataNumAnalisis'],0);
					$pdf->Cell(30,8,$row['TrataFecha'],0);
					$pdf->Cell(20,8,$row['TrataEstado'],0); 
					$pdf->Ln(8);
	 				}
				$pdf->Ln(12);
	 			$pdf->SetFont("Arial",'B',12);
	 			$pdf->Cell(70,12,"",11);
				$pdf->Cell(110,12,"Productos requeridos",0);
				$pdf->SetFont("Arial",'B',8);
				$pdf->Ln(23);
				$pdf->Cell(60,12,"Nombre del Producto",0);
				$pdf->Cell(40,12,"Dosificacion Semanal",0);
				$pdf->Cell(40,12,"Dosificacion Anual aprox.",0);
				$pdf->Ln(15);
				$pdf->SetFont("Arial",'',10);

				foreach($sqll as $row){ 

					$pdf->Cell(60,8,$row['ProductoNombre'],0);
					$pdf->Cell(40,8,$row['LoteCantidad'],0);
					$pdf->Cell(40,8,$row['LoteCantidad']*52,0);
					$pdf->Ln(8);
	 				}
	 				$pdf->Cell(30,12,"",0);
	 				$pdf->Ln(100);

	 				$pdf->Cell(30,12,"Documento Interno de la Empresa",0);


			$pdf->Output();
	?>