<?php 
	$controlador = new controladorUsuario();
	$resultado = $controlador->index();
?>

<h3>Pagina de inicio</h3>
<table border="1">
	<thead>
		<th>IDUsuario</th>
		<th>IDRol</th>
		<th>IDPlanta</th>
		<th>IDTratamiento</th>
		<th>UsuNombre</th>
		<th>UsuApellido</th>
		<th>UsuDNI</th>
		<th>UsuDireccion</th>
		<th>UsuTelefono</th>
		<th>UsuMail</th>
		<th>UsuFechaNacimiento</th>
		<th>UsuLocalidadOpera</th>
		<th>UsuCuenta</th>
		<th>UsuPassword</th>
		<th>UsuFechaIngreso</th>
		<th>UsuFechaEgreso</th>
		<th>UsuEstado</th>
	</thead>
<tbody>
<?php while($row=mysql_fetch_array($resultado) or die(mysql_error())): ?>
	<tr>
		<td><?php echo $row['IDUsuario']; ?></td>
		<td><?php echo $row['IDRol']; ?></td>
		<td><?php echo $row['IDPlanta']; ?></td>
		<td><?php echo $row['IDTratamiento']; ?></td>
		<td><?php echo $row['UsuNombre']; ?></td>
		<td><?php echo $row['UsuApellido']; ?></td>
		<td><?php echo $row['UsuDNI']; ?></td>
		<td><?php echo $row['UsuDireccion']; ?></td>
		<td><?php echo $row['UsuTelefono']; ?></td>
		<td><?php echo $row['UsuMail']; ?></td>
		<td><?php echo $row['UsuFechaNacimiento']; ?></td>
		<td><?php echo $row['UsuLocalidadOpera']; ?></td>
		<td><?php echo $row['UsuCuenta']; ?></td>
		<td><?php echo $row['UsuPassword']; ?></td>
		<td><?php echo $row['UsuFechaIngreso']; ?></td>
		<td><?php echo $row['UsuFechaEgreso']; ?></td>
		<td><?php echo $row['UsuEstado']; ?></td>
		<td>
			<a href="?cargar=ver&IDUsuario <?php echo $row['IDUsuario'] ?>">Ver</a>
			<a href="?cargar=editar&IDUsuario <?php echo $row['IDUsuario'] ?>">Editar</a>
			<a href="?cargar=eliminar&IDUsuario <?php echo $row['IDUsuario'] ?>">Eliminar</a>
		</td>
	</tr>
<?php endwhile; ?>

</tbody>
</table>