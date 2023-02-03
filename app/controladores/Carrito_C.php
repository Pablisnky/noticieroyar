<?php
	class Carrito_C extends Controlador{
		
		public function __construct(){
            $this->Carrito_M = $this->modelo("Carrito_M");
			
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
		}

		//Invocada al hacer click sobre el icono de carrito de compras
		public function index(){
			
			if(!isset($Datos)){
				echo "El carrito esta vacio;";
			}
			else{
				$this->load->view('carrito_V', $Datos);
			}
		}

		//Invocado desde A_DetalleObra.js
		public function carrito_obras($ID_Artista, $NombreArtista, $ApellidoArtista, $NombreImgObra, $NombreObra, $TecnicaObra, $MedidaObra){
			// echo $ID_Artista . '<br>';
			// echo $NombreArtista . '<br>';
			// echo $ApellidoArtista . '<br>';
			// echo $NombreImgObra . '<br>';
			// echo $NombreObra . '<br>';
			// echo $TecnicaObra . '<br>';
			// echo $MedidaObra . '<br>';
			// exit;

			//Las variables se reciben desde Ajax, y los espacios en blancos que contengan fueron reemlazados por %20, con la funcion removerCaracteres se reemlazo por espacios en blanoc
			function removerCaracteres($url) {
				// Tranformamos todo a minusculas
				$url = strtolower($url);
				//Rememplazamos caracteres especiales latinos
				$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 20);
				$repl = array('a', 'e', 'i', 'o', 'u', 'n', ' ');
				$url = str_replace ($find, $repl, $url);
				// Añadimos los guiones
				$find = array(' ', '&', '\r\n', '\n', '+'); 
				$url = str_replace ($find, '-', $url);
				// Eliminamos y Reemplazamos demás caracteres especiales
				$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
				$repl = array('', '-', '');
				$url = preg_replace ($find, $repl, $url);
				return $url;
			}
			//Imprime titulo-de-prueba-url-amigable
			$NombreObra=  removerCaracteres($NombreObra);
			$TecnicaObra=  removerCaracteres($TecnicaObra);
			$TecnicaObra=  removerCaracteres($TecnicaObra);

			str_replace("-"," ",$NombreObra);

			$Datos = [
				'id_artista' => $ID_Artista,
				'nombreArtista' => $NombreArtista,
				'apellidoArtista' => $ApellidoArtista,
				'nombreImgObra' => $NombreImgObra,
				'nombre_Pintura' => str_replace("-"," ",$NombreObra),
				'tecnica_Pintura' => str_replace("-"," ",$TecnicaObra),
				'medida_Pintura' => str_replace("-"," ",$TecnicaObra)
			];

			// echo '<pre style="color: white">';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

			$this->vista('view/ajax/A_carrito_V', $Datos);
		}
	}