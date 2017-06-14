<?php 
	
	$nombre=$_POST['PlantaNombre'];
	$localidad=$_POST['PlantaLocalidad'];
	$direccion=$_POST['PlantaDireccion'];
	$telefono=$_POST['PlantaTelefono'];
	$email=$_POST['PlantaEmail'];
	$fechaalta=$_POST['PlantaFechaAlta'];
	$fechabaja=$_POST['PlantaFechaBaja'];
	$estado=$_POST['PlantaEstado'];

		include("conexiontesis.php");

		/*if(isset($nombre) && !empty($nombre)&&
			isset($_POST['PlantaLocalidad']) && !empty($_POST['PlantaLocalidad'])&&
			isset($_POST['PlantaDireccion']) && !empty($_POST['PlantaDireccion']))
	{*/

	$conexion = mysql_connect($host,$user,$pw) or die ("Problema al conectar el host");
	mysql_select_db($db,$conexion) or die ("problemas a conectar la db");

		$insertar=mysql_query("INSERT INTO Planta (PlantaNombre,PlantaLocalidad,PlantaDireccion,PlantaTelefono,PlantaEmail,PlantaFechaAlta,PlantaFechaBaja,PlantaEstado) values ('$nombre','$localidad','$direccion','$telefono','$email','$fechaalta','$fechabaja','$estado)",$conexion );


			if ($insertar) {
					echo "se cargo bien";
			}else{
					echo "se cargo mal";
			}



?>