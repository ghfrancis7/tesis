<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS.GES.</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
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
		// Establecer el idioma al Español para strftime().
		setlocale( LC_TIME, 'spanish' );

		// Si no se ha seleccionado mes, ponemos el actual y el año
		$month = isset( $_GET[ 'month' ] ) ? $_GET[ 'month' ] : date( 'Y-n' );
		$week = 1;
		for ( $i=1;$i<=date( 't', strtotime( $month ) );$i++ ) {
			$day_week = date( 'N', strtotime( $month.'-'.$i )  );			
			$calendar[ $week ][ $day_week ] = $i;
			if ( $day_week == 7 )
				$week++;
		}
    ?>
	<div class="backgroundTable">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Logueado como: <?php echo $usuario?><br>Rol:Tecnico</td>
                    <td width="25%">
                    <form id="frmLogin" action="../Login PHP/logout.php" method="post">
                        <input name="return" type="hidden" value="<?php echo urlencode($_SERVER["PHP_SELF"]);?>" />
                        <input id="button" type="button" onClick="document.getElementById('frmLogin').submit()" value="Sign Out"/>
                    </form>
                    </td>
                </tr>
        	</table>
        </header>
    </div>
	<div class="wrap">
		<nav>
			<ul class="menu">
				<li><a href="../Post_Inicio/sesionTecn.php"><span class="iconic home"></span> Home</a></li>
				<li><a href="Tecn_Agenda.php"><span class="iconic book"></span> Agenda</a></li>
				<li><a href="Tecn_Cliente.php"><span class="iconic new-window"></span> Clientes</a></li>
				<li><a href="Tecn_Tratamiento.php"><span class="iconic beaker"></span> Tratamiento</a></li>
				<li><a href="Tecn_Producto.php"><span class="iconic cog"></span> Producto</a></li>
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
    <div class="tablas">
        	<table width="40%" border="1" style="margin: 0 auto; font-size:14px; font-family: 'Exo', sans-serif;">
			<thead>
				<tr>
					<td colspan="7" style="font-size:20px;"><?php echo strftime( '%B %Y', strtotime( $month ) ); ?></td>
				</tr>
				<tr>
					<td>Lunes</td>
					<td>Martes</td>			
					<td>Miercoles</td>			
					<td>Jueves</td>			
					<td>Viernes</td>			
					<td>Sabado</td>			
					<td>Domingo</td>			
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $calendar as $days ) : ?>
					<tr>
						<?php for ( $i=1;$i<=7;$i++ ) : ?>
							<td>
								<?php echo isset( $days[ $i ] ) ? $days[ $i ] : ''; ?>
							</td>
						<?php endfor; ?>
					</tr>
				<?php endforeach; ?>
                <tr>
					<td colspan="7">
						<form id="verMes" method="get">
							<input name="month" type="month" class="styled-select" style="font-family:  'Exo', sans-serif; color:#000">
							<input id="button" type="button" onClick="document.getElementById('verMes').submit()" value="Ver Mes"/>
						</form>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7">
						<form id="verfecha" name="verfecha" action="" method="POST">
							<input name="date" type="date" class="styled-select" style="font-family:  'Exo', sans-serif; color:#000">

							<input id="button" type="button" onClick="document.getElementById('verfecha').submit()" value="Ver Citas"/>
							<!-- En el Documento PHP donde se generará la consulta debe convertirse este dato en el dato del tipo aceptado por la tabla con la siguiente instruccion:
                            $var = $_POST['verfecha'];
                            $date = str_replace('/', '-', $var);
                            date('Y-m-d', strtotime($date)); -->
						</form>
						<form id="crearCita" name="CrearCita" action="" method="POST">
							<input id="button" type="button" onClick="document.getElementById('crearCita').submit()" value="Nueva Cita"/>
							<!-- En el Documento PHP donde se generará la consulta debe convertirse este dato en el dato del tipo aceptado por la tabla con la siguiente instruccion:
                            $var = $_POST['verfecha'];
                            $date = str_replace('/', '-', $var);
                            date('Y-m-d', strtotime($date)); -->
						</form>
					</td>
				</tr>
			</tfoot>
		</table>
    </div>
</body>
</html>