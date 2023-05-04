<?php
    class Borrar_C extends Controlador{
        private $Borrar_M;
		private $ComprimirImagen;
	
		public function __construct(){
			$this->Borrar_M = $this->modelo("Borrar_M");
			
			//La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
			ocultarErrores();
		}
        
		// Se usa solo para cargar el metodo que se desea probar
		public function index(){			
			header('location:' . RUTA_URL . '/Borrar_C/insertarArtistas');
		}

		// Metodo para filtrar y sabear datos introducidos por los usuarios en formularios
		public function ValidarDatos(){
			function filtrado($datos){
				$datos = trim($datos); // Elimina espacios antes y después de los datos
				// $datos = stripslashes($datos); // Elimina backslashes \
				$datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
				return $datos;
			}

			if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){//recibeformulario

				$Titulo = filtrado($_POST["titulo"]);

				echo gettype($Titulo) . '<br>';
				echo $Titulo .'<br>';				

				echo "<h1>Listado de filtros disponible en PHP</h1>\n<table>\n<tr>\n";
				echo "<td><strong>Filter ID</strong></td>\n";
				echo "<td><strong>Filter Name</strong></td>\n</tr>";

				foreach(filter_list() as $id =>$filter) {
				  echo "<tr><td>$filter</td><td>".filter_id($filter)."</td></tr>\n";
				}
				echo "</table>\n";
			}
			else{
				
				$this->vista("header/header_SoloEstilos"); 
				$this->vista("view/borrar_V");
			}
		}

		// Metodo hace una copia de archivos de un directorio a otro
        public function cambia_directorio(){

			$ConsultaImagenes = $this->Borrar_M->ConsultarImagenes();

            $Datos = [
				'consultaImagenes' => $ConsultaImagenes
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

			// Se cambio el archivo de carpeta
			foreach($Datos['consultaImagenes'] as $Row) :
				//La dirección del archivo tiene que ser desde la raiz
				// en local la ruta tiene que ser desde "disco C"
				// en remoto desde la carpeta "home"
				
				// directorio actual en local
				// $currentLocation = dirname(RUTA_APP) . '/public/images/' . $Row['nombre_ImagenEfemeride'];
				
				// directorio actual en remoto
				$currentLocation = dirname(dirname(dirname(__FILE__))) . '/public/images/' . $Row['nombre_ImagenEfemeride'];
				
				//nuevo directoio en local
				// $newLocation = dirname(RUTA_APP) . '/public/images/noticias/' . $Row['nombre_ImagenEfemeride'];

				//nuevo directoio en remoto
				$newLocation = dirname(dirname(dirname(__FILE__))) . '/public/images/efemerides/' . $Row['nombre_ImagenEfemeride'];

				//Se cambia de directorio
				$moved = rename($currentLocation, $newLocation);
				
				if($moved){
					echo "File moved successfully";
				}	
				else{
					echo "Hubo un fallo";
				}
			endforeach;
		}		
		
		// Metodo elimina archivos de una directorio
        public function eliminar_archivo(){

			$ConsultaImagenes = $this->Borrar_M->ConsultarImagenesNoticias();

            $Datos = [
				'consultaImagenes' => $ConsultaImagenes
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

			// Se elimina del directorio del servidor
			foreach($Datos['consultaImagenes'] as $Row) :				
				$Eliminar = dirname(dirname(dirname(__FILE__))) . '/public/images/' . $Row['nombre_imagenNoticia'];

				echo $Eliminar .'<br>';
				
				if(!unlink($Eliminar)){
					echo "FALLO" . '<br>';
				}
				else{
					echo "ELIMINADO";
				}
			break;
			endforeach;
		}	

		//Metodo para comprimir imagenes			 
		public function llamar_comprimir(){
			if(isset($_FILES['images'])){
				//Ruta de la carpeta donde se guardarán las imagenes
				$patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/4/productos/';
				
				//Parámetros optimización, resolución máxima permitida
				$max_ancho = 1280;
				$max_alto = 900;
				
				if($_FILES['images']['type']=='image/png' || $_FILES['images']['type']=='image/jpeg' || $_FILES['images']['type']=='image/gif'){
				
					$medidasimagen= getimagesize($_FILES['images']['tmp_name']);
			
					//Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
					if($medidasimagen[0] < 1280 && $_FILES['images']['size'] < 300000){

						$nombrearchivo = $_FILES['images']['name'];
						move_uploaded_file($_FILES['images']['tmp_name'], $patch. '/' . $nombrearchivo);	
					}
					else{	//Si no, se generan nuevas imagenes optimizadas		
						$nombrearchivo=$_FILES['images']['name'];
			
						//Redimensionar
						$rtOriginal=$_FILES['images']['tmp_name'];
			
						if($_FILES['images']['type'] == 'image/jpeg'){
							$original = imagecreatefromjpeg($rtOriginal);
						}
						else if($_FILES['images']['type']=='image/png'){
							$original = imagecreatefrompng($rtOriginal);
						}	
						else if($_FILES['images']['type']=='image/gif'){
							$original = imagecreatefromgif($rtOriginal);
						}
			
						list($ancho,$alto)=getimagesize($rtOriginal);
			
						$x_ratio = $max_ancho / $ancho;
						$y_ratio = $max_alto / $alto;
			
			
						if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
							$ancho_final = $ancho;
							$alto_final = $alto;
						}
						elseif (($x_ratio * $alto) < $max_alto){
							$alto_final = ceil($x_ratio * $alto);
							$ancho_final = $max_ancho;
						}
						else{
							$ancho_final = ceil($y_ratio * $ancho);
							$alto_final = $max_alto;
						}
			
						$lienzo = imagecreatetruecolor($ancho_final, $alto_final); 
			
						imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);
			 			 
						$cal = 8;
						
						if($_FILES['images']['type'] == 'image/jpeg'){
							imagejpeg($lienzo, $patch . '/' . $nombrearchivo);
						}
						else if($_FILES['images']['type'] == 'image/png'){
							imagepng($lienzo, $patch . '/' . $nombrearchivo);
						}
						else if($_FILES['images']['type']=='image/gif'){
							imagegif($lienzo, $patch . '/' . $nombrearchivo);
						}

						echo 'fichero comprimido exitosamente';
					}
				}
				else{
					echo 'fichero no soportado';
				} 
			}
		}

		public function actualizarSecciones(){
			// se consultan los ID_Productos			
			$ID_Productos = $this->Borrar_M->ConsultarID_Producto();	
			echo '<pre>';
			print_r($ID_Productos);
			echo '</pre>';

			//SE borrar todas las DT entre ID_Productos y ID_Secciones
			// $this->Borrar_M->eliminar_DT($ID_Productos);
			$this->insertar_DT($ID_Productos);
		}

		public function insertar_DT($ID_Productos){
			
			$this->Borrar_M->InsertaDT($ID_Productos);
		}
		
		//INSERTA artista en la tabla suscriptores, ya estaban en la tabla artistas pero deben ser cambiados a la tabla suscriptores
		public function insertarArtistas(){
			
			$Artistas = $this->Borrar_M->seleccionarArtistas();
			echo '<pre>';
			print_r($Artistas);
			echo '</pre>';
		}
	}
?>