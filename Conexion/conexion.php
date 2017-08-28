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
		
		$query = "SELECT IDUsuario, UsuNombre, UsuApellido, UsuCuenta, UsuPassword, UsuRol, UsuEstado FROM usuario WHERE UsuCuenta LIKE '".$this->usr."' AND UsuPassword LIKE '".$this->pwd."' AND UsuEstado LIKE 'Activo'";
		
		$consulta = $this->conexion->query($query);
		
		if ($row = mysqli_fetch_array($consulta)){
			session_start();
			$_SESSION['id'] = $row['IDUsuario'];
			$_SESSION['nom'] = $row['UsuNombre'];
			$_SESSION['ape'] = $row['UsuApellido'];
			
			if (strnatcasecmp($row['UsuEstado'],"activo") == 0) {
				if (strnatcasecmp($row['UsuRol'],"admin") == 0){
					header("location:../Post_Inicio/sesionAdmin.php");
				} else if(strnatcasecmp($row['UsuRol'],"tecn") == 0) {
					header("location:../Post_Inicio/sesionTecn.php");
				}
			} else {
				header("location:../Login PHP/UserInactivo.php");
			}
		} else {
			header("location:../Login PHP/UserPassFail.php");
		}
	}
}
?>