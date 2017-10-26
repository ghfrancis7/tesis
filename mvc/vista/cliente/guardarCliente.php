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

		require_once("../../modelo/Conexion.php");
		include_once("../../modelo/Cliente.php");
		include_once("validarcuit.php");

		$controlador = new Cliente();
		$sql= $controlador->listarCliente($idUsuario);
		$controladorcuit = new cuit();

			$cuitused="false";
			$ccused="false";

			$pdo=new Conexion();

				$ClienteNombre= $_POST['ClienteNombre'];
				$ClienteCUIT= $_POST['ClienteCUIT'];
				$ClienteDireccion= $_POST['ClienteDireccion'];
				$ClienteTelefono= $_POST['ClienteTelefono'];
				$ClienteCantidadPlantas= $_POST['ClienteCantidadPlantas'];
				$ClienteFechaAlta= $_POST['ClienteFechaAlta'];
				$ClienteEstado= $_POST['ClienteEstado'];

					$sqlc= $controladorcuit->validarCuit($ClienteCUIT);

		foreach($sql as $row){
 			if ($ClienteNombre==$row['ClienteNombre']) {
 				$ccused='true';
 			}elseif ($ClienteCUIT==$row['ClienteCUIT']){
 				$cuitused='true' ;
 			}
}


	if ($ClienteNombre=="") {
				echo"<script type=\"text/javascript\">alert('No ingreso un nombre al cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ClienteCUIT==""){
				echo"<script type=\"text/javascript\">alert('No ingreso el numero de Cuit del cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ClienteDireccion==""){
				echo"<script type=\"text/javascript\">alert('No ingreso la direccion del cliente'); window.location='crearCliente.php';</script>"; 
			}elseif($ccused=="true"){
				echo"<script type=\"text/javascript\">alert('Este cliente ya existe'); window.location='crearCliente.php';</script>"; 
			}elseif ($cuitused=="true") {
				echo"<script type=\"text/javascript\">alert('CUIT ya utilizado'); window.location='crearCliente.php';</script>"; 
			}elseif($sqlc==$ClienteCUIT) {
				try {

			$pdo->mysql->beginTransaction();
			$pst = $pdo->mysql->prepare("INSERT INTO cliente (IDUsuario,ClienteNombre, ClienteCUIT,ClienteDireccion,ClienteTelefono,ClienteCantidadPlantas,ClienteFechaAlta,ClienteEstado) VALUES (:IDUsuario,:ClienteNombre,:ClienteCUIT,:ClienteDireccion,:ClienteTelefono,:ClienteCantidadPlantas,:ClienteFechaAlta,:ClienteEstado)");
			$pst->bindParam(":IDUsuario",$idUsuario,PDO::PARAM_STR);
			$pst->bindParam(":ClienteNombre",$ClienteNombre,PDO::PARAM_STR);
			$pst->bindParam(":ClienteCUIT",$ClienteCUIT,PDO::PARAM_STR);
			$pst->bindParam(":ClienteDireccion",$ClienteDireccion,PDO::PARAM_STR);
			$pst->bindParam(":ClienteTelefono",$ClienteTelefono,PDO::PARAM_STR);
			$pst->bindParam(":ClienteCantidadPlantas",$ClienteCantidadPlantas,PDO::PARAM_STR);
			$pst->bindParam(":ClienteFechaAlta",$ClienteFechaAlta,PDO::PARAM_STR);
			$pst->bindParam(":ClienteEstado",$ClienteEstado,PDO::PARAM_STR);	
			$pst->execute();
			$pdo->mysql->commit() ;
			
			echo"<script type=\"text/javascript\">alert('Se registro correctamente'); window.location='../planta/crearPlanta.php';</script>";
				
			} catch (Exception $e) {
				$pdo->mysql->rollback();
				echo "No se pudo agregar el cliente";
				
			} 

		
		}else {
				echo"<script type=\"text/javascript\">alert('Cuit incorrecto'); window.location='../planta/crearCliente.php';</script>";
			}
		
		?>