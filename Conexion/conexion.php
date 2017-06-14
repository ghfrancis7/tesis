<?php
class conexion{
	private $conexion;
	private $server = "localhost";
	private $usuario = "root";
	private $pass = "";
	private $db = "dbtesis";
	private $usr;
	private $pwd;
	
	public function __construct(){
		$this->conexion = new mysqli($this->server,$this->usuario,$this->pass,$this->db);
		
		if ($this->conexion->connect_errno){
			die("Fallo al tratar de conectar con MySQL: (".$this->conexion->connect_errno.")");
		}
	}
	
	public function cerrar(){
		$this->conexion->close();
	}
	
	public function login($user,$pass){
		$this->usr = $user;
		$this->pwd = $pass;
		
		$query = "SELECT IDUsuario, UsuNombre, UsuApellido, UsuCuenta, UsuPassword, UsuRol, UsuEstado FROM usuario WHERE UsuCuenta= '".$this->usr."' AND UsuPassword = '".$this->pwd."'";
		
		$consulta = $this->conexion->query($query);
		
		if ($row = mysqli_fetch_array($consulta)){
			session_start();
			$_SESSION['id'] = $row['IDUsuario'];
			$_SESSION['nom'] = $row['UsuNombre'];
			$_SESSION['ape'] = $row['UsuApellido'];
			
			if ((strnatcasecmp($row['UsuEstado'],"activo") == 0) and $row['UsuRol'] == 0){
				header("location:../Post_Inicio/Admin/sesionAdmin.php");
			} else {
				header("location:../Post_Inicio/Tecnico/sesionTecnico.php");
			}
		} else {
			echo "Usuario o Password incorrectos";
		}
	}
}
?>