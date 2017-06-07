<?php 
	class usuario_modelo{

		private $db;
		private $usuario;

			
		public function __construct(){
			
			require_once("modelo/Conexion.php");

			$this->db=Conexion::Conexion();

			$this->usuario=array();

		}

		public function get_usuario(){

			$consulta=$this->db->query("SELECT * FROM Usuario");

			while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

				$this->usuario[]=$filas;

			}

			return $this->usuario;


		}

		public function create_usuario(){

			$consulta=$this->db->query("SELECT * FROM Usuario");

			$id=$_POST["IDUsuario"];
			$nombre=$_POST["UsuNombre"];
			$apellido=$_POST["UsuApellido"];
			$dni=$_POST["UsuDNI"];
			$fechanac=$_POST["UsuFechaNacimiento"];
			$dir=$_POST["UsuDireccion"];
			$tel=$_POST["UsuTelefono"];
			$mail=$_POST["UsuMail"];
			$localidadopera=$_POST["UsuLocalidadOpera"];
			$cuenta=$_POST["UsuCuenta"];
			$password=$_POST["UsuPassword"];
			$fechaingreso=$_POST["UsuFechaIngreso"];
			$fechaegreso=$_POST["UsuFechaEgreso"];
			$estado=$_POST["UsuEstado"];


			
			$sql="INSERT INTO Usuarios (UsuNombre,UsuApellido,UsuDNI,UsuFechaNacimiento,UsuDireccion,UsuTelefono,UsuMail,UsuLocalidadOpera,UsuCuenta,UsuPassword,UsuFechaIngreso,UsuFechaEgreso,UsuEstado)
			VALUES ($nombre,$apellido,$dni,$fechanac,$dir,$tel,$mail,$localidadopera,$cuenta,$password,$fechaingreso,$fechaegreso,$estado)";

			$consulta=$this->db->prepare($sql);
		

		}

		public function eliminar(){

			$sql="DELETE FROM Usuarios WHERE id='($this->id)'";

			$consulta=$this->db->prepare($sql);

		}
		public function editar(){
			$sql ="UPDATE Usuarios SET UsuNombre='(this->nombre)', UsuApellido='(this->apellido)',UsuDNI='(this->dni)',UsuFechaNacimiento='(this->fechanac)',UsuDireccion='(this->dir)',UsuTelefono='(this->tel)',UsuMail='(this->mail)',UsuLocalidadOpera='(this->localidadopera)',UsuCuenta='(this->cuenta)',UsuPassword='(this->password)',UsuFechaIngreso='(this->fechaingreso)',UsuFechaEgreso='(this->fechaegreso),UsuEstado='(this->estado)";

			$consulta=$this->db->prepare($sql);

		}
	}
 ?>