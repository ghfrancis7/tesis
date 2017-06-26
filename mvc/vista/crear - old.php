<?php 

include_once("controlador/usuario_controlador.php");

	$controlador = new controladorUsuario();
	if(isset($_POST['enviar'])){
		$r=$controlador->crear($_POST['UsuNombre'],$_POST['UsuApellido'],$_POST['UsuDNI'],$_POST['UsuDireccion'],$_POST['UsuTelefono'],$_POST['UsuMail'],$_POST['UsuFechaNacimiento'],$_POST['UsuLocalidadOpera'],$_POST['UsuCuenta'],$_POST['UsuPassword'],$_POST['UsuFechaIngreso'],$_POST['UsuFechaEgreso'],$_POST['UsuEstado']);
		if($r){
			echo "Se ha registrado un nuevo usuario";
		}else{
			echo"Ya existe";
		}
	}


 ?>
 <br>
 <br>
 

<h3>Crear un nuevo usuario</h3>
<hr>
<form action="" method="post">
	<label>UsuNombre</label> <br>
	<input type="text" name="UsuNombre">
	<br><br>
	<label>UsuApellido</label> <br>
	<input type="text" name="UsuApellido" requrired>
	<br><br>
	<label>UsuDNI</label> <br>
	<input type="text" name="UsuDNI" requrired>
	<br><br>
	<label>UsuDireccion</label> <br>
	<input type="text" name="UsuDireccion" requrired>
	<br><br>
	<label>UsuTelefono</label> <br>
	<input type="text" name="UsuTelefono" requrired>
	<br><br>
	<label>UsuMail</label> <br>
	<input type="text" name="UsuMail" requrired>
	<br><br>
	<label>UsuFechaNacimiento</label> <br>
	<input type="text" name="UsuFechaNacimiento" requrired>
	<br><br>
	<label>UsuLocalidadOpera</label> <br>
	<input type="text" name="UsuLocalidadOpera" requrired>
	<br><br>
	<label>UsuCuenta</label> <br>
	<input type="text" name="UsuCuenta" requrired>
	<br><br>
	<label>UsuPassword</label> <br>
	<input type="text" name="UsuPassword" requrired>
	<br><br>
	<label>UsuFechaIngreso</label> <br>
	<input type="text" name="UsuFechaIngreso" requrired>
	<br><br>
	<label>UsuFechaEgreso</label> <br>
	<input type="text" name="UsuFechaEgreso" requrired>
	<br><br>
	<label>UsuEstado</label> <br>
	<input type="text" name="UsuEstado" requrired>
	<br><br>
	<input type="submit" name="enviar" value="Crear">

		<ul>
			<li><a href="index.php">Inicio</a></li>
		</ul>

</form>