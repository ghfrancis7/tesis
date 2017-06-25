<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIS-GES</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<div class="UnderConstr">
    </div>
    <div class="header">
        <header>
        	<table width="100%">
                <tr>
                    <td width="25%" align="left"><img src="../Images/GrupoAcademico.jpg" width="638" height="633" style="width:100px;height:100px;"></td>
                    <td width="50%">Sistema de Gestion</td>
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
			</ul>
			<div class="clearfix"></div>
        </nav>
	</div>
	<div class="body">
		<div>
			<br><br>Disculpe esta seccion se encuentra <br>
            <span>En Construccion</span>
            <br>
		</div>
	</div>
</body>
</html>