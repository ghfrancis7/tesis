<?php 

include_once("../modelo/Producto.php");

	$controlador = new Producto();
	$sql= $controlador->listarProducto();
	$bandera="false";

 ?> 

 <form action="busquedaProducto.php" method ="get">

		<label>Buscar: <input type="text" name="buscar" ></label>
			<br>
		<input type="submit"name="Buscar" values"Buscar">

	</form>
	
<table border="1"> 
 	<thead>
 		<th>ProductoID</th>
 		<th>ProductoNombre</th>
 		<th>ProductoPrecio</th>
 		<th>ProductoFechaAltaDB</th>
 		<th>ProductoFechaBajaDB</th>
 		<th>ProductoEstado</th>
 		<th><a <form id="bandera" method="post" action="<?php $bandera="true"; ?>"> 
 		      <input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Ver Inactivos">
 		      </form></a></th>

 		
 	</thead>
 	<tbody>
 <?php  
 		foreach($sql as $row){ 
 			if ($bandera=="false") {

 				if ($row['ProductoEstado']=="Activo") { ?>
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

 		<?php
 			}
 			}else{ ?>
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
 		<?php
 		}
 			?>
 			
 			

 		
<?php } ?>
			</tbody>
 </table>