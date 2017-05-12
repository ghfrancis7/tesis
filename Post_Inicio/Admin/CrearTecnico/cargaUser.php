<?php 

	include("conexiontesis.php");

		if(isset($_POST['UsuNombre']) && !empty($_POST['UsuNombre'])&&
			isset($_POST['UsuApellido']) && !empty($_POST['UsuApellido'])&&
			isset($_POST['UsuDNI']) && !empty($_POST['UsuDNI'])&&
			isset($_POST['UsuFechaNacimiento']) && !empty($_POST['UsuFechaNacimiento'])&&
			isset($_POST['UsuCuenta']) && !empty($_POST['UsuCuenta'])&&
			isset($_POST['UsuPassword']) && !empty($_POST['UsuPassword'])&&
			isset($_POST['UsuEstado']) && !empty($_POST['UsuEstado']))

			echo "la concha de la lora";
	{

$conexion = mysql_connect($host,$user,$pw) or die ("Problema al conectar el host");
mysql_select_db($db,$conexion) or die ("problemas a conectar la db");

mysql_query("INSERT * FROM Usuario (UsuNombre,UsuApellido,UsuDNI,UsuFechaNacimiento,UsuCuenta,UsuPassword,UsuEstado,UsuFechaIngreso,UsuFechaEgreso,UsuMail,UsuTelefono,UsuDireccion,UsuRol,UsuLocalidadOpera) values ('$_POST[UsuNombre]','$_POST[UsuApellido]','$_POST[UsuDNI]','$_POST[UsuFechaNacimiento]','$_POST[UsuCuenta]','$_POST[UsuPassword]','$_POST[UsuEstado]','$_POST[UsuFechaIngreso]','$_POST[UsuFechaEgreso]','$_POST[UsuMail]','$_POST[UsuTelefono]','$_POST[UsuDireccion]','$_POST[UsuRol]','$_POST[UsuLocalidadOpera]')", $conexion);

	echo "Datos insertados correctamente";

}


?>
