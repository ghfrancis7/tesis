
<?php 
	include_once("../../modelo/Producto.php");
	include_once("../../modelo/Conexion.php");
	include_once("../../modelo/Lote.php");
		$controlador = new Producto();
		$controladorlote = new Lote();
		$sql= $controlador->listarProducto();
		
		$sqlp= $controladorlote->productoLote();
		


		$pdo= new Conexion();
		$IDTratamiento = $_GET['IDTratamiento'];
		$sqlt = $controladorlote->listarLote($IDTratamiento);

		

		$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento where IDTratamiento = :IDTratamiento");
		$datosTratamiento->bindParam(":IDTratamiento", $IDTratamiento, PDO::PARAM_INT);
		$datosTratamiento->execute();
		$tratamiento = $datosTratamiento->fetch();

		?>
			<label>Nombre de Tratamiento</label>
                <input type="text" name="TrataNombre" value="<?php echo $tratamiento['TrataNombre']; ?>"readonly=true > <br>


 		<table width="60%" border="1" style="margin: 0 auto;"> 
			
	            <tr>
	            <th>IDLote</th>	
	            <th>Producto</th>
	 			<th>Cantidad</th>
	 			<th>Eliminar Producto</th>
	 			</tr>
 			
		<tbody>
			<?php 
		
 			foreach($sqlt as $rowl){ ?>
 					<tr>
 						<td><?php echo "{$rowl['IDLote']}"; ?></td>
 						<td><?php echo "{$rowl['ProductoNombre']}"; ?></td>
		 				<td><?php echo "{$rowl['LoteCantidad']}"; ?></td>
						<td><a href="eliminarproducto.php?IDLote=<?php echo $rowl['IDLote'] ?>" onclick="return confirm('Estas seguro de eliminar este producto?');">Eliminar Producto</a></td>

 					</tr>
 				
 		<?php
	
		}	
		?>

			

		</tbody>
	</table>



<tr><td><form id="frmagregaproductos" action="actualizarTratamiento.php" method="post"></td></tr> <br>
	<label>Seleccione el Producto</label><br/>
		<div class="styled-select" style="margin:0 auto;">
			<select name="IDProducto" style="color:#FFF">

<?php 
 		foreach($sql as $row){ 

				if (strcasecmp($row['ProductoEstado'],"Activo") == 0) { ?>

 					<option value= <?php echo "{$row['IDProducto']}"; ?> style="color:#000"><?php echo "{$row['ProductoNombre']}"; ?></option>

 					 ?> />

 					<?php }
 			} ?>

 				</select>	
		 </div>

		 <input type="text" name="LoteCantidad" placeholder="Cantidad"> KG 

	 				
				
				<input type="hidden" name="IDTratamiento" value= <?php echo $IDTratamiento ?> />

				<input id="button" type="button" onClick="document.getElementById('frmagregaproductos').submit()" value="Agregar">
	 				<br>
</form>