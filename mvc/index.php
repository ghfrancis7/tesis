<!DOCTYPE html>

<?php 
	include_once("controlador/Enrutador.php");
	include_once("controlador/usuario_controlador.php");

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>

		h1{text-align:center;
		}
		
	</style>
	
</head>
<body>

	<h1>
		   Usuarios Tecnicos
	</h1>

	<br>
	<?php 
		$enrutador = new Enrutador();
                if($enrutador->validarGET(isset($_GET['cargar']))){
                    $enrutador->cargarVista($_GET['cargar']);
                }
	 ?>
</body>
</html>