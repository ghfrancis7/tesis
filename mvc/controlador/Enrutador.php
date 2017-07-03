<?php 

	class Enrutador{
		public function cargarVista($vista){
			
			switch($vista):

					case "crearUsuario";
					include_once('vista/' . $vista . '.php');
					case "ver_usuario";
					include_once('vista/' . $vista . '.php');
					case "crearProducto";
					include_once('vista/' . $vista . '.php');
					case "crearCliente";
					include_once('vista/' . $vista . '.php');
					case "ver_producto";
					include_once('vista/' . $vista . '.php');
					case "ver_cliente";
					include_once('vista/' . $vista . '.php');
					case "editar_cliente";
					include_once('vista/' . $vista . '.php');
					case "editar_producto";
					include_once('vista/' . $vista . '.php');
					break;
					
				default:
						include_once('vista/error.php');

			endswitch;
		}

		public function validarGET($variable){

			if(empty($variable)){
				include_once('vista/menu.php');
			}else{
				return true;
			}
		}
	}



 ?>