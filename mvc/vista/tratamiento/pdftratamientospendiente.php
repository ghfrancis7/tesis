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
			$pdf->Cell(100,8,"Listado de Tratamientos",0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(5,8,"ID",0);
			$pdf->Cell(50,8,"Nombre de Tratamiento",0);
			$pdf->Cell(20,8,"Analisis",0);
			$pdf->Cell(40,8,"Nombre de Planta",0);
			$pdf->Cell(30,8,"Fecha de Inicio",0);
			$pdf->Cell(30,8,"Fecha de Baja",0);
			$pdf->Cell(20,8,"Estado",0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',8);

				$controlador = new Tratamiento();
					$sql= $controlador->listarTratamientoPendiente($idUsuario);

		foreach($sql as $row){ 

				$pdf->Cell(5,8,$row['IDTratamiento'],0);
				$pdf->Cell(50,8,$row['TrataNombre'],0);
				$pdf->Cell(20,8,$row['TrataNumAnalisis'],0);
				$pdf->Cell(40,8,$row['PlantaNombre'],0);
				$pdf->Cell(30,8,$row['TrataFecha'],0);
				$pdf->Cell(30,8,$row['TrataFechaBaja'],0);
				$pdf->Cell(20,8,$row['TrataEstado'],0); 
				$pdf->Ln(8);
	 				}
			$pdf->Output();
	?>
