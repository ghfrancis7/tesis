<?php 

include_once("../controlador/usuario_controlador.php");

	$controlador = new controladorUsuario();
	if(isset($_POST['enviar'])){
		$r=$controlador->crearUsuario($_POST['UsuNombre'],$_POST['UsuApellido'],$_POST['UsuDNI'],$_POST['UsuDireccion'],$_POST['UsuTelefono'],$_POST['UsuMail'],$_POST['UsuFechaNacimiento'],$_POST['UsuLocalidadOpera'],$_POST['UsuCuenta'],$_POST['UsuPassword'],$_POST['UsuFechaIngreso'],$_POST['UsuFechaEgreso'],$_POST['UsuEstado']);
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
<form id="frmCrear" action="" method="post">
	<input type="text" placeholder="Nombre" name="UsuNombre">
	<br><br>
	<input type="text" placeholder="Apellido" name="UsuApellido" requrired>
	<br><br>
	<input type="text" placeholder="DNI" name="UsuDNI" requrired>
	<br><br>
	<input type="text" placeholder="Direccion" name="UsuDireccion" requrired>
	<br><br>
	<input type="text" placeholder="Telefono" name="UsuTelefono" requrired>
	<br><br>
	<input type="text" placeholder="Mail" name="UsuMail" requrired>
	<br><br>
	<input type="text" placeholder="Fecha Nacimiento" name="UsuFechaNacimiento" requrired>
	<br><br>
	<input type="text" placeholder="Localidad Opera" name="UsuLocalidadOpera" requrired>
	<br><br>
	<input type="text" placeholder="Fecha Ingreso" name="UsuFechaIngreso" requrired>
	<br><br>
	<input type="text" placeholder="Fecha Egreso" name="UsuFechaEgreso" requrired>
	<br><br>
	<input type="text" placeholder="Estado" name="UsuEstado" requrired>
	<br><br>
    <input id="button" type="button" onClick="document.getElementById('frmCrear').submit()" value="Crear">

		<ul>
			<li><a href="index.php">Inicio</a></li>
		</ul>

</form>