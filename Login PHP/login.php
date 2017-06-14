<?php
	include("../Conexion/conexion.php");
	
	$user = $_POST['user'];
	$pass = $_POST['passwd'];
	
	$conexion = new conexion;
	$conexion->login($user,$pass);
	$conexion->cerrar();
?>