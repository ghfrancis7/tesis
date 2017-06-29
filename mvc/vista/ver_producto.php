<?php 

include_once("modelo/Producto.php");

	$controlador = new Producto();
	$sql= $controlador->listarProducto();

 ?> 
<table border="1"> 
 	<thead>
 		<th>ProductoNombre</th>
 		<th>ProductoPrecio</th>
 		<th>ProductoFechaAltaDB</th>
 		<th>ProductoFechaBajaDB</th>
 		<th>ProductoEstado</th>
 	</thead>
 	<tbody>
 	<?php 
 		foreach($sql as $row){ ?>
 			<td><?php echo "{$row['ProductoNombre']}"; ?></td>
 			<td><?php echo "{$row['ProductoPrecio']}"; ?></td>
 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>

		
 <?php } /* while($row = mysqli_fetch_array($sql)){ ?>
 		<br>
 		<br>
		Nombre: <?php echo "{$row['ProductoNombre']}"; ?>
		<br>
		Precio:<?php echo "{$row['ProductoPrecio']}";?>
		<br>
		Fecha de Alta:<?php echo "{$row['ProductoFechaAltaDB']}";?>
		<br>
		Fecha de Baja:<?php echo "{$row['ProductoFechaBajaDB']}";?>
		<br>
		Estado:<?php echo "{$row['ProductoEstado']}";}?>
		<br>
		*/
		?>
			</tbody>
 </table>