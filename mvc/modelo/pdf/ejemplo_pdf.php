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

require('mc_table.php');
include_once("../../modelo/Planta.php");


		$controlador = new Planta();
		$sql= $controlador->listarPlantaActivo($idUsuario);

$pdf=new PDF_MC_Table('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20,25,30,30,25,40,25,15));
			$pdf->Cell(20,8,"Nombre",'TRLB',0,'C');
			$pdf->Cell(25,8,"Cliente",'TRLB',0);
			$pdf->Cell(30,8,"Localidad",'TRLB',0);
			$pdf->Cell(30,8,"Direccion",'TRLB',0);
			$pdf->Cell(25,8,"Telefono",'TRLB',0);
			$pdf->Cell(40,8,"Email",'TRLB',0);
			$pdf->Cell(25,8,"Fecha de Alta",'TRLB',0);
			$pdf->Cell(15,8,"Estado",'TRLB',0);
			$pdf->Ln(8);

srand(microtime()*1000000);
for($i=0;$i<8;$i++)

		foreach($sql as $row){ 
				
    $pdf->Row(array($row['PlantaNombre'],$row['ClienteNombre'],$row['PlantaLocalidad'],$row['PlantaDireccion'],$row['PlantaTelefono'],$row['PlantaMail'],$row['PlantaFechaAlta'],$row['PlantaEstado']));
				
	 				}

$pdf->Output();
?>