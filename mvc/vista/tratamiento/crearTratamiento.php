<?php 
 include_once("../../modelo/Usuario.php");
 include_once("../../modelo/Planta.php");
		$controlador = new Usuario();
		$sql= $controlador->listarUsuario();

		$control = new Planta();
		$sqlp= $control->listarPlanta();

?>
 <br>
<h3>Crear un nuevo Tratamiento</h3>
<form action="guardarTratamiento.php" method="post">
	<input type="text" placeholder="Nombre de Tratamiento" name="TrataNombre">
	<br><br>

		<select name="IDUsuario">
			<?php 
				foreach($sql as $row){ if (strcasecmp($row['UsuEstado'],"Activo") == 0) {
					?>
					<option value= <?php echo "{$row['IDUsuario']}"; ?>><?php echo "{$row['UsuNombre']}"; ?></option>
			<?php } }
				?>

		</select>	
<br></br>
		<select name="IDPlanta">
			<?php 
				foreach($sqlp as $rowp){ if (strcasecmp($rowp['PlantaEstado'],"Activo") == 0) {
					?>
					<option value= <?php echo "{$rowp['IDPlanta']}"; ?>><?php echo "{$rowp['PlantaNombre']}"; ?></option>
			<?php } }
				?>

		</select>	
    <br><br>
	<input type="text" placeholder="Fecha de Tratamiento" name="TrataFecha">
	<br><br>
	<input type="text" placeholder="Numero de Analisis" name="TrataNumAnalisis">
	<br><br>
	<input type="text" placeholder="Descripcion" name="TrataDescripcion">
	<br><br>
	<input type="text" placeholder="Estado de Tratamiento" name="TrataEstado">
	<br><br>
	<input type="submit" name="enviar" value="Crear Tratamiento">
	<input type="button" value="Atras" onclick="history.back(-1)" />
	
</form>
