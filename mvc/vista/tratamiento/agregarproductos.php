
<?php 
include_once("../../modelo/Producto.php");
		$controlador = new Producto();
		$sql= $controlador->listarProducto();

 		foreach($sql as $row){ 

				if (strcasecmp($row['ProductoEstado'],"Activo") == 0) { ?>
 				<tr>
	 			
			

	 			<td><?php echo "{$row['ProductoNombre']}"; ?>
					<input type="text" name="aa" placeholder="Cantidad"> KG <br>
	 			

<?php  
	 			
			
	 			}}?>
	 				
 				</tr>
 		