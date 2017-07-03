<?php 

include_once("../modelo/Cliente.php");

	class controladorCliente{

		private $cliente;

		public function __construct(){

			$cliente = new Cliente();

		}

		public function crearCliente($ClienteNombre,$ClienteCuit,$ClienteDireccion,$ClienteTelefono,$ClienteCantidadPlantas,$ClienteFechaAlta,$ClienteFechaBaja,$ClienteEstado){

			$cliente = new Cliente();

			$resultado=$cliente->crearCliente($ClienteNombre,$ClienteCuit,$ClienteDireccion,$ClienteTelefono,$ClienteCantidadPlantas,$ClienteFechaAlta,$ClienteFechaBaja,$ClienteEstado);
				return $resultado;
	}

	public function listarCliente(){
			$cliente=new Cliente();

			$resultado=$this->cliente->listarCliente();
			return $resultado;
		}
		
		public function ver($IDCliente){
			$this->cliente->set("IDCliente", $IDCliente);
			$datos = $this->cliente->ver();
			return $datos;
		}
}


 ?>