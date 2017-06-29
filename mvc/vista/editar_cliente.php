<?php 

include_once("controlador/cliente_controlador.php");

	$controlador = new controladorCliente();
	if(isset($_GET['IDCliente'])){
		$row = $controlador->ver($_GET['IDCliente']);
	}else{
		"hola";
	}

	$cod =$_GET["IDCliente"];
 ?>

 <form action="" method="post">
 <table width="200" border="1">
 
 	<tr>
		<td>Codigo Cliente</td>
		<td> <?php echo $cod; ?></td>
	</tr>
	<tr>
		<td>ClienteNombre</td>
		<td> <input type="text" name="ClienteNombre" value="aca tiene que salir el nombre del cliente pelotudo hijo de remil puta este jeje"/></td>
	</tr>
	<tr>
		<td>ClienteCuit</td>
		<td> <input type="text" name="ClienteCuit" /></td>
	</tr>
	<tr>
		<td>ClienteDireccion</td>
		<td> <input type="text" name="ClienteDireccion" /></td>
	</tr>
	<tr>
		<td>ClienteTelefono</td>
		<td> <input type="text" name="ClienteTelefono" /></td>
	</tr>
	<tr>
		<td>ClienteCantidadPlantas</td>
		<td> <input type="text" name="ClienteCantidadPlantas" /></td>
	</tr>
	<tr>
		<td>ClienteFechaAlta</td>
		<td> <input type="text" name="ClienteFechaAlta" /></td>
	</tr>
	<tr>
		<td>ClienteFechaBaja</td>
		<td> <input type="text" name="ClienteFechaBaja" /></td>
	</tr>
	<tr>
		<td>ClienteEstado</td>
		<td> <input type="text" name="ClienteEstado" /></td>
	</tr>

	<input type="submit" name="enviar" value="Modificar">
	<ul>
			<li><a href="index.php">Inicio</a></li>
		</ul>
		</table>
</form>
