
<h1>lalalalal</h1>
<?php 
	$controlador = new controladorUsuario();
	if(isset($_GET['IDUsuario'])){
		$row = $controlador->ver($_GET['IDUsuario']);
	}else{
		header('Location: index.php');
	}
 ?>

 <b>IDUsuario:</b> <?php echo $row['IDUsuario']; ?>
 <br>
  <b>IDRol:</b> <?php echo $row['IDRol']; ?>
 <br>
  <b>IDPlanta:</b> <?php echo $row['IDPlanta']; ?>
 <br>
  <b>IDTratamiento:</b> <?php echo $row['IDTratamiento']; ?>
 <br>
  <b>UsuNombre:</b> <?php echo $row['UsuNombre']; ?>
 <br>
  <b>UsuApellido:</b> <?php echo $row['UsuApellido']; ?>
 <br>
  <b>UsuDNI:</b> <?php echo $row['UsuDNI']; ?>
 <br>
  <b>UsuDireccion:</b> <?php echo $row['UsuDireccion']; ?>
 <br>
  <b>UsuMail:</b> <?php echo $row['UsuMail']; ?>
 <br>
  <b>UsuFechaNacimiento:</b> <?php echo $row['UsuFechaNacimiento']; ?>
 <br>
  <b>UsuLocalidadOpera:</b> <?php echo $row['UsuLocalidadOpera']; ?>
 <br>
  <b>UsuCuenta:</b> <?php echo $row['UsuCuenta']; ?>
 <br>
  <b>UsuPassword:</b> <?php echo $row['UsuPassword']; ?>
 <br>
  <b>UsuFechaIngreso:</b> <?php echo $row['UsuFechaIngreso']; ?>
 <br>
 <b>UsuFechaEgreso:</b> <?php echo $row['UsuFechaEgreso']; ?>
 <br>
 <b>UsuEstado:</b> <?php echo $row['UsuEstado']; ?>
 <br>
 