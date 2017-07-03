<?php 

include_once("../modelo/Producto.php");

	$controlador = new Producto();
	$sql= $controlador->listarProducto();

 ?> 
<table border="1"> 
 	<thead>
 		<th>ProductoID</th>
 		<th>ProductoNombre</th>
 		<th>ProductoPrecio</th>
 		<th>ProductoFechaAltaDB</th>
 		<th>ProductoFechaBajaDB</th>
 		<th>ProductoEstado</th>
 	</thead>
 	<tbody>
 <?php  
 		foreach($sql as $row){ ?>
 		<tr>
 			<td><?php echo "{$row['IDProducto']}"; ?></td>
 			<td><?php echo "{$row['ProductoNombre']}"; ?></td>
 			<td><?php echo "{$row['ProductoPrecio']}"; ?></td>
 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>
 			<?php /* <td><a href="?cargar=editar_producto&IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar</a></td>
 			*/?>
 			<td><a href="editar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar</a></td>
 		</tr>
<?php } ?>
			</tbody>
 </table>