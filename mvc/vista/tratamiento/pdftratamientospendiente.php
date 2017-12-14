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

	require('../../modelo/pdf/mc_table.php');
	include_once("../../modelo/Tratamiento.php");

		$pdf=new PDF_MC_Table('L', 'mm', 'A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',14);
			$pdf->Image('../../../Images/GrupoAcademico.jpg',28,24,20,'JPG');
			$pdf->Cell(125,20,"",0);
			$pdf->Cell(110,40,"Grupo AGUAS",0);
			$pdf->SetFont("Arial",'',12);
			$pdf->Cell(40,20,'Fecha:'.date('d-m-Y').'',0);
			$pdf->Ln(2);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(230,60,"",0);
			$pdf->Cell(40,50,"Tecnico: ".$usuario.'',0);
			$pdf->Ln(50);
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(125,8,"",11);
			$pdf->Cell(100,8,"Lista de Tratamientos Pendientes",0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',12);

		$pdf->SetWidths(array(65,35,35,45,35,22));
			$pdf->Cell(65,8,"Nombre de Tratamiento",'TRLB',0);
			$pdf->Cell(35,8,"Analisis",'TRLB',0);
			$pdf->Cell(35,8,"Tecnico",'TRLB',0);
			$pdf->Cell(45,8,"Nombre de Planta",'TRLB',0);
			$pdf->Cell(35,8,"Fecha de Inicio",'TRLB',0);
			$pdf->Cell(22,8,"Estado",'TRLB',0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',12);

				$controlador = new Tratamiento();
					$sql= $controlador->listarTratamientoPendiente($idUsuario);

					srand(microtime()*1000000);
		for($i=0;$i<1;$i++)

		foreach($sql as $row){ 
				
    $pdf->Row(array($row['TrataNombre'],$row['TrataNumAnalisis'],$row['UsuNombre'],$row['PlantaNombre'],$row['TrataFecha'],$row['TrataEstado']));
				
	 				}

$pdf->Output();
?>
