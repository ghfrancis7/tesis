<?php 

include_once("../modelo/Cliente.php");

	$controlador = new Cliente();
	$sql= $controlador->listarCliente();

 ?> 
<table border="1"> 
 	<thead>
 		<th>IDCliente</th>
 		<th>ClienteNombre</th>
 		<th>ClienteCuit</th>
 		<th>ClienteDireccion</th>
 		<th>ClienteTelefono</th>
 		<th>ClienteCantidadPlantas</th>
 		<th>ClienteFechaAlta</th>
 		<th>ClienteFechaBaja</th>
 		<th>ClienteEstado</th>

 	</thead>
 	<tbody>
 <?php  
 		foreach($sql as $row){ ?>
 		<tr>
 			<td><?php echo "{$row['IDCliente']}"; ?></td>
 			<td><?php echo "{$row['ClienteNombre']}"; ?></td>
 			<td><?php echo "{$row['ClienteCuit']}"; ?></td>
 			<td><?php echo "{$row['ClienteDireccion']}"; ?></td>
 			<td><?php echo "{$row['ClienteTelefono']}"; ?></td>
 			<td><?php echo "{$row['ClienteCantidadPlantas']}"; ?></td>
 			<td><?php echo "{$row['ClienteFechaAlta']}"; ?></td>
 			<td><?php echo "{$row['ClienteFechaBaja']}"; ?></td>
 			<td><?php echo "{$row['ClienteEstado']}"; ?></td>
 			<?php /* <td><a href="?cargar=editar_producto&IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar</a></td>
 			*/?>
 			<td><a href="editar_cliente.php?IDCliente=<?php echo $row['IDCliente'] ?>"> Modificar Cliente</a></td>
 		</tr>
<?php } ?>
			</tbody>
 </table>