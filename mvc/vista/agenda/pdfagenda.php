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

	include_once("../../modelo/pdf/fpdf.php");
	include_once("../../modelo/Agenda.php");

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
			$pdf->Cell(100,8,"Lista de Agenda ACTIVAS",0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(30,8,"Nombre de cita",0);
			$pdf->Cell(30,8,"Tratamiento",0);
			$pdf->Cell(30,8,"Direccion de Planta",0);
			$pdf->Cell(28,8,"Telefono de Planta",0);
			$pdf->Cell(30,8,"Fecha",0);
			$pdf->Cell(15,8,"Hora",0);
			$pdf->Cell(20,8,"Descripcion",0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',8);

				$controlador = new Agenda();
					$sql= $controlador->listarAgenda($idUsuario);

		foreach($sql as $row){ 

				$pdf->Cell(30,8,$row['AgendaNombre'],0);
				$pdf->Cell(30,8,$row['TrataNombre'],0);
				$pdf->Cell(30,8,$row['PlantaDireccion'],0);
				$pdf->Cell(28,8,$row['PlantaTelefono'],0);
				$pdf->Cell(30,8,$row['AgendaFecha'],0);
				$pdf->Cell(15,8,$row['AgendaHora'],0);
				$pdf->Cell(20,8,$row['AgendaDescripcion'],0); 
				$pdf->Ln(8);
	 				}
			$pdf->Output();
		?>