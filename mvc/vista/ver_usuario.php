<?php 

include_once("../modelo/Usuario.php");

	$controlador = new Usuario();
	$sql= $controlador->listarUsuario();

 ?> 
<table border="1"> 
 	<thead>
 		<th>IDUsuario</th>
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
 <?php  
 		foreach($sql as $row){ ?>
 		<tr>
 			<td><?php echo "{$row['IDUsuario']}"; ?></td>
 			<td><?php echo "{$row['UsuNombre']}"; ?></td>
 			<td><?php echo "{$row['UsuApellido']}"; ?></td>
 			<td><?php echo "{$row['UsuDNI']}"; ?></td>
 			<td><?php echo "{$row['UsuDireccion']}"; ?></td>
 			<td><?php echo "{$row['UsuTelefono']}"; ?></td>
 			<td><?php echo "{$row['UsuMail']}"; ?></td>
 			<td><?php echo "{$row['UsuFechaNacimiento']}"; ?></td>
 			<td><?php echo "{$row['UsuLocalidadOpera']}"; ?></td>
 			<td><?php echo "{$row['UsuCuenta']}"; ?></td>
 			<td><?php echo "{$row['UsuPassword']}"; ?></td>
 			<td><?php echo "{$row['UsuFechaIngreso']}"; ?></td>
 			<td><?php echo "{$row['UsuFechaEgreso']}"; ?></td>
 			<td><?php echo "{$row['UsuEstado']}"; ?></td>

 			<?php /* <td><a href="?cargar=editar_producto&IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar</a></td>
 			*/?>
 			<td><a href="editar_usuario.php?IDUsuario=<?php echo $row['IDUsuario'] ?>"> Modificar Usuario</a></td>
 		</tr>
<?php } ?>
			</tbody>
 </table>