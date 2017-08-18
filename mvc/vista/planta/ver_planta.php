<?php 

include_once("../../modelo/Planta.php");

	$controlador = new Planta();
	$sql= $controlador->listarPlanta();
	$bandera="false";

 ?> 

 <form action="busquedaPlanta.php" method ="get">

		<label>Buscar: <input type="text" name="buscar" ></label>
			<br>
		<input type="submit"name="Buscar" values"Buscar">

	</form>
	
<table border="1"> 
 	<thead>
 		<th>ProductoID</th>
 		<th>Nombre de Planta</th>
 		<th>Localidad de la Panta</th>
 		<th>Direccion de la Planta</th>
 		<th>Telefono de la Panta</th>
 		<th>Email de la Panta</th>
 		<th>Fecha de alta de la Planta</th>
 		<th>Fecha de baja de la Planta</th>
 		<th>Estado de la Planta</th>


 		<th><a <form id="bandera" method="post" action="<?php $bandera="true"; ?>"> 
 		      <input id="button" type="button" onClick="document.getElementById('frmcancel').submit()" value="Ver Inactivos">
 		      </form></a></th>

 		
 	</thead>
 	<tbody>
 <?php  
 		foreach($sql as $row){ 
 			//if ($bandera=="false") {

 				//if ($row['PlantaEstado']=="Activo") { ?>
 				<tr>
	 			<td><?php echo "{$row['IDPlanta']}"; ?></td>
	 			<td><?php echo "{$row['PlantaNombre']}"; ?></td>
	 			<td><?php echo "{$row['PlantaLocalidad']}"; ?></td>
	 			<td><?php echo "{$row['PlantaDireccion']}"; ?></td>
	 			<td><?php echo "{$row['PlantaTelefono']}"; ?></td>
	 			<td><?php echo "{$row['PlantaEmail']}"; ?></td>
	 			<td><?php echo "{$row['PlantaFechaAlta']}"; ?></td>
	 			<td><?php echo "{$row['PlantaFechaBaja']}"; ?></td>
	 			<td><?php echo "{$row['PlantaEstado']}"; ?></td>

	 			<td><a href="editar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Modificar Planta</a></td>
	 			
	 			<td><a href="eliminar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Eliminar Planta</a></td>

 		</tr>

 		<?php
 			}
 			/*}elseif ($bandera="true") { ?>
 				<tr>
	 			<td><?php echo "{$row['IDProducto']}"; ?></td>
	 			<td><?php echo "{$row['ProductoNombre']}"; ?></td>
	 			<td><?php echo "{$row['ProductoPrecio']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaAltaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoFechaBajaDB']}"; ?></td>
	 			<td><?php echo "{$row['ProductoEstado']}"; ?></td>

	 			<td><a href="editar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Modificar Producto</a></td>
	 			
	 			<td><a href="eliminar_producto.php?IDProducto=<?php echo $row['IDProducto'] ?>"> Eliminar Producto</a></td>

 		</tr> */
 	
 		//	}{ ?>
 			
 		<?php
 	//	}
 			?>
 			
 			

 		
<?php  ?>
			</tbody>
 </table>