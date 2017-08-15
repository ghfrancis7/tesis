<?php 

include_once("../modelo/Producto.php");

	$controlador = new Producto();
	$IDProducto= $_GET['buscar'];
	$sql= $controlador->buscarProducto($IDProducto);

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
 		
 			<td><a href="editar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar Producto</a></td>
 			<td><a href="eliminar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Eliminar Producto</a></td>
 		</tr>
 		
<?php } ?>
			</tbody>
 </table>

 <input type="button" value="Atras" onclick="history.back(-1)" />