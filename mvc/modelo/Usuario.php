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

		public function crearUsuario($UsuNombre,$UsuApellido,$UsuDNI,$UsuFechaNacimiento,$UsuDireccion,$UsuTelefono,$UsuMail,$UsuLocalidadOpera,$UsuCuenta,$UsuPassword,$UsuFechaIngreso,$UsuFechaEgreso,$UsuEstado){

			$sql2="SELECT * FROM Usuario Where IDUsuario = '($this->IDUsuario)'";
			$resultado = $this->con->consultaRetorno($sql2);
			$num=mysql_num_rows($resultado);

			if ($num !=0) {

				return false;

			}else{

				$sql="INSERT INTO Usuario (UsuNombre,UsuApellido,UsuDNI,UsuFechaNacimiento,UsuDireccion,UsuTelefono,UsuMail,UsuLocalidadOpera,UsuCuenta,UsuPassword,UsuFechaIngreso,UsuFechaEgreso,UsuEstado)
			VALUES ('$UsuNombre', '$UsuApellido', '$UsuDNI', '$UsuFechaNacimiento', '$UsuDireccion', '$UsuTelefono', '$UsuMail', '$UsuLocalidadOpera', '$UsuCuenta', '$UsuPassword', '$UsuFechaIngreso', '$UsuFechaEgreso', '$UsuEstado')";

				$this->con->consultaSimple($sql);
				return true;
			}
		}

		public function eliminar(){

			$sql="DELETE FROM Usuario WHERE IDUsuario='($this->IDUsuario)'";

			$this->con->consultaSimple($sql);

		}
		
		public function ver(){

			$sql="SELECT * FROM Usuario WHERE IDUsuario ='($this->IDUsuario)' LIMIT 1";
			$resultado = $this->con->consultaRetorno($sql);
			$row =mysql_fetch_assoc($resultado);

			//set
			$this->IDUsuario = $row['IDUsuario'];
			$this->IDRol = $row['IDRol'];
			$this->IDPlanta = $row['IDPlanta'];
			$this->IDTratamiento = $row['IDTratamiento'];
			$this->UsuNombre = $row['UsuNombre'];
			$this->UsuApellido = $row['UsuApellido'];
			$this->UsuDNI = $row['UsuDNI'];
			$this->UsuFechaNacimiento = $row['UsuFechaNacimiento'];
			$this->UsuDireccion = $row['UsuDireccion'];
			$this->UsuTelefono = $row['UsuTelefono'];
			$this->UsuMail = $row['UsuMail'];
			$this->UsuFechaIngreso = $row['UsuFechaIngreso'];
			$this->UsuFechaEgreso = $row['UsuFechaEgreso'];
			$this->UsuEstado = $row['UsuEstado'];

			return $row;

		}

		public function editar(){
			$sql ="UPDATE Usuario SET UsuNombre='(this->UsuNombre)', UsuApellido='(this->UsuApellido)',UsuDNI='(this->UsuDNI)',UsuFechaNacimiento='(this->UsuFechaNacimiento)',UsuDireccion='(this->UsuDireccion)',UsuTelefono='(this->UsuTelefono)',UsuMail='(this->UsuMail)',UsuLocalidadOpera='(this->UsuLocalidadOpera)',UsuCuenta='(this->UsuCuenta)',UsuPassword='(this->UsuPassword)',UsuFechaIngreso='(this->UsuFechaIngreso)',UsuFechaEgreso='(this->UsuFechaEgreso),UsuEstado='(this->UsuEstado)' WHERE IDUsuario = '($this->IDUsuario)'";
			$this->con->consultaSimple($sql);
		}
	}

 ?>