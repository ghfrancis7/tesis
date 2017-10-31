<?php 
    $usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../../../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }

if($_SESSION["recargarDeIndex"] != 1){
  echo '<meta http-equiv="refresh" content="1">';
  $_SESSION["recargarDeIndex"] = 1;
}
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

		

		$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento T INNER JOIN planta P ON T.IDPlanta = P.IDPlanta where IDTratamiento = :IDTratamiento");
		$datosTratamiento->bindParam(":IDTratamiento", $IDTratamiento, PDO::PARAM_INT);
		$datosTratamiento->execute();
		$tratamiento = $datosTratamiento->fetch();

		?>
		 <label>Planta: </label>
                <?php echo $tratamiento['PlantaNombre']; ?>
                <br>
			<label>Nombre de Tratamiento: </label>
                <?php echo $tratamiento['TrataNombre']; ?>
                	<br>
                <label>Fecha de Inicio: </label>
                <?php echo $tratamiento['TrataFecha']; ?>
					<br>
                <label>Descripcion: </label>
                <?php echo $tratamiento['TrataDescripcion']; ?>


 		<table width="60%" border="1" style="margin: 0 auto;"> 
			
	            <tr>
	            <th>Producto</th>
	 			<th>Cantidad</th>
	 			</tr>
 			
		<tbody>
			<?php 
		
 			foreach($sqlt as $rowl){ ?>
 					<tr>
 						<td><?php echo "{$rowl['ProductoNombre']}"; ?></td>
		 				<td><?php echo "{$rowl['LoteCantidad']}"; ?></td>
 					</tr>
 		<?php
		}	
		?>
		</tbody>
	</table>

</form>
<td><a href="pdftratamientosporplanta.php?IDTratamiento=<?php echo $tratamiento['IDTratamiento'] ?> & PlantaNombre=<?php echo $tratamiento['PlantaNombre'] ?>"> Generar PDF </a></td>
<button onclick="goBack()">Volver</button>

<script>
function goBack() {
    window.history.back();
}
</script>