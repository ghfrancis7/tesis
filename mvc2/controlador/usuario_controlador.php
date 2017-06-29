<?php 

	include_once("modelo/Usuario.php");

	class controladorUsuario{


		//atributos
		private $usuario;

		//metodos

		public function __construct(){
			$usuario=new Usuario();
		}

		public function listarUsuarios(){
			$usuario=new Usuario();

			$resultado=$this->usuario->listarUsuarios();
			return $resultado;
		}

		public function crearUsuario($UsuNombre,$UsuApellido,$UsuDNI,$UsuDireccion,$UsuTelefono,$UsuMail,$UsuFechaNacimiento,$UsuLocalidadOpera,$UsuCuenta,$UsuPassword,$UsuFechaIngreso,$UsuFechaEgreso,$UsuEstado){
			
			$usuario=new Usuario();
			
			$resultado=$usuario->crearUsuario($UsuNombre, $UsuApellido, $UsuDNI, $UsuDireccion, $UsuTelefono, $UsuMail, $UsuFechaNacimiento, $UsuLocalidadOpera, $UsuCuenta,$UsuPassword, $UsuFechaIngreso, $UsuFechaEgreso, $UsuEstado);
			return $resultado;

		}
		public function eliminar($IDUsuario){
			$this->usuario->set("IDUsuario", $IDUsuario);
			$this->usuario->eliminar();
		}
		public function ver($IDUsuario){
			$this->usuario->set("IDUsuario", $IDUsuario);
			$datos = $this->usuario->ver();
			return $datos;
		}
		public function editar($IDUsuario){
			$this->usuario->set("IDUsuario", $IDUsuario);
			$this->usuario->ver();
			$this->usuario->editar();
		}

	}

	//require_once("vista/usuario_vista.php");



 ?>