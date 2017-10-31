<?php 

include_once("Conexion.php");

	class Usuario{

		private $IDUsuario;
		private $IDRol;
		private $IDPlanta;
		private $IDTratamiento;
		private $UsuNombre;
		private $UsuApellido;
		private $UsuDNI;
		private $UsuDireccion;
		private $UsuTelefono;
		private $UsuMail;
		private $UsuFechaNacimiento;
		private $UsuLocalidadOpera;
		private $UsuCuenta;
		private $UsuPassword;
		private $UsuFechaIngreso;
		private $UsuFechaEgreso;
		private $UsuEstado;

		private $pdo;


	//metodos
		public function __construct(){
			$pdo = new Conexion();

		}
		public function set($atributo,$contenido){
			$this->atributo=$contenido;

		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function listarUsuario(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM usuario";

					$usuario = $pdo->mysql->query($q);
		
				return $usuario;
			
		}
		public function listarUsuariolog($idusuario){

				 $pdo = new Conexion();

				 $q="SELECT * FROM usuario WHERE IDUsuario=$idusuario";

					$usuario = $pdo->mysql->query($q);
		
				return $usuario;
			
		}
		public function listarUsuarioTecnico(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM usuario WHERE UsuRol='tecn'";

					$usuario = $pdo->mysql->query($q);
		
				return $usuario;
			
		}
		public function listarUsuarioAdmin(){

				 $pdo = new Conexion();

				 $q="SELECT * FROM usuario WHERE UsuRol='admin'";

					$usuario = $pdo->mysql->query($q);
		
				return $usuario;
			
		}
		public function buscarUsuario($buscar){

				 $pdo = new Conexion();

				 $q="SELECT * FROM usuario WHERE IDUsuario LIKE '%$buscar%' OR UsuNombre LIKE '%$buscar%' OR UsuDNI LIKE '%$buscar%' OR UsuTelefono LIKE '%$buscar%'OR UsuCuenta LIKE '%$buscar%'OR UsuLocalidadOpera LIKE '%$buscar%'";

					$producto = $pdo->mysql->query($q);
		
				return $producto;
			
		}
	}
 ?>