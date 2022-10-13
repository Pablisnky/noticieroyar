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

			//CONSULTA las imagenes de noticias de portada
			$ImagenesNoticiasPortadas = $this->Panel_M->consultarImagenesNoticiasPortada();

			//CONSULTA las noticias generales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();

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
				'agenda' => $Agenda //ID_Agenda, nombre_imagenAgenda
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_agenda_V', $Datos);
		}

		// // Redirecciona a la pagina de inicio del sitio web
		// public function PaginaInicio(){
		// 	// require_once(APPPATH . 'controllers/Inicio_C.php');

		// 	// $this->VolverInicio = new Inicio_C();
		// 	// $this->VolverInicio->Index();
		// }
		
		// muestra formulario para agregar una noticia
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
		
		// Muestra formulario con la efemeride a actualizar
		public function actualizar_efemeride($ID_Efemeride){
			//CONSULTA la efemeride a actualizar
			$EfemerideActualizar = $this->Panel_M->consultarEfemerideActualizar($ID_Efemeride);
			
			$Datos = [
				'efemerideActualizar' => $EfemerideActualizar //ID_Efemeride, titulo, contenido, fecha, Nombre_imagen
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
				
				//Se INSERTA la noticia en BD y se retorna el ID de la inserción
				$ID_Noticia = $this->Panel_M->InsertarEfemeride($Titulo, $Contenido, $Fecha, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
				
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

		// recibe formulario que agrega noticia
		public function recibeNotiAgregada(){
			if(isset($_FILES['imagenPrincipal']["name"])){
				$Titulo = $_POST['titulo'];
				$Sub_Titulo = $_POST['subtitulo'];
				$Contenido = $_POST['contenido'];
				$ID_Seccion = $_POST['ID_Seccion'];
				$Fecha = $_POST['fecha'];			
				$ID_Periodista = $_POST['ID_Periodista'];			
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];

				// echo "Titulo : " . $Titulo . '<br>';
				// echo "SubTitulo : " . $Sub_Titulo . '<br>';
				// echo "Contenido : " . $Contenido . '<br>';
				// echo "ID_Seccion : " . $ID_Seccion . '<br>';
				// echo "Fecha : " . $Fecha . '<br>';
				// echo "ID_Periodista : " . $ID_Periodista . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
				
				//Se INSERTA la noticia en BD y se retorna el ID de la inserción
				$ID_Noticia = $this->Panel_M->InsertarNoticia($Titulo, $Sub_Titulo, $Contenido, $ID_Seccion, $Fecha, $ID_Periodista);
				
				//Si existe imagenPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($_FILES['imagenPrincipal']["name"] != ""){
					//Usar en remoto
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
					
					// usar en local
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
					
					//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio.$Nombre_imagenPrincipal);

					//Se INSERTA las imagenes de la noticia en BD
					$this->Panel_M->InsertarImagenesNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
				}
				else{
					//Se INSERTA solo el ID_Noticia
					$this->Panel_M->InsertarID_Imagenes($ID_Noticia);
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

		// recibe formulario que actualiza una noticia
		public function recibeNotiActualizada(){
			$ID_Noticia = $_POST['ID_Noticia'];
			$ID_Seccion = $_POST['ID_Seccion'];
			$Titulo = $_POST['titulo'];
			$Sub_Titulo = $_POST['subtitulo']; 
			$Contenido = $_POST['contenido']; 
			$Fecha = $_POST['fecha'];			

			// echo "ID_Noticia: " . $ID_Noticia . '<br>';
			// echo "ID_Seccion: " . $ID_Seccion . '<br>';
			// echo "Titulo : " . $Titulo . '<br>';
			// echo "SubTitulo : " . $Sub_Titulo . '<br>';
			// echo "Contenido : " . $Contenido . '<br>';
			// echo "Fecha : " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZA la noticia de portada seleccionada
			$this->Panel_M->ActualizarNoticia($ID_Noticia, $ID_Seccion, $Titulo, $Sub_Titulo, $Contenido, $Fecha);
				
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
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio_1.$Nombre_imagenPrincipal);

				//Se ACTUALIZA las imagenes de la noticia en BD
				$this->Panel_M->ActualizarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
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
			$this->Panel_M->ActualizarNoticia($ID_Noticia, $ID_Seccion, $Titulo, $Sub_Titulo, $Contenido, $Fecha);
				
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
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
				
				// usar en local
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'], $Directorio_1.$Nombre_imagenPrincipal);

				//Se ACTUALIZA las imagenes de la noticia en BD
				$this->Panel_M->ActualizarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/portadas");
			die();
		}

		// recibe formulario que actualiza una efemeride
		public function recibeEfemerideActualizada(){
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
	}