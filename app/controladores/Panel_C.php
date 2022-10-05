<?php
    class Panel_C extends Controlador{
	
		public function __construct(){
			$this->Panel_M = $this->modelo("Panel_M");
			
			//La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
			ocultarErrores();
		}

		public function index(){
			
		}

		public function portadas(){ 
			//CONSULTA las noticias de portada
			$NoticiasPortadas = $this->Panel_M->consultarNoticiasPortada();

			//CONSULTA las imagenes de noticias de portada
			$ImagenesNoticiasPortadas = $this->Panel_M->consultarImagenesNoticiasPortada();
			// echo '<pre>';
			// print_r($NoticiasPortadas);
			// echo '</pre>';
			// exit;

			//CONSULTA las noticias generales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();
			// echo '<pre>';
			// print_r($NoticiasGenerales);
			// echo '</pre>';
			// exit;

			$Datos = [
				'noticiasPortadas' => $NoticiasPortadas, //ID_Noticia, titulo, imagenNoticia 
				'imagenesNoticiasPortadas' => $ImagenesNoticiasPortadas,
				'noticiasGenerales' => $NoticiasGenerales, //
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/noticiasPortadas_V', $Datos);
		}

		public function Not_Generales(){ 
			//CONSULTA las noticias principales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();

			//CONSULTA las imagenes de noticias principales
			$imagenesNoticiasGenerales = $this->Panel_M->consultarImagenesNoticiasPortada();
			// echo '<pre>';
			// print_r($NoticiasPortadas);
			// echo '</pre>';
			// exit;

			$Datos = [
				'noticiasGenerales' => $NoticiasGenerales, //ID_Noticia, titulo, imagenNoticia 
				'imagenesNoticiasGenerales' => $imagenesNoticiasGenerales
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/NoticiasGenerales_V', $Datos);
		}
		
		// Redirecciona a la pagina de inicio del sitio web
		public function PaginaInicio(){
			// require_once(APPPATH . 'controllers/Inicio_C.php');

			// $this->VolverInicio = new Inicio_C();
			// $this->VolverInicio->Index();
		}

		// muestra formulario para agregar una noticia
		public function agregar_noticia(){
			//CONSULTA las secciones que tienen el periodico
			$Secciones = $this->Panel_M->consultarSecciones();

			$Datos = [
				'secciones' => $Secciones, //ID_Seccion, seccion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarNoticia_V', $Datos);
		}
		
		// Muestra formulario con la noticia a actualizar
		public function actualizar_noticia($ID_Noticia){
			echo $ID_Noticia;
			//CONSULTA la noticia a actualizar
			$NoticiaActualizar = $this->Panel_M->consultarNoticiaActualizar($ID_Noticia);
			
			$Datos = [
				'noticiaActualizar' => $NoticiaActualizar, //ID_Noticia, titulo, subtitulo, seccion, fecha, nombre_imagenNoticia
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarNoticia_V', $Datos);
		}

		//Muestra el select con las secciones
		public function Secciones(){
			
			$Secciones = $this->Panel_M->consultarSecciones();
			
			$Datos = [
				'secciones' => $Secciones, //ID_Seccion, seccion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
			
            // $this->vista("header/header_inicio"); 
            $this->vista("view/ajax/Secciones_V", $Datos );
		}

		// recibe formulario que agrega noticia
		public function recibeNotiAgregada(){
			if(isset($_FILES['imagenPrincipal']["name"])){
				$Titulo = $_POST['titulo'];
				$Sub_Titulo = $_POST['subtitulo'];
				$ID_Seccion = $_POST['ID_Seccion'];
				$Fecha = $_POST['fecha'];			
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "Titulo Noticia: " . $Titulo . '<br>';
				// echo "SubTitulo Noticia: " . $Sub_Titulo . '<br>';
				// echo "ID_Seccion Noticia: " . $ID_Seccion . '<br>';
				// echo "Fecha Noticia: " . $Fecha . '<br>';
				// echo "Nombre_imagen Noticia: " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen Noticia: " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen Noticia: " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
				
				//Se INSERTA la noticia en BD y se retorna el ID de la inserción
				$ID_Noticia = $this->Panel_M->InsertarNoticia($Titulo, $Sub_Titulo, $ID_Seccion, $Fecha);
				
				//Si existe imagenPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($_FILES['imagenPrincipal']["name"] != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
					
					//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);

					//Se INSERTA las imagenes de la noticia en BD
					$this->Panel_M->InsertarImagenesNoticiaPortada($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
				}
				else{
					//Se INSERTA solo el ID_Noticia
					$this->Panel_M->InsertarID_Imagenes($ID_Noticia);
				}
			}				

			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}

		public function recibeNotiActualizada(){
			$ID_Noticia = $_POST['ID_Noticia'];
			$ID_Seccion = $_POST['ID_Seccion'];
			$Titulo = $_POST['titulo'];
			$Sub_Titulo = $_POST['subtitulo']; 
			$Fecha = $_POST['fecha'];			

			// echo "ID_Noticia: " . $ID_Noticia . '<br>';
			// echo "ID_Seccion: " . $ID_Seccion . '<br>';
			// echo "Titulo Noticia: " . $Titulo . '<br>';
			// echo "SubTitulo Noticia: " . $Sub_Titulo . '<br>';
			// echo "Fecha Noticia: " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZA la noticia de portada seleccionada
			$this->Panel_M->ActualizarNoticia($ID_Noticia, $ID_Seccion, $Titulo, $Sub_Titulo, $Fecha);
				
			//Si existe imagenPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
			if($_FILES['imagenPrincipal']["name"] != ""){					
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "Nombre_imagen Noticia: " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen Noticia: " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen Noticia: " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;

				//Usar en remoto
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);

				//Se ACTUALIZA las imagenes de la noticia en BD
				$this->Panel_M->ActualizarImagenNoticiaPortada($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}
		
		// ELimina noticia
		public function eliminar_noticia($ID_Noticia){

			$this->Panel_M->eliminarNoticia($ID_Noticia);
			
			$this->Panel_M->eliminarImagenesNoticia($ID_Noticia);

			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}
		




















		
		public function actualizarPoncho($ID_Poncho){
			if($_FILES['imagen_Poncho']["name"][0] != ""){
				$Poncho = $_POST['nombre_Poncho'];		
				$nombre_ImgPoncho = $_FILES['imagen_Poncho']['name'];
				$tipo_ImgPoncho = $_FILES['imagen_Poncho']['type'];
				$tamanio_ImgPoncho = $_FILES['imagen_Poncho']['size'];

				// echo "Poncho: " . $Poncho . '<br>';
				// echo "nombre_ImgPoncho: " .  $nombre_ImgPoncho . '<br>';
				// echo "tipo_ImgPoncho: " .  $tipo_ImgPoncho . '<br>';
				// echo "tamanio_ImgPoncho: " .  $tamanio_ImgPoncho . '<br>';
				// exit;
				
				//Si existe foto_Producto y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($Poncho != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/ponchos/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/ponchos/';
					
					//Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagen_Poncho']['tmp_name'], $Directorio.$nombre_ImgPoncho);

					//Se INSERTA los datos del poncho en BD
					$this->Panel_M->insertarPoncho($Poncho, $nombre_ImgPoncho, $tipo_ImgPoncho, $tamanio_ImgPoncho);
				}
			}
			
			//Se ACTUALIZA el poncho en BD
			$this->Panel_M->actualizar_Poncho($ID_Poncho);

			redirect('SalomonPanel_C');
		}

		public function recibeUltimsObras(){
			if($_FILES['imagen_UltimasObras']["name"][0] != ""){
				$Nombre_UltimasObras = $_POST['nombre_UltimasObras'];		
				$Medidas_UltimasObras = $_POST['medidas_UltimasObras'];	
				$Tecnica_UltimasObras = $_POST['tecnica_UltimasObras'];	
				$Nombre_ImgUltimasObras = $_FILES['imagen_UltimasObras']['name'];
				$Tipo_ImgUltimasObras = $_FILES['imagen_UltimasObras']['type'];
				$Tamanio_ImgUltimasObras = $_FILES['imagen_UltimasObras']['size'];

				// echo "Pintura: " . $Nombre_UltimasObras . '<br>';
				// echo "Medidas Pintura: " . $Medidas_UltimasObras . '<br>';
				// echo "Tecnica Pintura: " . $Tecnica_UltimasObras . '<br>';
				// echo "nombre UltimasObras: " .  $nombre_ImgUltimasObras . '<br>';
				// echo "tipo_UltimasObras: " .  $tipo_ImgUltimasObras . '<br>';
				// echo "tamanio_UltimasObras: " .  $tamanio_ImgUltimasObras . '<br>';
				// exit;
				
				//Si existe imagen_UltimasObras y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($Nombre_UltimasObras != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/ultimaObra/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/ultimaObra/';
					
					//Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagen_UltimasObras']['tmp_name'], $Directorio.$Nombre_ImgUltimasObras);

					//Se INSERTA los datos de la ultima obra en BD
					$this->Panel_M->insertarUltimasObras($Nombre_UltimasObras, $Medidas_UltimasObras, $Tecnica_UltimasObras, $Nombre_ImgUltimasObras, $Tipo_ImgUltimasObras, $Tamanio_ImgUltimasObras);
				}
			}

			redirect('SalomonPanel_C');
		}
	
		public function recibePintura(){
			if(isset($_FILES['imagen_Pintura']["name"][0])){
				$ID_Coleccion = $_POST['coleccion'];
				$Nombre_Pintura = $_POST['nombre_Pintura'];		
				$Medidas_Pintura = $_POST['medidas_Pintura'];	
				$Tecnica_Pintura = $_POST['tecnica_Pintura'];	
				$nombre_ImgPintura = $_FILES['imagen_Pintura']['name'];
				$tipo_ImgPintura = $_FILES['imagen_Pintura']['type'];
				$tamanio_ImgPintura = $_FILES['imagen_Pintura']['size'];

				// echo "Nombre Pintura: " . $Nombre_Pintura . '<br>';
				// echo "Medidas Pintura: " . $Medidas_Pintura . '<br>';
				// echo "Tecnica Pintura: " . $Tecnica_Pintura . '<br>';
				// echo "nombre ImgPintura: " .  $nombre_ImgPintura . '<br>';
				// echo "tipo_ImgPintura: " .  $tipo_ImgPintura . '<br>';
				// echo "tamanio_ImgPintura: " .  $tamanio_ImgPintura . '<br>';
				// exit;
				
				//Si existe imagen_Pintura y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($Nombre_Pintura != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pinturas/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/pinturas/';
					
					//Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagen_Pintura']['tmp_name'], $Directorio.$nombre_ImgPintura);

					//Se INSERTA los datos de la pintura en BD y se retorna el ID de la inserción
					$ID_Pintura = $this->Panel_M->insertarPintura($ID_Coleccion, $Nombre_Pintura, $Medidas_Pintura, $Tecnica_Pintura, $nombre_ImgPintura, $tipo_ImgPintura, $tamanio_ImgPintura);
				}
			}

			
			//IMAGENES MINIATURAS
			//Se verifican cuantas imagenes se estan recibiendo, incluyendo las que ya existen en la BD
			if(isset($_FILES["imagen_Miniaturas"]["name"])) :
				$Cantidad = count($_FILES["imagen_Miniaturas"]["name"]);
				// echo 'Imagenes recibidas= ' . $Cantidad . '<br>';
				// exit;

				//Bucle que inserta las imagenes secundarias en la BD, cada vuelta inserta una imagen
				for($i = 0; $i < $Cantidad ; $i++) :
					//Las imagenes que existian en la BD se reciben sin su nombre por lo que no van a entrar en bucle, solo las imagenes que vienen por medio del input de agregar imagen son las que entran en el bucle
					if($_FILES['imagen_Miniaturas']['name'][$i] != ''){
						$nombre_imgMiniaturas = $_FILES['imagen_Miniaturas']['name'][$i];//se recibe un archivo con $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
						$tipo_imgMiniaturas = $_FILES['imagen_Miniaturas']['type'][$i];
						$tamanio_imgMiniaturas = $_FILES['imagen_Miniaturas']['size'][$i];

						// echo "Nombre de imagen secundaria= " . $nombre_imgMiniaturas . '<br>';
						// echo "Tipo de archivo = " .$tipo_imgMiniaturas .  "<br>";
						// echo "Tamaño = " . $tamanio_imgMiniaturas . "<br>";
						// echo "Tamaño maximo permitido = 2.000.000" . "<br>";// en bytes
						// echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";

						//Se verifica que tenga un formato y tamaño correcto
						if(($nombre_imgMiniaturas == !NULL) AND ($tamanio_imgMiniaturas <= 2000000)){
							//indicamos los formatos que permitimos subir a nuestro servidor
							if(($_FILES["imagen_Miniaturas"]["type"][$i] == "image/jpeg")
								|| ($_FILES["imagen_Miniaturas"]["type"][$i] == "image/jpg") || ($_FILES["imagen_Miniaturas"]["type"][$i] == "image/png")){

								// Ruta donde se guardarán las imágenes que subamos la variable superglobal
								// $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

								//Usar en remoto
								// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pinturas/miniaturaPinturas/';
								
								// usar en local
								$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/pinturas/miniaturaPinturas/';
											
								// finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
								move_uploaded_file($_FILES['imagen_Miniaturas']['tmp_name'][$i], $Directorio.$nombre_imgMiniaturas);
								
								//Para actualizar fotografias Miniaturas solo si se ha presionado el boton de buscar fotografia; en realidad no se actualizan, simplemente se insertan las que se reciben del formulario

								//Se consulta la cantidad de imagenes que tiene el producto en BD
								// $CantidadImagenes = $this->ConsultaCuenta_M->consultarCantidadImagenes($RecibeProducto['ID_Producto']);
								// echo 'Cantidad de imagenes en BD= ' . $CantidadImagenes[0]['CantidadFotos'] . '<br>';
								// exit;

								// $ImagenesRecibidas = $CantidadImagenes[0]['CantidadFotos'];
								// echo 'Cantidad de imagenes secundarias a isertar en BD= ' .  $ImagenesRecibidas . '<br>';
								// exit;

								// if($ImagenesRecibidas < 5){
									//Se INSERTAN las fotografias miniaturas de la pinturas
									$this->Panel_M->insertarMniaturas($ID_Pintura, $nombre_imgMiniaturas, $tipo_imgMiniaturas, $tamanio_imgMiniaturas);
									// echo 'Imagen insertada existosamente' . '<br>';
								// }
								// else{
								// 	echo 'Solo puede cargar cinco imagenes adicionales' . '<br>';
								// 	echo '<a href="javascript:history.back()">Regresar</a>';
								// 	exit();
								// }
							}
							else{
								echo 'La imagen no tiene el formato correcto' . '<br>';
								echo '<a href="javascript:history.back()">Regresar</a>';
								exit();
							}
						}
						else{
							echo 'Una imagen es demasiado grande' . '<br>';
							echo '<a href="javascript:history.back()">Regresar</a>';
							exit();
						}
					}
					// echo '<br>';
				endfor;            
			endif;

			redirect('SalomonPanel_C');
		}
		
		public function recibePoncho(){
			if($_FILES['imagen_Poncho']["name"][0] != ""){
				$Nombre_Poncho = $_POST['nombre_Poncho'];	
				$nombre_ImgPoncho = $_FILES['imagen_Poncho']['name'];
				$tipo_ImgPoncho = $_FILES['imagen_Poncho']['type'];
				$tamanio_ImgPoncho = $_FILES['imagen_Poncho']['size'];

				// echo "Nombre Poncho: " . $Nombre_Poncho . '<br>';
				// echo "nombre_ImgPoncho: " .  $nombre_ImgPoncho . '<br>';
				// echo "tipo_ImgPoncho: " .  $tipo_ImgPoncho . '<br>';
				// echo "tamanio_ImgPoncho: " .  $tamanio_ImgPoncho . '<br>';
				// exit;
				
				//Si existe imagen_Poncho y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($Nombre_Poncho != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/ponchos/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/ponchos/';
					
					//Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagen_Poncho']['tmp_name'], $Directorio.$nombre_ImgPoncho);

					//Se INSERTA los datos del poncho en BD
					$this->Panel_M->insertarPoncho($Nombre_Poncho, $nombre_ImgPoncho, $tipo_ImgPoncho, $tamanio_ImgPoncho);
				}
			}

			redirect('SalomonPanel_C');
		}

		public function recibeSobreMi(){
			$Perfil = $_POST['perfil'];		
			$nombre_Fotografia = $_FILES['imagen_Perfil']['name'];
			$tipo_Fotografia = $_FILES['imagen_Perfil']['type'];
			$tamanio_Fotografia = $_FILES['imagen_Perfil']['size'];

			// echo "Perfil: " . $Perfil . '<br>';
			// echo "nombre_Fotografia: " .  $nombre_Fotografia . '<br>';
			// echo "tipo_Fotografia: " .  $tipo_Fotografia . '<br>';
			// echo "tamanio_Fotografia: " .  $tamanio_Fotografia . '<br>';
			// exit;

			//Se INSERTA los datos del perfil en BD
			$this->Panel_M->actualizarPerfil($Perfil);
			
			//Si existe foto_Producto y tiene un tamaño correcto se procede a recibirla y guardar en BD
			if($nombre_Fotografia != ""){
				//Usar en remoto
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
				
				// usar en local
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PortafolioArtista_CI/assets/images/';
				
				//Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagen_Perfil']['tmp_name'], $Directorio.$nombre_Fotografia);

				//Se INSERTA la fotografia del perfil en BD
				$this->Panel_M->actualizarFotografia($nombre_Fotografia, $tipo_Fotografia, $tamanio_Fotografia);
			}

			redirect('SalomonPanel_C');
		}

		public function eliminarPintura($ID_Pintura){
			//Se ELIMINA la pintura en BD
			$this->Panel_M->eliminar_Pintura($ID_Pintura);

			//Se ELIMINA las miniaturas de la pintura en BD
			$this->Panel_M->eliminar_Miniaturas($ID_Pintura);

			redirect('SalomonPanel_C');
		}

		public function eliminarPoncho($ID_Poncho){
			//Se ELIMINA el poncho en BD
			$this->Panel_M->eliminar_Poncho($ID_Poncho);

			redirect('SalomonPanel_C');
		}

		public function eliminarUltimaObra($ID_UltimaObra){
			//Se ELIMINA el poncho en BD
			$this->Panel_M->eliminar_ID_UltimaObra($ID_UltimaObra);

			redirect('SalomonPanel_C');
		}

		public function recibeContacto(){
			$Nombre = $_POST['nombre'];		
			$Correo = $_POST['correo'];	
			$Ciudad = $_POST['ciudad'];		
			$Asunto = $_POST['asunto'];	

			// echo "Nombre: " . $Nombre . "<br>";
			// echo "Correo: " . $Correo . "<br>";
			// echo "Ciudad: " . $Ciudad . "<br>";
			// echo "Asunto: " . $Asunto . "<br>";

			$Datos = [
				'nombre' => $Nombre, 
			];
			
			$this->load->view('header/header_acuseRecibo');
			$this->load->view('acuseRecibo_V', $Datos);
		}
	}
