<?php 

include_once("../../modelo/Tratamiento.php");

	$controlador = new Tratamiento();
	$IDTratamiento= $_GET['buscar'];
	$sql= $controlador->buscarTratamiento($IDTratamiento);

 ?> 

 <form action="busquedaTratamiento.php" method ="get">

		<label>Buscar: <input type="text" name="buscar" ></label>
			<br>
		<input type="submit"name="Buscar" values"Buscar">

	</form>
	
<table border="1"> 
 	<thead>
 		<th>ID</th>
 		<th>Nombre de Tratamiento</th>
 		<th>Numero de Analisis</th>
 		<th>Fecha de Ingreso</th>
 		<th>Descripcion</th>
 	</thead>
 		<tbody>
 	<?php
 		foreach($sql as $row){ ?>
 			<tr>
		 		<td><?php echo "{$row['IDTratamiento']}"; ?></td>
		 		<td><?php echo "{$row['TrataNombre']}"; ?></td>
		 		<td><?php echo "{$row['TrataNumAnalisis']}"; ?></td>
		 		<td><?php echo "{$row['TrataFecha']}"; ?></td>
		 		<td><?php echo "{$row['TrataDescripcion']}"; ?></td>

		 		<!--<td><a href="editar_planta.php?IDPlanta=<?php echo $row['IDPlanta'] ?>"> Modificar Planta</a></td> -->
 			</tr>
 			<?php } ?>
		</tbody>
 </table>