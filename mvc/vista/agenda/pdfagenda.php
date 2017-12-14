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
	include_once("../../modelo/Agenda.php");

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
			$pdf->Cell(125,8,"",14);
			$pdf->Cell(100,8,"Agenda",0);
			$pdf->Ln(23);
			$pdf->SetFont('Arial','B',12);

		$pdf->SetWidths(array(40,30,60,40,30,25,35));

			$pdf->Cell(40,8,"Nombre de cita",'TRLB',0);
			$pdf->Cell(30,8,"Tratamiento",'TRLB',0);
			$pdf->Cell(60,8,"Direccion de Planta",'TRLB',0);
			$pdf->Cell(40,8,"Telefono",'TRLB',0);
			$pdf->Cell(30,8,"Fecha",'TRLB',0);
			$pdf->Cell(25,8,"Hora",'TRLB',0);
			$pdf->Cell(35,8,"Descripcion",'TRLB',0);
			$pdf->Ln(8);
			$pdf->SetFont("Arial",'',12);

				$controlador = new Agenda();
					$sql= $controlador->listarAgenda($idUsuario);

							srand(microtime()*1000000);
		for($i=0;$i<1;$i++)

		foreach($sql as $row){ 
			
    $pdf->Row(array($row['AgendaNombre'],$row['TrataNombre'],$row['PlantaDireccion'],$row['PlantaTelefono'],$row['AgendaFecha'],$row['AgendaHora'],$row['AgendaDescripcion']));
				
	 				}

$pdf->Output();
?>
