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
			$pdf->Ln(15);
			$pdf->Cell(25,8,"Cliente: ",0);
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(5,8,"ID",0);
			$pdf->Cell(20,8,"Nombre",0);
			$pdf->Cell(20,8,"Localidad",0);
			$pdf->Cell(30,8,"Direccion",0);
			$pdf->Cell(20,8,"Telefono",0);
			$pdf->Cell(35,8,"Email",0);
			$pdf->Cell(20,8,"Fecha de Alta",0);
			$pdf->Cell(20,8,"Fecha de Baja",0);
			$pdf->Cell(15,8,"Estado",0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',8);

				$controlador = new Planta();
					$sql= $controlador->listarPlantaInactivo($idUsuario);

		foreach($sql as $row){ 
				$pdf->Cell(25,8,$row['ClienteNombre'],0);
				$pdf->Cell(5,8,$row['IDPlanta'],0);
				$pdf->Cell(20,8,$row['PlantaNombre'],0);
				$pdf->Cell(20,8,$row['PlantaLocalidad'],0);
				$pdf->Cell(30,8,$row['PlantaDireccion'],0);
				$pdf->Cell(20,8,$row['PlantaTelefono'],0); 
				$pdf->Cell(35,8,$row['PlantaMail'],0); 
				$pdf->Cell(20,8,$row['PlantaFechaAlta'],0);
				$pdf->Cell(20,8,$row['PlantaFechaBaja'],0); 
				$pdf->Cell(15,8,$row['PlantaEstado'],0); 
				$pdf->Ln(8);
	 				}
			$pdf->Output();
		?>