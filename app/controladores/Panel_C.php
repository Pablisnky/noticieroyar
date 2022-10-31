<?php
    class Panel_C extends Controlador{
	
		public function __construct(){
			$this->Panel_M = $this->modelo("Panel_M");
			
			//La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
			ocultarErrores();
		}

		public function index(){
			echo 'hola';
		}

		public function portadas(){ 
			//CONSULTA las noticias de portada
			$NoticiasPortadas = $this->Panel_M->consultarNoticiasPortada();
			
			//CONSULTA las secciones de las noticias de portada
			$SeccionesNoticiasPortadas = $this->Panel_M->consultarSeccionessNoticiasPortada();

			//CONSULTA las imagenes de noticias de portada
			$ImagenesNoticiasPortadas = $this->Panel_M->consultarImagenesNoticiasPortada();

			//CONSULTA las noticias generales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();
			
			//CONSULTA si hay asociado una coleccion 180°
			$Coleccion = $this->Panel_M->consultarColeccion();

			//suma la cantidad de visitas a una noticia
			$Visitas = $this->Panel_M->consultaVisitasNoticia();

			$Datos = [
				'noticiasPortadas' => $NoticiasPortadas, //ID_Noticia, titulo, imagenNoticia 
				'imagenesNoticiasPortadas' => $ImagenesNoticiasPortadas,
				'seccionesNoticiasPortadas' => $SeccionesNoticiasPortadas,
				'noticiasGenerales' => $NoticiasGenerales, // $
				'coleccion' => $Coleccion, //ID_Noticia, nombreColeccion
				'visitas' => $Visitas
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
			//CONSULTA las noticias generales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();

			//CONSULTA las imagenes de noticias generales
			$imagenesNoticiasGenerales = $this->Panel_M->consultarImagenesNoticiasGenerales();
			// echo '<pre>';
			// print_r($NoticiasPortadas);
			// echo '</pre>';
			// exit;

			//CONSULTA las secciones de noticias de generales
			$SeccionessNoticiasGenerales = $this->Panel_M->consultarSeccionessNoticiasGenerales();
			
			//suma la cantidad de visitas a una noticia
			$Visitas = $this->Panel_M->consultaVisitasNoticia();

			$Datos = [
				'noticiasGenerales' => $NoticiasGenerales, //ID_Noticia, titulo, imagenNoticia 
				'imagenesNoticiasGenerales' => $imagenesNoticiasGenerales,
				'seccionessNoticiasGenerales' => $SeccionessNoticiasGenerales,
				'visitas' => $Visitas
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/NoticiasGenerales_V', $Datos);
		}
		
		//Muestra efemerides
		public function efemerides(){ 
			//CONSULTA las efemerides
			$Efemerides = $this->Panel_M->consultarEfemerides();

			$Datos = [
				'efemerides' => $Efemerides //ID_Efemeride, titulo, contenido, Nombre_imagen, fecha 
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_efemeride_V', $Datos);
		}
		
		//Muestra eventos en agenda
		public function agenda(){ 
			//CONSULTA las efemerides
			$Agenda = $this->Panel_M->consultarAgenda();

			$Datos = [
				'agenda' => $Agenda //ID_Agenda, nombre_imagenAgenda, caducidad
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_agenda_V', $Datos);
		}
		
		//Muestra los anuncios de publicidad disponibles
		public function publicidad(){ 
			//CONSULTA los anuncios de publicidad
			$Anuncio = $this->Panel_M->consultarAnuncio();

			$Datos = [
				'anuncio' => $Anuncio
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_publicidad_V', $Datos);
		}
				
		//Muestra los anuncios de publicidad en una ventana modal para seleccionar el deseado
		public function Anuncios(){ 
			//CONSULTA los anuncios de publicidad
			$Anuncio = $this->Panel_M->consultarAnuncio();

			$Datos = [
				'anuncios' => $Anuncio//nombre_imagenPublicidad
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			// $this->vista('header/header_SoloEstilos');
            $this->vista("modal/modal_anunciosDisponibles", $Datos);
		}

		//Muestra las colecciones
		public function coleccion(){ 
			//CONSULTA los colecciones 
			$Coleccion = $this->Panel_M->consultarColeccionPanel();

			$Datos = [
				'colecciones' => $Coleccion //ID_Coleccion , nombreColeccion, nombre_imColeccion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_coleccion_V', $Datos);
		}
		//Muestra obituario
		public function obituario(){ 
			//CONSULTA las obituario
			$Obituario = $this->Panel_M->consultarObituario();

			$Datos = [
				'obituario' => $Obituario //ID_Obituario, nombre_difunto, capilla_velacion, cementerio, ciudad, hora_velacion, funeraria, fecha_entierro
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_obituario_V', $Datos);
		}

		//Muestra las secciones en una ventna modal
		public function Secciones(){
			// CONSULTA las secciones del periodico
			$Secciones = $this->Panel_M->consultarSecciones();
			
			$Datos = [
				'secciones' => $Secciones, //ID_Seccion, seccion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
			
            $this->vista("header/header_SoloEstilos"); 
            $this->vista("modal/modal_seccionesDisponibles", $Datos);
		}

		// // Redirecciona a la pagina de inicio del sitio web
		// public function PaginaInicio(){
		// 	// require_once(APPPATH . 'controllers/Inicio_C.php');

		// 	// $this->VolverInicio = new Inicio_C();
		// 	// $this->VolverInicio->Index();
		// }
		
		// muestra formulario para agregar una efemeride
		public function agregar_efemeride(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarEfemerides_V');
		}

		// muestra formulario para agregar un evento en agenda
		public function agregar_agenda(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarAgenda_V');
		}
		
		// muestra formulario para agregar un anuncio de publicidad
		public function agregar_publicidad(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarPublicidad_V');
		}

		// muestra formulario para agregar una coleccion
		public function agregar_coleccion(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarColeccion_V');
		}

		// muestra formulario para agregar una noticia
		public function agregar_noticia(){
			//CONSULTA las secciones que tienen el periodico
			$Secciones = $this->Panel_M->consultarSecciones();
			
			// CONSULTA las fuentes del periodico
			$Fuentes = $this->Panel_M->consultarFuentes();
			
			$Datos = [
				'fuentes' => $Fuentes //ID_Fuente, fuente
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
			//CONSULTA la noticia a actualizar
			$NoticiaActualizar = $this->Panel_M->consultarNoticiaActualizar($ID_Noticia);

			//CONSULTA las imagenes de la noticia a actualizar
			$ImagenesNoticiaActualizar = $this->Panel_M->consultarImagenesNoticiaActualizar($ID_Noticia);

			// CONSULTA las fuentes del periodico
			$Fuentes = $this->Panel_M->consultarFuentes();
			
			// CONSULTA el anuncio publicitario de la noticia
			$Anuncio = $this->Panel_M->consultarAnuncioEspecifico($ID_Noticia);
			
			$Datos = [
				'noticiaActualizar' => $NoticiaActualizar, //ID_Noticia, titulo, subtitulo, seccion, fecha, nombre_imagenNoticia, ImagenPrincipal, fuente 
				'imagenesNoticiaActualizar' => $ImagenesNoticiaActualizar, //ID_Noticia, ID_Imagen, nombre_imagenNoticia, ImagenPrincipal
				'fuentes' => $Fuentes,
				'anuncio' => $Anuncio //ID_Anuncio, nombre_imagenPublicidad
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarNoticia_V', $Datos);
		}
		
		// Muestra formulario con la efemeride a actualizar
		public function actualizar_efemeride($ID_Efemeride){
			//CONSULTA la efemeride a actualizar
			$EfemerideActualizar = $this->Panel_M->consultarEfemerideActualizar($ID_Efemeride);
			
			$Datos = [
				'efemerideActualizar' => $EfemerideActualizar //titulo, contenido, fecha, nombre_ImagenEfemeride, imagenPrincipalEfemeride
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarEfemeride_V', $Datos);
		}
		
		// Muestra formulario con el evento a actualizar
		public function actualizar_agenda($ID_Agenda){
			//CONSULTA el evento de agenda a actualizar
			$AgendaActualizar = $this->Panel_M->consultarAgendaActualizar($ID_Agenda);
			
			$Datos = [
				'agendaActualizar' => $AgendaActualizar //ID_Agenda, nombre_imagenAgenda, caducidad
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarAgenda_V', $Datos);
		}
		
		// recibe formulario que agrega efemeride
		public function recibeEfemerideAgregada(){
			if(isset($_FILES['imagenPrincipal']["name"])){
				$Titulo = $_POST['titulo'];
				$Contenido = $_POST['contenido'];
				$Fecha = $_POST['fecha'];						
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "Titulo : " . $Titulo . '<br>';
				// echo "Contenido : " . $Contenido . '<br>';
				// echo "Fecha : " . $Fecha . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
				
				//Se INSERTA la efemeride y se retorna el ID de la inserción
				$ID_Efemeride = $this->Panel_M->InsertarEfemeride($Titulo, $Contenido, $Fecha);
				
				//Se INSERTA la imagen principal de la efemeride
				$this->Panel_M->InsertarImagenPrincipalEfemeride($ID_Efemeride, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);

				//Usar en remoto
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}

		// recibe el formulario que agrega noticia
		public function recibeNotiAgregada(){
			if(isset($_FILES['imagenPrincipal']["name"])){
				$Titulo = $_POST['titulo'];
				$Sub_Titulo = $_POST['subtitulo'];
				$Contenido = $_POST['contenido'];
				$Seccion = $_POST['seccion'];
				$Fecha = $_POST['fecha'];			
				$Fuente = $_POST['fuente'];	 				
				$ID_Anuncio = $_POST['id_anuncio'];		

				// echo "Titulo : " . $Titulo . '<br>';
				// echo "SubTitulo : " . $Sub_Titulo . '<br>';
				// echo "Contenido : " . $Contenido . '<br>';
				// echo "Seccion : " . $Seccion . '<br>';
				// echo "Fecha : " . $Fecha . '<br>';
				// echo "Fuente : " . $Fuente . '<br>';
				// echo "ID_Anuncio : " . $ID_Anuncio . '<br>';
				// exit;
								
				//Se INSERTA la noticia y se retorna el ID de la inserción
				$ID_Noticia = $this->Panel_M->InsertarNoticia($Titulo, $Sub_Titulo, $Contenido, $Fecha, $Fuente);

				//Se verifica si la fuente de la noticia ya existe en la BD, sino existe se inserta
				$VerificaFuente = $this->Panel_M->consultarFuentes();

				// echo '<pre>';
				// print_r($VerificaFuente);
				// echo '</pre>';
				// exit;

				$AgregaFuente = [];
				$palabra_a_buscar = $Fuente;
				foreach($VerificaFuente as $key => $value)	:
					$Indice = array_search($palabra_a_buscar, $value);
					if($Indice){//si la fuente existe entra al IF
						//No se inserta en la BD	
						array_push($AgregaFuente, $palabra_a_buscar);

						// echo '<pre>';
						// print_r($AgregaFuente);
						// echo '</pre>';
					}
				endforeach;

				if($AgregaFuente == Array()){//Si $AgregaFuente esta vacio, la fuente no existe y se inserta en BD
					//Se INSERTA la nueva fuente 
					$this->Panel_M->InsertarFuente($Fuente);
				}

				// Se inserta los ID en la tabla de dependencias transitivas "noticias_secciones" 
				if(ctype_alpha($Seccion)){//Si Seccion es solo letras, hay una sola seccion
					
					//Se consulta el ID_Seccion segun la seccion recibida
					$ID_Seccion = $this->Panel_M->Consultar_ID_Seccion($Seccion);
					
					// echo $ID_Seccion['ID_Seccion'];

					// echo '<pre>';
					// print_r($ID_Seccion);
					// echo '</pre>';
					// exit();

					///se INSERTA los ID en tabla de dependencia trancitiva
					$Insertar_DT_noticia_seccion = $this->Panel_M->Insertar_DT_noticia_seccion($ID_Noticia, $ID_Seccion['ID_Seccion']);
				}
				else{//$Seccion contiene una cadena con las secciones seleccionadas, separados por coma,
					// echo $Seccion . '<br>';
					//se convierte $Seccion en array
					$Seccion = explode(',', $Seccion);
					// echo '<pre>';
					// print_r($Seccion);
					// echo '</pre>';
					
					$Elementos = count($Seccion);
					$SeccionesVarias = "";
					//Se convierte el array en una cadena con sus elementos entre comillas
					for($i = 0; $i < $Elementos; $i++){
						$SeccionesVarias .= " '" . $Seccion[$i] . "', ";
					}
					
					// echo $SeccionesVarias . '<br>';

					// Se quita el ultimo espacio y coma del string generado con lo cual
					// el string queda 'id1','id2','id3'
					$SeccionesVarias = substr($SeccionesVarias,0,-2);
					// echo $SeccionesVarias . '<br>';

					//Se consulta el ID_Seccion segun la seccion recibida
					$ID_Secciones = $this->Panel_M->ConsultarVarios_ID_Seccion($SeccionesVarias);
					
					// echo '<pre>';
					// print_r($ID_Secciones);
					// echo '</pre>';
					// exit;

                    $Cantidad = count($ID_Secciones);

					$Varios = [];
                    foreach($ID_Secciones as $Row)	:
						array_push($Varios, $Row['ID_Seccion']);
					endforeach;

					// echo '<pre>';
					// print_r($Varios);
					// echo '</pre>';
					// exit;
					
					//Se INSERTA los ID_Noticia y ID_Seccion en la tabla de dependencias transitiva
                    for($i = 0; $i < $Cantidad; $i++){
						$DT_noticia_seccion = $this->Panel_M->Insertar_DT_noticia_seccion($ID_Noticia, $Varios[$i]);
					}
				}
				
				// INSERTAR IMAGEN PRINCIPAL
				//Si existe imagenPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($_FILES['imagenPrincipal']["name"] != ""){
					$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
					$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
					$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];
					// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
					// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
					// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
					//exit;

					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
					
					//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);

					//Se INSERTA la imagen principal de la noticia
					$this->Panel_M->InsertarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
				}
				else{
					//Se INSERTA solo el ID_Noticia
					$this->Panel_M->InsertarID_ImagenPrincipal($ID_Noticia);
				}

				//INSERTAR IMAGENES SECUNDARIAS
                if($_FILES['imagenesSec']['name'][0] != ''){
                    $Cantidad = count($_FILES['imagenesSec']['name']);
                    for($i = 0; $i < $Cantidad; $i++){
                        //nombre original del fichero en la máquina cliente.
                        $Nombre_imagenSecundaria = $_FILES['imagenesSec']['name'][$i];
                        $Ruta_Temporal_imagenSecundaria = $_FILES['imagenesSec']['tmp_name'][$i];
                        $tipo_imagenSecundaria = $_FILES['imagenesSec']['type'][$i];
                        $tamanio_imagenSecundaria = $_FILES['imagenesSec']['size'][$i];
						// echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
						// echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
						// exit;
						
                        //Usar en remoto
                        // $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';

                        //usar en local
                        $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';

                        //Subimos el fichero al servidor
                        move_uploaded_file($Ruta_Temporal_imagenSecundaria, $directorio_3.$_FILES['imagenesSec']['name'][$i]);

                        //Se INSERTAN las fotografias secundarias de la noticia
                        $this->Panel_M->insertarFotografiasSecun($ID_Noticia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
                    }
                }

				// INSERTAR IMAGEN ANUNCIO PUBLICITARIO
				//Si existe imagenAnunio y
				if($ID_Anuncio != ""){
					// //Usar en remoto
					// // $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
					
					// // usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
					
					//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagenAnunio']['tmp_name'], $Directorio.$Nombre_imagenAnunio);

					//Se inserta la dependencia transiiva entre el anuncio y la noticia
					$this->Panel_M->Insertar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio);
				}
			}				

			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}

		// recibe formulario que agrega evento en agenda
		public function recibeAgendaAgregada(){
			if(isset($_FILES['imagenAgenda']["name"])){			
				$FechaCaducidad = $_POST['caducidad'];
				$Nombre_imagenAgenda = $_FILES['imagenAgenda']['name'];
				$Tipo_imagenAgenda = $_FILES['imagenAgenda']['type'];
				$Tamanio_imagenAgenda = $_FILES['imagenAgenda']['size'];

				// echo "Caducidad : " . $Caducidad . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenAgenda . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenAgenda . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenAgenda . '<br>';
				// exit;
				
				//Se INSERTA el evento
				$this->Panel_M->InsertarAgenda($FechaCaducidad, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda);
				
				//Usar en remoto
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenAgenda']['tmp_name'], $Directorio.$Nombre_imagenAgenda);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		// recibe formulario que agrega un anuncio publicitario
		public function recibePublicidadAgregada(){
			if(isset($_FILES['imagenPrincipal']["name"])){			
				$RazonSocial = $_POST['razon'];		
				$FechaCaducidad = $_POST['fecha'];
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "Razon : " . $RazonSocial . '<br>';
				// echo "Fecha : " . $FechaCaducidad . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
								
				//Usar en remoto
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
				
				// usar en local
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);
				
				//Se INSERTA la publicidad
				$this->Panel_M->InsertarAnuncio($RazonSocial, $FechaCaducidad, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/publicidad");
			die();
		}

		// recibe formulario que actualiza una noticia
		public function recibeNotiActualizada(){
			$ID_Noticia = $_POST['ID_Noticia'];
			$Seccion = $_POST['seccion'];
			$Titulo = $_POST['titulo'];
			$Sub_Titulo = $_POST['subtitulo']; 
			$Contenido = $_POST['contenido']; 
			$Fecha = $_POST['fecha'];		
			$Fuente = $_POST['fuente'];		

			// echo "ID_Noticia: " . $ID_Noticia . '<br>';
			// echo "Seccion: " . $Seccion . '<br>';
			// echo "Titulo : " . $Titulo . '<br>';
			// echo "SubTitulo : " . $Sub_Titulo . '<br>';
			// echo "Contenido : " . $Contenido . '<br>';
			// echo "Fecha : " . $Fecha . '<br>';
			// echo "Fuente : " . $Fuente . '<br>';
			// exit;
				
			//Se ACTUALIZA la noticia de portada seleccionada
			$this->Panel_M->ActualizarNoticia($ID_Noticia, $Titulo, $Sub_Titulo, $Contenido, $Fecha, $Fuente);
			
			//Se verifica si la fuente de la noticia ya existe en la BD, sino existe se inserta
			$VerificaFuente = $this->Panel_M->consultarFuentes();

			// echo '<pre>';
			// print_r($VerificaFuente);
			// echo '</pre>';

			$AgregaFuente = [];
			$palabra_a_buscar = $Fuente;
			foreach($VerificaFuente as $key => $value)	:
				$Indice = array_search($palabra_a_buscar, $value);
				if($Indice){//si la fuente existe entra al IF
					//No se inserta en la BD	
					array_push($AgregaFuente, $palabra_a_buscar);

					// echo '<pre>';
					// print_r($AgregaFuente);
					// echo '</pre>';
				}
			endforeach;

			if($AgregaFuente == Array()){//Si $AgregaFuente esta vacio, la fuente no existe y se inserta en BD
				//Se INSERTA la nueva fuente 
				$this->Panel_M->InsertarFuente($Fuente);
			}
			
			// Se ACTUALIZA los ID_Seccion en la tabla de dependencias transitivas
			if(ctype_alpha($Seccion)){//Si Seccion es solo letras, hay una sola seccion
				
				//Se consulta el ID_Seccion segun la seccion recibida
				$ID_Seccion = $this->Panel_M->Consultar_ID_Seccion($Seccion);
				
				// echo $ID_Seccion['ID_Seccion'];

				// echo '<pre>';
				// print_r($ID_Seccion);
				// echo '</pre>';
				// exit();

				//Se BORRAN los ID_Seccion de una noticia especifica para volver a insertarlos con valores nuevos
				$this->Panel_M->eliminar_DT_noticia_seccion($ID_Noticia);

				///se INSERTA los ID en tabla de dependencia trancitiva
				$Insertar_DT_noticia_seccion = $this->Panel_M->Insertar_DT_noticia_seccion($ID_Noticia, $ID_Seccion['ID_Seccion']);
			}
			else{//$Seccion contiene una cadena con las secciones seleccionadas, separados por coma,
				// echo $Seccion . '<br>';
				//se convierte $Seccion en array
				$Seccion = explode(',', $Seccion);
				// echo '<pre>';
				// print_r($Seccion);
				// echo '</pre>';
				
				$Elementos = count($Seccion);
				$SeccionesVarias = "";
				//Se convierte el array en una cadena con sus elementos entre comillas
				for($i = 0; $i < $Elementos; $i++){
					$SeccionesVarias .= " '" . $Seccion[$i] . "', ";
				}
				
				// echo $SeccionesVarias . '<br>';

				// Se quita el ultimo espacio y coma del string generado con lo cual
				// el string queda 'id1','id2','id3'
				$SeccionesVarias = substr($SeccionesVarias,0,-2);
				// echo $SeccionesVarias . '<br>';

				//Se consulta el ID_Seccion segun la seccion recibida
				$ID_Secciones = $this->Panel_M->ConsultarVarios_ID_Seccion($SeccionesVarias);
					
				// echo '<pre>';
				// print_r($ID_Secciones);
				// echo '</pre>';
				// exit;

				$Cantidad = count($ID_Secciones);

				$Varios = [];
				foreach($ID_Secciones as $Row)	:
					array_push($Varios, $Row['ID_Seccion']);
				endforeach;

				// echo '<pre>';
				// print_r($Varios);
				// echo '</pre>';
				// exit;
				
				//Se BORRAN los ID_Seccion de una noticia especifica para volver a insertarlos con valores nuevos
				$this->Panel_M->eliminar_DT_noticia_seccion($ID_Noticia);

				//Se INSERTA los ID_Noticia y ID_Seccion en la tabla de dependencias transitiva
				for($i = 0; $i < $Cantidad; $i++){
					$this->Panel_M->Insertar_DT_noticia_seccion($ID_Noticia, $Varios[$i]);
				}
			}

			// IMAGEN PRINCIPAL, Si se cambio se procede a actualizarla
			if($_FILES['imagenPrincipal']["name"] != ""){			
				$ID_imagen = $_POST['id_fotoPrincipal'];	
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "ID_Imagen: " .$ID_imagen. '<br>';
				// echo "Nombre_imagen: " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen: " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen: " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
				
				//Usar en remoto
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio_1.$Nombre_imagenPrincipal);

				//Se ACTUALIZA la imagen principal de la noticia
				$this->Panel_M->ActualizarImagenNoticia($ID_imagen, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}

			//IMAGENES SECUNDARIAS;
			if($_FILES['imagenesSecundarias']['name'][0] != ''){
				$Cantidad = count($_FILES['imagenesSecundarias']['name']);
				for($i = 0; $i < $Cantidad; $i++){
					//nombre original del fichero en la máquina cliente.
					$Nombre_imagenSecundaria = $_FILES['imagenesSecundarias']['name'][$i];
					$Ruta_Temporal_imagenSecundaria = $_FILES['imagenesSecundarias']['tmp_name'][$i];
					$tipo_imagenSecundaria = $_FILES['imagenesSecundarias']['type'][$i];
					$tamanio_imagenSecundaria = $_FILES['imagenesSecundarias']['size'][$i];
					// echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
					// echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
					// echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
					// echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
					// exit;
					
					//Usar en remoto
					// $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';

					//usar en local
					$directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';

					//Subimos el fichero al servidor
					move_uploaded_file($Ruta_Temporal_imagenSecundaria, $directorio_3.$_FILES['imagenesSecundarias']['name'][$i]);

					//Se INSERTAR nuevas imagenes secundarias de la noticia
					$this->Panel_M->insertarFotografiasSecun($ID_Noticia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
				}
			}
			
			// ANUNCIO PUBLICITARIO
			//Si se cambio el anuncio publicitario se procede a actualizarlo
			if($_POST['actualizar'] == 'SiActualizar'){

				$ID_Anuncio = $_POST['id_anuncio'];
				
				//Usar en remoto
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';
				// echo "ACTUALIZAR". '<br>';
				// echo $ID_Noticia . '<br>';
				// echo $ID_Anuncio;
				// exit;
				
				//Se verifica si ya existe un anuncio para la noticia especificad, sino, se inserta un anuncio, si existe se actualiza
				$VerificaAnuncio = $this->Panel_M->consultar_DT_noticia_anuncio($ID_Noticia);
				
				// echo '<pre>';
				// print_r($VerificaAnuncio);
				// echo '</pre>';
				// exit;

				if($VerificaAnuncio == Array()){ //Se inserta el anuncio
					//Se INSERTAR el anuncio
					$this->Panel_M->insertarAnuncioSeleccionado($ID_Noticia, $ID_Anuncio);
				}
				else{ //Se actualiza el anuncio
					//Se ACTUALIZA el anuncio que corresponde a la noticia en la tabla de depencia transitiva "noticias_anuncios"
					$this->Panel_M->actualizar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio);
				}
			}

			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}

		// recibe formulario que actualiza un evento de agenda
		public function recibeAgendaActualizada(){
			$ID_Agenda = $_POST['ID_Agenda']; 
			$Fecha = $_POST['fecha'];	

			// echo "ID_Agenda: " . $ID_Agenda . '<br>';
			// echo "Fecha : " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZA el evento de agenda seleccionado
			$this->Panel_M->ActualizarAgenda($ID_Agenda, $Fecha);
				
			//Si se preciono el boton de cargar imagen
			if($_FILES['imagenAgenda']["name"] != ""){					
				$Nombre_imagenAgenda = $_FILES['imagenAgenda']['name'];
				$Tipo_imagenAgenda = $_FILES['imagenAgenda']['type'];
				$Tamanio_imagenAgenda = $_FILES['imagenAgenda']['size'];

				// echo "Nombre_imagen agenda: " . $Nombre_imagenAgenda . '<br>';
				// echo "Tipo_imagen agenda: " .  $Tipo_imagenAgenda . '<br>';
				// echo "Tamanio_imagen agenda: " .  $Tamanio_imagenAgenda . '<br>';
				// exit;

				//Usar en remoto
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenAgenda']['tmp_name'], $Directorio_1.$Nombre_imagenAgenda);

				//Se ACTUALIZA las imagen del evento de agenda
				$this->Panel_M->ActualizarImagenAgenda($ID_Agenda, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		// recibe formulario que actualiza un anuncio publicitario
		public function recibePublicidadActualizada(){
			$ID_Efemeride = $_POST['ID_Efemeride'];
			$Titulo = $_POST['titulo'];
			$Contenido = $_POST['contenido']; 
			$Fecha = $_POST['fecha'];			

			// echo "ID_Efemeride: " . $ID_Efemeride . '<br>';
			// echo "Titulo: " . $Titulo . '<br>';
			// echo "Contenido : " . $Contenido . '<br>';
			// echo "Fecha : " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZA la efemeride  seleccionada
			$this->Panel_M->ActualizarEfemeride($ID_Efemeride, $Titulo, $Contenido, $Fecha);
				
			//Si se hizo click en la imagen de efemeride
			if($_FILES['imagenPrincipal']["name"] != ""){					
				$Nombre_imagen = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagen = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagen = $_FILES['imagenPrincipal']['size'];

				// echo "Nombre_imagen Noticia: " . $Nombre_imagen . '<br>';
				// echo "Tipo_imagen Noticia: " .  $Tipo_imagen . '<br>';
				// echo "Tamanio_imagen Noticia: " .  $Tamanio_imagen . '<br>';
				// exit;

				//Usar en remoto
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio_1.$Nombre_imagen);

				//Se ACTUALIZA la imagene de la efemeride
				$this->Panel_M->ActualizarImagenEfemeride($ID_Efemeride, $Nombre_imagen, $Tipo_imagen, $Tamanio_imagen);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}

		// recibe formulario que actualiza una noticia
		public function recibeEfemerideActualizada(){
			$ID_Efemeride = $_POST['ID_Efemeride'];
			$Titulo = $_POST['titulo'];
			$Contenido = $_POST['contenido'];
			$Fecha = $_POST['fecha']; 			

			// echo "ID_Efemeride: " . $ID_Efemeride . '<br>';
			// echo "Titulo : " . $Titulo . '<br>';
			// echo "Contenido : " . $Contenido . '<br>';
			// echo "Fecha : " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZA la efemeride seleccionada
			$this->Panel_M->ActualizarEfemeride($ID_Efemeride, $Titulo, $Contenido, $Fecha);	
			
		// 	//Si se cambio la IMAGEN PRINCIPAL se procede a actualizarla
			if($_FILES['imagenPrincipal_Efemeride']["name"] != ""){			
				$ID_imagenEfemeride = $_POST['id_fotoEfemeride'];	
				$Nombre_imagenPrincipal_Efemeride = $_FILES['imagenPrincipal_Efemeride']['name'];
				$Tipo_imagenPrincipal_Efemeride = $_FILES['imagenPrincipal_Efemeride']['type'];
				$Tamanio_imagenPrincipal_Efemeride = $_FILES['imagenPrincipal_Efemeride']['size'];

				// echo "ID_ImagenEfemeride: " . $ID_imagenEfemeride. '<br>';
				// echo "Nombre_imagen: " . $Nombre_imagenPrincipal_Efemeride . '<br>';
				// echo "Tipo_imagen: " .  $Tipo_imagenPrincipal_Efemeride . '<br>';
				// echo "Tamanio_imagen: " .  $Tamanio_imagenPrincipal_Efemeride . '<br>';
				// exit;
				
				//Usar en remoto
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio_1.$Nombre_imagenPrincipal);

				//Se ACTUALIZA la imagen principal de la noticia
				$this->Panel_M->ActualizarImagenEfemeride($ID_imagenEfemeride, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}

		// 	//IMAGENES SECUNDARIAS;
		// 	if($_FILES['imagenesSecundarias']['name'][0] != ''){
		// 		$Cantidad = count($_FILES['imagenesSecundarias']['name']);
		// 		for($i = 0; $i < $Cantidad; $i++){
		// 			//nombre original del fichero en la máquina cliente.
		// 			$Nombre_imagenSecundaria = $_FILES['imagenesSecundarias']['name'][$i];
		// 			$Ruta_Temporal_imagenSecundaria = $_FILES['imagenesSecundarias']['tmp_name'][$i];
		// 			$tipo_imagenSecundaria = $_FILES['imagenesSecundarias']['type'][$i];
		// 			$tamanio_imagenSecundaria = $_FILES['imagenesSecundarias']['size'][$i];
		// 			// echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
		// 			// echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
		// 			// echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
		// 			// echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
		// 			// exit;
					
		// 			//Usar en remoto
					// $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';

		// 			//usar en local
					// $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';

		// 			//Subimos el fichero al servidor
		// 			move_uploaded_file($Ruta_Temporal_imagenSecundaria, $directorio_3.$_FILES['imagenesSecundarias']['name'][$i]);

		// 			//Se INSERTAR nuevas imagenes secundarias de la noticia
		// 			$this->Panel_M->insertarFotografiasSecun($ID_Noticia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
		// 		}
		// 	}
			
			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}
		
		// ELimina noticia
		public function eliminar_noticia($ID_Noticia){
			
			$this->Panel_M->eliminarNoticia($ID_Noticia);			
			$this->Panel_M->eliminarImagenesNoticia($ID_Noticia);

			header("Location:" . RUTA_URL . "/Panel_C/Not_Generales");
			die();
		}
		
		// ELimina efemeride
		public function eliminar_efemeride($ID_Efemeride){

			$this->Panel_M->eliminarEfemeride($ID_Efemeride);			

			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}
		
		// ELimina agenda
		public function eliminar_agenda($ID_Agenda){

			$this->Panel_M->eliminarAgenda($ID_Agenda);			

			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		//Eliminar anuncio publicitario
		public function eliminar_anuncio($ID_Anuncio){

			$this->Panel_M->eliminarAnuncio($ID_Anuncio);			

			header("Location:" . RUTA_URL . "/Panel_C/publicidad");
			die();
		}
	}