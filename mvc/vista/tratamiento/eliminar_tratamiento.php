<?php 
	
	$usuario="";
    $idUsuario=1;
        session_start();
        if (!isset($_SESSION['id'])){
            header ("Location:../index.html");
        } else {
            $usuario = $_SESSION['nom']." ".$_SESSION['ape'];
            $idUsuario = $_SESSION['id'];
        }

	require ("../../modelo/Conexion.php");
	$pdo = new Conexion();
	$IDTratamiento = $_GET['IDTratamiento'];
	$TrataFecha= date('Y/m/d');
	$TrataFechaBaja =date('Y/m/d');

		//try {

				$pdo->mysql->beginTransaction();

				$datosTratamiento = $pdo->mysql->prepare("SELECT * FROM tratamiento where IDTratamiento = :IDTratamiento");
				$datosTratamiento->bindParam(":IDTratamiento", $IDTratamiento, PDO::PARAM_INT);
				$datosTratamiento->execute();
				$trata = $datosTratamiento->fetch();	
				
				if ($trata['TrataEstado']=="Inactivo") {
					$TrataEstado="Activo";
					$TrataFechaBaja=NULL;

							$pst = $pdo->mysql->prepare("INSERT INTO tratamiento (IDUsuario,IDPlanta,TrataNombre,TrataFecha,TrataFechaBaja,TrataNumAnalisis,TrataDescripcion,TrataEstado) VALUES (:IDUsuario,:IDPlanta,:TrataNombre,:TrataFecha,:TrataFechaBaja,:TrataNumAnalisis,:TrataDescripcion,:TrataEstado)");
			$pst->bindParam(":IDUsuario",$idUsuario,PDO::PARAM_STR);
			$pst->bindParam(":IDPlanta",$IDPlanta,PDO::PARAM_STR);
			$pst->bindParam(":TrataNombre",$TrataNombre,PDO::PARAM_STR);
			$pst->bindParam(":TrataFecha",$TrataFecha,PDO::PARAM_STR);
			$pst->bindParam(":TrataFechaBaja",$TrataFechaBaja,PDO::PARAM_STR);
			$pst->bindParam(":TrataNumAnalisis",$TrataNumAnalisis,PDO::PARAM_STR);
			$pst->bindParam(":TrataDescripcion",$TrataDescripcion,PDO::PARAM_STR);
			$pst->bindParam(":TrataEstado",$TrataEstado,PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit() ;



				}elseif ($trata['TrataEstado']=="Activo") {
					$TrataEstado="Inactivo";

					$pst = $pdo->mysql->prepare("UPDATE tratamiento set TrataEstado =:TrataEstado , TrataFechaBaja =:TrataFechaBaja where IDTratamiento = :IDTratamiento");
				$pst->bindParam(":IDTratamiento",$IDTratamiento,PDO::PARAM_STR);
				$pst->bindParam(":TrataEstado",$TrataEstado,PDO::PARAM_STR);
				$pst->bindParam(":TrataFechaBaja",$TrataFechaBaja,PDO::PARAM_STR);

				
				$pst->execute();

				$pdo->mysql->commit();
				}

					header("Location:ver_activo.php");
				
		//} catch (Exception $e) {
		//	$pdo->mysql->rollback();
					echo "No se pudo modificar el estado";	
		//}
 ?>