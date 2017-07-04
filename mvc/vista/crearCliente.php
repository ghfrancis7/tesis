<?php 
/* 
include_once("../controlador/cliente_controlador.php");

	$controlador = new controladorCliente();
	if(isset($_POST['enviar'])){
		$r=$controlador->crearCliente($_POST['ClienteNombre'],$_POST['ClienteCuit'],$_POST['ClienteDireccion'],$_POST['ClienteTelefono'],$_POST['ClienteCantidadPlantas'],$_POST['ClienteFechaAlta'],$_POST['ClienteFechaBaja'],$_POST['ClienteEstado']);
		if($r){
			echo "Se ha registrado un nuevo Cliente";
		}else{
			echo"Ya existe el Cliente";
		}
	}*/
?>


 <br>
<h3>Crear un nuevo Cliente</h3>
<form action="guardarCliente.php" method="post">
	<label>ClienteNombre</label> <br>
	<input type="text" name="ClienteNombre">
	<br><br>
	<label>ClienteCuit</label> <br>
	<input type="text" name="ClienteCuit">
	<br><br>
	<label>ClienteDireccion</label> <br>
	<input type="text" name="ClienteDireccion">
	<br><br>
	<label>ClienteTelefono</label> <br>
	<input type="text" name="ClienteTelefono">
	<br><br>
	<label>ClienteCantidadPlantas</label> <br>
	<input type="text" name="ClienteCantidadPlantas">
	<br><br>
	<label>ClienteFechaAlta</label> <br>
	<input type="date" name="ClienteFechaAlta">
	<br><br>
	<label>ClienteFechaBaja</label> <br>
	<input type="date" name="ClienteFechaBaja">
	<br><br>
	<label>ClienteEstado</label> <br>
	<input type="text" name="ClienteEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear">
	<ul>
			<li><a href="index.php">Inicio</a></li>
		</ul>
</form>
