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
	include_once("../../modelo/Planta.php");

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
			$pdf->Cell(100,8,"Lista de Plantas",0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',8);
		
			$pdf->Cell(20,8,"Nombre",'TRLB',0,'C');
			$pdf->Cell(25,8,"Cliente",'TRLB',0);
			$pdf->Cell(20,8,"Localidad",'TRLB',0);
			$pdf->Cell(30,8,"Direccion",'TRLB',0);
			$pdf->Cell(20,8,"Telefono",'TRLB',0);
			$pdf->Cell(35,8,"Email",'TRLB',0);
			$pdf->Cell(20,8,"Fecha de Alta",'TRLB',0);
			$pdf->Cell(11,8,"Estado",'TRLB',0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',8);

				$controlador = new Planta();
					$sql= $controlador->listarPlantaActivo($idUsuario);

		foreach($sql as $row){ 

				
				$pdf->Cell(20,8,$row['PlantaNombre'],'TRLB',0);
				$pdf->Cell(25,8,$row['ClienteNombre'],'TRLB',0,'Q');
				$pdf->Cell(20,8,$row['PlantaLocalidad'],'TRLB',0);
				$pdf->Cell(30,8,$row['PlantaDireccion'],'TRLB',0);
				$pdf->Cell(20,8,$row['PlantaTelefono'],'TRLB',0); 
				$pdf->Cell(35,8,$row['PlantaMail'],'TRLB',0); 
				$pdf->Cell(20,8,$row['PlantaFechaAlta'],'TRLB',0); 
				$pdf->Cell(11,8,$row['PlantaEstado'],'TRLB',0); 
				$pdf->Ln(8);
	 				}
			$pdf->Output();
		?>