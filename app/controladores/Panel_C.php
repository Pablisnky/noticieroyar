<?php
    class Panel_C extends Controlador{
        private $Panel_M;
		private $Comprimir;
	
		public function __construct(){
			$this->Panel_M = $this->modelo("Panel_M");
			
			// se comprime y se inserta el archivo en el directorio de servidor 
			require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
			$this->Comprimir = new Comprimir_Imagen();

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
			// $NoticiasGenerales = $this->Panel_M->consultarNoticiasGenerales();
						
			//CONSULTA si hay asociado un anuncio pulicitario
			$Publicidad = $this->Panel_M->consultarPublicidad();

			//suma la cantidad de visitas a una noticia
			$Visitas = $this->Panel_M->consultaVisitasNoticia();

			// captura la IP del equipo
			// $ip_add = $_SERVER['REMOTE_ADDR'];
			// echo "The user's IP address is - ".$ip_add;
			
			// exit;
			$Datos = [
				'noticiasPortadas' => $NoticiasPortadas, //ID_Noticia, titulo, imagenNoticia 
				'imagenesNoticias' => $ImagenesNoticiasPortadas, //ID_Noticia, nombre_imagenNoticia
				'seccionesNoticiasPortadas' => $SeccionesNoticiasPortadas,
				// 'noticiasGenerales' => $NoticiasGenerales, // 
				'visitas' => $Visitas,
				'publicidad' => $Publicidad //ID_Noticia, razonSocial
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_PanelPortada', $Datos);
			$this->vista('view/noticiasPortadas_V', $Datos);
		}

		// muestra las noticias generales en el panel de periodistas, se hace mediante de paginación de 25 noticias por pagina
		public function Not_Generales($pagina = 1){         
            # Cuántos productos mostrar por página 
            $NoticiasPorPagina = 30;

            // Por defecto se muestra la página 1; pero si está presente en la URL, tomamos esa
            if(isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            }

            # El límite es el número de productos por página
            $Limit = $NoticiasPorPagina;
            // echo 'Noticias a mostrar ' . $Limit . '<br>';

            # El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
            $Desde = ($pagina - 1) * $NoticiasPorPagina;
            // echo 'Desde la Nro ' . $Desde . '<br>';

            // Muestra la cantidad de noticias generales y poder saber cuántas páginas se van a mostrar
            $CantidadNoticiasGenerales = $this->Panel_M->consultarCantidadNoticiasGenerales();

            //Para obtener las páginas se divide el conteo entre los productos por página, y se redondea hacia arriba
            $paginas = ceil($CantidadNoticiasGenerales[0]['cantidad'] / $NoticiasPorPagina);

			//CONSULTA las noticias generales
			$NoticiasGenerales = $this->Panel_M->consultarNoticiasGeneralesPaginacion($Limit, $Desde);

			//CONSULTA las imagenes de noticias generales
			$imagenesNoticiasGenerales = $this->Panel_M->consultarImagenesNoticiasGenerales();

			//CONSULTA las secciones de noticias de generales
			$SeccionessNoticiasGenerales = $this->Panel_M->consultarSeccionessNoticiasGenerales();
						
			//CONSULTA si hay asociado anuncios publicitario en las noticias de generales
			$Publicidad = $this->Panel_M->consultarAnunciosNoticiasGenerales();
			
			//suma la cantidad de visitas a una noticia
			$Visitas = $this->Panel_M->consultaVisitasNoticia();

			$Datos = [
				'noticiasGenerales' => $NoticiasGenerales, //ID_Noticia, titulo, subtitulo, fechaPublicacion      
				'imagenesNoticia' => $imagenesNoticiasGenerales, //ID_Noticia, nombre_imagenNoticia
				'seccionessNoticiasGenerales' => $SeccionessNoticiasGenerales, //ID_Noticia, seccion
				'publicidad' => $Publicidad, //ID_Noticia, razonSocial 
				'visitas' => $Visitas, //ID_Noticia, COUNT(ID_Noticia) AS 'visitas'
                'pagina' => $pagina,
                'paginas' => $paginas,
                'cantidadNoticiasGenerales' => $CantidadNoticiasGenerales //ID_Noticia, COUNT(noticias.ID_Noticia) AS cantidad 
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_PanelNoticias', $Datos);
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
			$this->vista('header/header_PanelAgenda', $Datos);
			$this->vista('view/panel_agenda_V', $Datos);
		}
				
		//Muestra videos cargados en yaracuyEnVdeo
		public function yaracuyEnVdeo(){ 
			//CONSULTA las videos cargados en la seccion Yaracuy en Video
			$Agenda = $this->Panel_M->consultaYaracuyEnVdeo();

			$Datos = [
				'yaracuyEnVdeo' => $Agenda // ID_YaracuyEnVideo, nombreVideo 
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos', $Datos);
			$this->vista('view/panel_yaracuyEnVdeo_V', $Datos);
		}

		//Muestra todos los anuncios de publicidad, incluyendo los caducados
		public function publicidad(){ 
			//CONSULTA los anuncios de publicidad
			$Anuncio = $this->Panel_M->consultarAnuncioTodos();

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
				
		//Muestra los anuncios de publicidad disponibles en una ventana modal para seleccionar el deseado
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
            $this->vista("modal/modal_anunciosDisponibles", $Datos);
		}

		//Muestra las colecciones en una ventana modal para seleccionar el deseado
		public function modalColecciones(){ 
			//CONSULTA las colecciones 
			$Anuncio = $this->Panel_M->consultarColeccionPanel();

			$Datos = [
				'coleccionesModal' => $Anuncio//ID_Coleccion, nombreColeccion, nombre_imColeccion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
            $this->vista("modal/modal_coleccionesDisponibles", $Datos);
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
		
		//Muestra todos artistas de la galeria de arte
		public function galeria(){ 
			//CONSULTA los artistas de la galeria de arte 
			$Artistas = $this->Panel_M->consultaArtistasPanel();

			$Datos = [
				'artistas' => $Artistas //ID_Suscriptor, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;
		
			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/panel_artistas_V', $Datos);
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
		
		// muestra formulario para agregar un video de yaracuyEnVideo
		public function agregaYaracuyEnVideo(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarYaracuyEnVideo_V');
		}

		// muestra formulario para agregar un obituario
		public function agregar_obituario(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarObituario_V');
		}

		// muestra formulario para agregar un anuncio de publicidad
		public function agregar_publicidad(){

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarPublicidad_V');
		}

		// muestra formulario para agregar una coleccion
		public function agregar_coleccion(){

			//CONSULTA los colecciones 
			$Series = $this->Panel_M->consultarSeriesColeccion();

			$Datos = [
				'series' => $Series // nombreSerie
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarColeccion_V', $Datos);
		}

		// muestra formulario para agregar un artista
		public function agregar_artista(){

			//CONSULTA las categorias de formas arte existente 
			$FormaArte = $this->Panel_M->consultarFormaArte();

			$Datos = [
				'forma' => $FormaArte // formaArte
			]; 

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/agregarArtista_V', $Datos);
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
		
		// recibe formulario que agrega efemeride
		public function recibeEfemerideAgregada(){
			if(isset($_FILES['imagenEfemeride']["name"])){
				$Titulo = $_POST['titulo'];
				$Contenido = $_POST['contenido'];
				$Fecha = $_POST['fecha'];						
				$Nombre_imagenEfemeride = $_FILES['imagenEfemeride']['name'];
				$Tipo_imagenEfemeride = $_FILES['imagenEfemeride']['type'];
				$Tamanio_imagenEfemeride = $_FILES['imagenEfemeride']['size'];

				// echo "Titulo : " . $Titulo . '<br>';
				// echo "Contenido : " . $Contenido . '<br>';
				// echo "Fecha : " . $Fecha . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenEfemeride . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenEfemeride . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenEfemeride . '<br>';
				// exit;
				
				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenEfemeride = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenEfemeride);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenEfemeride = mt_rand() . '_' . $Nombre_imagenEfemeride;

				//Se INSERTA la efemeride y se retorna el ID de la inserción
				$ID_Efemeride = $this->Panel_M->InsertarEfemeride($Titulo, $Contenido, $Fecha);
				
				//Se INSERTA la imagen principal de la efemeride
				$this->Panel_M->InsertarImagenPrincipalEfemeride($ID_Efemeride, $Nombre_imagenEfemeride, $Tipo_imagenEfemeride, $Tamanio_imagenEfemeride);

				//Usar en remoto
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/efemerides/';
				
				// usar en local
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/efemerides/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenEfemeride']['tmp_name'], $Directorio . $Nombre_imagenEfemeride);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}

		// recibe el formulario que agrega noticia
		public function recibeNotiAgregada(){
			if(!empty($_FILES['imagenPrincipal']["name"])){
				
				function filtrado($datos){
					$datos = trim($datos); // Elimina espacios antes y después de los datos
					// $datos = stripslashes($datos); // Elimina backslashes \
					$datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
					return $datos;
				}

				$Titulo = filtrado($_POST['titulo']);
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
				
				// INSERTAR IMAGEN PRINCIPAL NOTICIA
				//Si existe imagenPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
				if($_FILES['imagenPrincipal']["name"] != ""){
					$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
					$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
					$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];
					$Temporal_imagenPrincipal = $_FILES['imagenPrincipal']['tmp_name'];
					// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
					// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
					// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
					//exit;

					//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
					$Nombre_imagenPrincipal = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenPrincipal);

					// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
					$Nombre_imagenPrincipal = mt_rand() . '_' . $Nombre_imagenPrincipal;

					//Se INSERTA la imagen principal de la noticia en BD
					$this->Panel_M->InsertarImagenNoticia($ID_Noticia, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
					
					// INSSERTA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
					// se comprime y se inserta el archivo en el directorio de servidor 
					$Bandera = 'ImagenPrincipalNoticia';
					$this->Comprimir->index($Bandera, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal,$Tamanio_imagenPrincipal, $Temporal_imagenPrincipal);	
				}

				//INSERTAR IMAGENES SECUNDARIAS NOTICIA
                if($_FILES['imagenesSecUndariaNoticia']['name'][0] != ''){
                    $Cantidad = count($_FILES['imagenesSecUndariaNoticia']['name']);
                    for($i = 0; $i < $Cantidad; $i++){
                        //nombre original del fichero en la máquina cliente.
                        $Nombre_imagenSecundaria = $_FILES['imagenesSecUndariaNoticia']['name'][$i];
                        $Ruta_Temporal_imagenSecundaria = $_FILES['imagenesSecUndariaNoticia']['tmp_name'][$i];
                        $tipo_imagenSecundaria = $_FILES['imagenesSecUndariaNoticia']['type'][$i];
                        $tamanio_imagenSecundaria = $_FILES['imagenesSecUndariaNoticia']['size'][$i];
						// echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
						// echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
						// echo '<br>';
						// exit;
						
						//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
						$Nombre_imagenSecundaria = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenSecundaria);

						// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
						$Nombre_imagenSecundaria = mt_rand() . '_' . $Nombre_imagenSecundaria;

						// INSSERTA IMAGEN SECUNDARIA DE NOTICIA EN SERVIDOR
						// se comprime y se inserta el archivo en el directorio de servidor 
						$Bandera = 'imagenesSecUndariaNoticia';
						$this->Comprimir->index($Bandera, $Nombre_imagenSecundaria, $tipo_imagenSecundaria,$tamanio_imagenSecundaria, $Ruta_Temporal_imagenSecundaria);	
						
                        //Se INSERTAN las fotografias secundarias de la noticia
						$this->Panel_M->insertarFotografiasSecun($ID_Noticia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
                    }
                }

				// INSERTAR IMAGEN ANUNCIO PUBLICITARIO
				//EL anuncio ya se inserto en la platorma en la seccion "Anuncios" del panel_administrador, aqui solo se inserta la relacion del ID_Noticia con el ID_Anuncio
				if($ID_Anuncio != ""){

					//Se inserta la dependencia transiiva entre el anuncio y la noticia
					$this->Panel_M->Insertar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio);
				}

				// INSERTAR VIDEO
                if($_FILES['video']['name'][0] != ''){
					$Nombre_video = $_FILES['video']['name'];
					$Tipo_video = $_FILES['video']['type'];
					$Tamanio_video = $_FILES['video']['size'];
					// echo "Nombre_video : " . $Nombre_video . '<br>';
					// echo "Tipo_video : " .  $Tipo_video . '<br>';
					// echo "Tamanio_video : " .  $Tamanio_video . '<br>';
					// exit;

					//Se INSERTA el video de la noticia
					$this->Panel_M->InsertarVideoNoticia($ID_Noticia, $Nombre_video, $Tamanio_video, $Tipo_video);
					
					//Usar en remoto
					$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/video/';
					
					// usar en local
					// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/video/';
					
					//Se mueve el archivo desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
					move_uploaded_file($_FILES['video']['tmp_name'], $Directorio . $Nombre_video);
				}
			}				
			else{
				echo "Es necesario una imagen para la noticia";
				exit;
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
				$Temporal_imagenAgenda = $_FILES['imagenAgenda']['tmp_name'];

				// echo "Caducidad : " . $FechaCaducidad . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenAgenda . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenAgenda . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenAgenda . '<br>';
				// echo "Temporal_imagen : " .  $Temporal_imagenAgenda . '<br>';
				// exit;
				
				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenAgenda = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenAgenda);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenAgenda = mt_rand() . '_' . $Nombre_imagenAgenda;
				
				//Se INSERTA el evento
				$this->Panel_M->InsertarAgenda($FechaCaducidad, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda);

				// INSSERTA IMAGEN DE AGENDA EN SERVIDOR
				// se comprime y se inserta el archivo en el directorio de servidor 
				$Bandera = 'imagenAgenda';
				$this->Comprimir->index($Bandera, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda, $Temporal_imagenAgenda, );
			}				

			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		// recibe formulario que agrega un obituario
		public function recibeObituarioAgregado(){
			if(isset($_FILES['imagenObituario']["name"])){			
				$difunto = $_POST['difunto'];
				$Nombre_imagenObituario = $_FILES['imagenObituario']['name'];
				$Tipo_imagenObituario = $_FILES['imagenObituario']['type'];
				$Tamanio_imagenObituario = $_FILES['imagenObituario']['size'];

				// echo "Caducidad : " . $Caducidad . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenObituario . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenObituario . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenObituario . '<br>';
				// exit;
				
				//Se INSERTA el evento
				$this->Panel_M->InsertarObituario($difunto, $Nombre_imagenObituario, $Tipo_imagenObituario, $Tamanio_imagenObituario);
				
				//Usar en remoto
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/obituario/';
				
				// usar en local
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/obituario/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenObituario']['tmp_name'], $Directorio.$Nombre_imagenObituario);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/obituario");
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
				$Temporal_imagenPrincipal = $_FILES['imagenPrincipal']['tmp_name'];

				// echo "Razon : " . $RazonSocial . '<br>';
				// echo "Fecha : " . $FechaCaducidad . '<br>';
				// echo "Nombre_imagen : " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen : " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen : " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;		
				
				// INSSERTA IMAGEN DE PYBLICIDAD EN SERVIDOR
				// se comprime y se inserta el archivo en el directorio de servidor 
				$Bandera = 'ImagenPublicidad';
				$this->Comprimir->index($Bandera, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal,$Tamanio_imagenPrincipal, $Temporal_imagenPrincipal);
								
				//Se INSERTA la publicidad
				$this->Panel_M->InsertarAnuncio($RazonSocial, $FechaCaducidad, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal, $Tamanio_imagenPrincipal);
			}				

			header("Location:" . RUTA_URL . "/Panel_C/publicidad");
			die();
		}

		// recibe formulario que agrega una coleccion 
		public function recibeColeccionAgregada(){
			echo "BORRAR";
		}
		
		// recibe formulario que agrega un artista 
		public function recibeArtistaAgregado(){
			if(isset($_FILES['imagenPerfil']["name"])){
				$NombreArtista = $_POST['nombreArtista'];
				$ApellidoArtista = $_POST['apellidoArtista'];
				$CategoriaArtista = $_POST['categoriaArtista'];
				$MunicipioArtista = $_POST['municipioArtista'];									
				$Nombre_imagenPerfil = $_FILES['imagenPerfil']['name'];
				$Tamanio_imagenPerfil = $_FILES['imagenPerfil']['size'];
				$Tipo_imagenPerfil = $_FILES['imagenPerfil']['type'];
				$Temporal_imagenPerfil = $_FILES['imagenPerfil']['tmp_name'];

				// echo "Nombre Artista : " . $NombreArtista . '<br>';
				// echo "Apellido Artista : " . $ApellidoArtista . '<br>';
				// echo "Categoria Artista : " . $CategoriaArtista . '<br>';
				// echo "Municipio Artista : " . $MunicipioArtista . '<br>';
				// echo "Nombre_imagenPerfil : " . $Nombre_imagenPerfil . '<br>';
				// echo "Tamanio_imagenPerfil : " .  $Tamanio_imagenPerfil . '<br>';
				// echo "Tipo_imagenPerfil : " .  $Tipo_imagenPerfil . '<br>';
				// exit;
								
				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenPerfil = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenPerfil);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenPerfil = mt_rand() . '_' . $Nombre_imagenPerfil;

				//Se INSERTA el perfil del artista y se devuelve el ID_Suscriptor
				$ID_Suscriptor = $this->Panel_M->InsertarArtista($NombreArtista, $ApellidoArtista, $CategoriaArtista, $MunicipioArtista, $Nombre_imagenPerfil, $Tamanio_imagenPerfil, $Tipo_imagenPerfil);				

				// remoto      Se crea el directorio donde iran las obras del artista
                $CarpetaArtista = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista;

				// local     Se crea el directorio donde iran las obras del artista
                // $CarpetaArtista = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista;

                if(!file_exists($CarpetaArtista)){
                    mkdir($CarpetaArtista, 0777, true);
                }
				
				// remoto
                $CarpetaPerfilArtista = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista.  '/perfil';

				// local        Se crea el directorio donde iran las fotos de perfil del artista
                // $CarpetaPerfilArtista = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil';

				if(!file_exists($CarpetaPerfilArtista)){
                    mkdir($CarpetaPerfilArtista, 0777, true);
                }

				// INSSERTA IMAGEN DE PERFIL EN SERVIDOR
				// se comprime y se inserta el archivo en el directorio de servidor 
				$Bandera = 'ImagenPerfilArtista';
				$this->Comprimir->index($Bandera, $Nombre_imagenPerfil, $Tipo_imagenPerfil,$Tamanio_imagenPerfil, $Temporal_imagenPerfil, $ID_Suscriptor, $NombreArtista, $ApellidoArtista);
			}	

			header("Location:" . RUTA_URL . "/Panel_C/galeria");
			die();
		}
		
		// recibe el formulario que agrega un video de yaracuyEnVideo
		public function recibeYaracuyEnVideo(){
			// INSERTAR VIDEO
			if($_FILES['video']['name'][0] != ''){ 
				$Descripcion_video = $_POST['descripcion'];
				$Nombre_video = $_FILES['video']['name'];
				$Tipo_video = $_FILES['video']['type'];
				$Tamanio_video = $_FILES['video']['size'];
				// echo "Nombre_video : " . $Nombre_video . '<br>';
				// echo "Tipo_video : " .  $Tipo_video . '<br>';
				// echo "Tamanio_video : " .  $Tamanio_video . '<br>';
				// exit;

				//Se INSERTA el video de la noticia
				$this->Panel_M->InsertarVideoYaracuyEnVideo($Nombre_video, $Tamanio_video, $Tipo_video, $Descripcion_video);
				
				//Usar en remoto
				$Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/video/YaracuyEnVideo/';
				
				// usar en local
				// $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/video/YaracuyEnVideo/';
				
				//Se mueve el archivo desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['video']['tmp_name'], $Directorio . $Nombre_video);
			}

			header("Location:" . RUTA_URL . "/Panel_C/yaracuyEnVdeo");
			die();
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
			
			// CONSULTA el video de la noticia
			$Video = $this->Panel_M->consultarVideoEspecifico($ID_Noticia);
			
			$Datos = [
				'noticiaActualizar' => $NoticiaActualizar, //ID_Noticia, titulo, subtitulo, seccion, fecha, nombre_imagenNoticia, ImagenPrincipal, fuente 
				'imagenesNoticiaActualizar' => $ImagenesNoticiaActualizar, //ID_Noticia, ID_Imagen, nombre_imagenNoticia, ImagenPrincipal
				'fuentes' => $Fuentes,
				'anuncio' => $Anuncio, //ID_Anuncio, nombre_imagenPublicidad
				'video' => $Video //ID_Anuncio, nombre_imagenPublicidad
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
				'agendaActualizar' => $AgendaActualizar //ID_Agenda, nombre_imagenAgenda, fechaPublicacion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarAgenda_V', $Datos);
		}
		
		// Muestra formulario con la coleccion a actualizar
		public function actualizar_coleccion($ID_Coleccion){
			
			//CONSULTA la coleccion a actualizar
			$ColeccionActualizar = $this->Panel_M->consultarColeccionActualizar($ID_Coleccion);
			
			//CONSULTA las imagenes secundarias de una coleccion a actualizar
			$ImagenesColeccion = $this->Panel_M->consultarImagenesColeccionActualizar($ID_Coleccion);

			$Series = $this->Panel_M->consultarSeriesColeccion();

			$Datos = [
				'coleccionActualizar' => $ColeccionActualizar, //ID_Coleccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion, nombre_imColeccion
				'imagenesSecun' => $ImagenesColeccion, //nombre_imColeccion
				'series' => $Series 
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarColeccion_V', $Datos);
		}

		// Muestra formulario con el artista a actualizar
		public function actualizar_artista($ID_Suscriptor){
			
			//CONSULTA datos del artista a actualizar
			$ArtistaActualizar = $this->Panel_M->consultarArtistaActualizar($ID_Suscriptor);
			
			//CONSULTA las obras del artista a actualizar
			$ObrasArtista = $this->Panel_M->consultarObrasArtistaActualizar($ID_Suscriptor);

			$Datos = [
				'artistaActualizar' => $ArtistaActualizar, //ID_Suscriptor, nombreArtista, apellidoArtista, catgeoriaArtista, municipioArtista, imagenArtista
				'ObrasArtista' => $ObrasArtista //nombreObra, imagenObra
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarArtista_V', $Datos);
		}
		
		// Muestra formulario con el anuncio publicitario a actualizar
		public function actualizar_publicidad($ID_ANUNCIO){
			$AgendaActualizar = $this->Panel_M->consultarAnuncioActualizar($ID_ANUNCIO);
			
			$Datos = [
				'anuncioctualizar' => $AgendaActualizar //ID_Anuncio, nombre_imagenPublicidad, fechaCulmina AS finfechaPublicacion
			];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit();

			// El metodo vista() se encuentra en el archivo app/clases/Controlador.php
			$this->vista('header/header_SoloEstilos');
			$this->vista('view/actualizarAnuncio_V', $Datos);
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

			// ACTUALIZA IMAGEN PRINCIPAL NOTICIA, Si se cambio se procede a actualizarla
			if($_FILES['imagenPrincipal']["name"] != ""){			
				$ID_imagen = $_POST['id_fotoPrincipal'];	
				$Nombre_imagenPrincipal = $_FILES['imagenPrincipal']['name'];
				$Tipo_imagenPrincipal = $_FILES['imagenPrincipal']['type'];
				$Tamanio_imagenPrincipal = $_FILES['imagenPrincipal']['size'];
				$Temporal_imagenPrincipal = $_FILES['imagenPrincipal']['tmp_name'];

				// echo "ID_Imagen: " .$ID_imagen. '<br>';
				// echo "Nombre_imagen: " . $Nombre_imagenPrincipal . '<br>';
				// echo "Tipo_imagen: " .  $Tipo_imagenPrincipal . '<br>';
				// echo "Tamanio_imagen: " .  $Tamanio_imagenPrincipal . '<br>';
				// exit;
				
				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenPrincipal = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenPrincipal);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenPrincipal = mt_rand() . '_' . $Nombre_imagenPrincipal;
								
				// ACTTUALIZA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
				// se comprime y se inserta el archivo en el directorio de servidor 
				$Bandera = 'ActualizaImagenPrincipalNoticia';
				$this->Comprimir->index($Bandera, $Nombre_imagenPrincipal, $Tipo_imagenPrincipal,$Tamanio_imagenPrincipal, $Temporal_imagenPrincipal);	
				
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
					$directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/';

					//usar en local
					// $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/';

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
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';

				// echo "ACTUALIZAR". '<br>';
				// echo $ID_Noticia . '<br>';
				// echo $ID_Anuncio;
				// exit;
				
				//Se verifica si ya existe un anuncio para la noticia especificad, sino, se inserta un anuncio y si existe se actualiza
				$VerificaAnuncio = $this->Panel_M->consultar_DT_noticia_anuncio($ID_Noticia);
				
				// echo '<pre>';
				// print_r($VerificaAnuncio);
				// echo '</pre>';
				// exit;

				if($VerificaAnuncio == Array()){ //Se inserta el anuncio
					//Se INSERTAR el anuncio
					$this->Panel_M->insertar_DT_AnuncioSeleccionado($ID_Noticia, $ID_Anuncio);
				}
				else{ //Se actualiza el anuncio
					//Se ACTUALIZA el anuncio que corresponde a la noticia en la tabla de depencia transitiva "noticias_anuncios"
					$this->Panel_M->actualizar_DT_noticia_anuncio($ID_Noticia, $ID_Anuncio);
				}
			}

			// VIDEO
			//Si se cambio el video se procede a actualizarlo
			if($_FILES['video']["name"] != ""){			
				$ID_Video = !empty($_POST['id_video']) ? $_POST['id_video'] : 'No existe';	 
				$Nombre_video = $_FILES['video']['name'];
				$Tipo_video = $_FILES['video']['type'];
				$Tamanio_video = $_FILES['video']['size'];
				// echo 'ID_Video= ' . $ID_Video . '<br>';
				// echo 'Nombre_video= ' .  $Nombre_video . '<br>';
				// echo 'Tipo_video= ' .  $Tipo_video . '<br>';
				// echo 'Tamanio_video= ' .  $Tamanio_video . '<br>';
				// echo 'ID_Noticia= ' .  $ID_Noticia . '<br>';
				// exit;
				
				if($ID_Video == 'No existe'){//No existe video para actualizar, entonces se inserta
					//Se INSERTA el video de la noticia
					$this->Panel_M->InsertarVideoNoticia($ID_Noticia, $Nombre_video, $Tamanio_video, $Tipo_video);
				}
				else{//Se actualiza el video existente
					//Se ACTUALIZA el video de la noticia
					$this->Panel_M->ActualizarVideo($ID_Noticia, $Nombre_video, $Tamanio_video, $Tipo_video);
				}

				//Usar en remoto
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/video/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/video/';
								
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['video']['tmp_name'], $Directorio_1.$Nombre_video);
			}

			// COLECCION
			//Si se cambio la coleccion se procede a actualizarlo
			if($_POST['actualizarCol'] == 'SiActualizarCol'){

				$ID_Coleccion = $_POST['id_coleccion'];
				
				//Usar en remoto
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/colecciones/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/colecciones/';
				
				// echo "ACTUALIZAR". '<br>';
				// echo 'ID_Noticia ' . $ID_Noticia . '<br>';
				// echo 'ID_Coleccion ' .  $ID_Coleccion;
				// exit;
				
				//Se verifica si ya existe una coleccion para la noticia especificad, sino, se inserta una coleccion y si existe se actualiza
				$VerificaColeccion = $this->Panel_M->consultar_DT_noticia_coleccion($ID_Noticia);
				
				// echo '<pre>';
				// print_r($VerificaColeccion);
				// echo '</pre>';
				// exit;

				if($VerificaColeccion == Array()){ //Se inserta la coleccion
					//Se INSERTA la relacion de dependencia transitiva entre la coleccion y la noticia
					$this->Panel_M->insertar_DT_ColeccionSeleccionada($ID_Noticia, $ID_Coleccion);
				}
				else{ //Se actualiza el anuncio
					//Se ACTUALIZA la coleccion que corresponde a la noticia en la tabla de depencia transitiva "noticias_colecciones"
					$this->Panel_M->actualizar_DT_noticia_coleccion($ID_Noticia, $ID_Coleccion);
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

				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenAgenda = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenAgenda);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenAgenda = mt_rand() . '_' . $Nombre_imagenAgenda;

				//Usar en remoto
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/agenda/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/agenda/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenAgenda']['tmp_name'], $Directorio_1.$Nombre_imagenAgenda);

				//Se ACTUALIZA las imagen del evento de agenda
				$this->Panel_M->ActualizarImagenAgenda($ID_Agenda, $Nombre_imagenAgenda, $Tipo_imagenAgenda, $Tamanio_imagenAgenda);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		// recibe formulario que actualiza un anuncio publicitario
		public function recibeAnuncioActualizado(){
			$ID_Anuncio = $_POST['ID_Anuncio'];
			$Fecha = $_POST['fecha'];		

			// echo "ID_Anuncio: " . $ID_Anuncio . '<br>';
			// echo "Fecha: " . $Fecha . '<br>';
			// exit;
				
			//Se ACTUALIZAN los datos del anuncio publicitario seleccionado
			$this->Panel_M->ActualizarDatosAnuncio($ID_Anuncio, $Fecha);
				
			//Si se hizo click en la imagen del anuncio
			if($_FILES['imagenAnuncio']["name"] != ""){					
				$Nombre_imagen = $_FILES['imagenAnuncio']['name'];
				$Tipo_imagen = $_FILES['imagenAnuncio']['type'];
				$Tamanio_imagen = $_FILES['imagenAnuncio']['size'];

				// echo "Nombre_imagen: " . $Nombre_imagen . '<br>';
				// echo "Tipo_imagen: " .  $Tipo_imagen . '<br>';
				// echo "Tamanio_imagen: " .  $Tamanio_imagen . '<br>';
				// exit;

				//Usar en remoto
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenAnuncio']['tmp_name'], $Directorio_1.$Nombre_imagen);

				//Se ACTUALIZA la imagene del anuncio publicitario
				$this->Panel_M->ActualizarAnuncioPublicitario($ID_Anuncio, $Nombre_imagen, $Tipo_imagen, $Tamanio_imagen);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/publicidad");
			die();
		}

		// recibe formulario que actualiza una coleccion
		public function recibeColeccionActualizada(){
			echo 'BORRAR';
		}

		// recibe formulario que actualiza una efemeride
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
			
			//Si se cambio la IMAGEN PRINCIPAL se procede a actualizarla
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
				
				//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
				$Nombre_imagenPrincipal_Efemeride = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenPrincipal_Efemeride);

				// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
				$Nombre_imagenPrincipal_Efemeride = mt_rand() . '_' . $Nombre_imagenPrincipal_Efemeride;
				
				//Usar en remoto
				$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/efemerides/';
				
				// usar en local
				// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/efemerides/';
				
				//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
				move_uploaded_file($_FILES['imagenPrincipal_Efemeride']['tmp_name'], $Directorio_1.$Nombre_imagenPrincipal_Efemeride);

				//Se ACTUALIZA la imagen principal de la noticia
				$this->Panel_M->ActualizarImagenEfemeride($ID_imagenEfemeride, $Nombre_imagenPrincipal_Efemeride, $Tipo_imagenPrincipal_Efemeride, $Tamanio_imagenPrincipal_Efemeride);
			}
			
			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}

		// recibe formulario que actualiza el perfil de un artista y sus obras
		public function recibeArtistaActualizado(){
			$ID_Suscriptor = $_POST['id_artista'];
			$NombreArtista = $_POST['nombreArtista'];
			$ApellidoArtista = $_POST['apellidoArtista'];
			$CategoriaArtista = $_POST['categoriaArtista']; 	
			$MunicipioArtista = $_POST['municipioArtista']; 

			$Nombre_imagenPerfil = $_FILES['imagenPerfil']['name'];
			$Tamanio_imagenPerfil = $_FILES['imagenPerfil']['size'];
			$Tipo_imagenPerfil = $_FILES['imagenPerfil']['type'];

			// echo "ID_Suscriptor: " . $ID_Suscriptor . '<br>';
			// echo "NombreArtista: " . $NombreArtista . '<br>';
			// echo "ApellidoArtista: " . $ApellidoArtista . '<br>';
			// echo "CategoriaArtista : " . $CategoriaArtista . '<br>';
			// echo "MunicipioArtista : " . $MunicipioArtista . '<br>';
			// echo "Nombre_imagenPerfil: " . $Nombre_imagenPerfil . '<br>';
			// echo "Tamanio_imagenPerfil: " .  $Tamanio_imagenPerfil . '<br>';
			// echo "Tipo_imagenPerfil: " .  $Tipo_imagenPerfil . '<br>';
			// exit;
			
			//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
			$Nombre_imagenPerfil = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenPerfil);

			// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
			$Nombre_imagenPerfil = mt_rand() . '_' . $Nombre_imagenPerfil;
				
			//Se ACTUALIZA el perfil del artista seleccionado
			$this->Panel_M->ActualizarArtista($ID_Suscriptor, $NombreArtista, $ApellidoArtista, $CategoriaArtista, $MunicipioArtista, $Nombre_imagenPerfil, $Tamanio_imagenPerfil, $Tipo_imagenPerfil);
			
			//Usar en remoto
			$Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil/';
			
			// usar en local
			// $Directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/Andreina_Zavarce/';
			
			//Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
			move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $Directorio_1.$Nombre_imagenPerfil);
			
			//RECIBE IMAGENES OBRAS SOLO SI SE HA PRESIONADO EL BOTON DE AGRAGAR OBRA
			if($_FILES['imagenesObras']['name'][0] != ''){
				$Cantidad = count($_FILES['imagenesObras']['name']);
				for($i = 0; $i < $Cantidad; $i++){
					//nombre original del fichero en la máquina cliente.
					$Nombre_imageneObra = $_FILES['imagenesObras']['name'][$i];
					$Ruta_Temporal_imageneObra = $_FILES['imagenesObras']['tmp_name'][$i];
					$tipo_imageneObra = $_FILES['imagenesObras']['type'][$i];
					$tamanio_imageneObra = $_FILES['imagenesObras']['size'][$i];
					// echo "Nombre_imageneObra: " . $Nombre_imageneObra . '<br>';
					// echo "Tipo_imageneObra: " .  $Ruta_Temporal_imageneObra . '<br>';
					// echo "Tamanio_imageneObra: " .  $tipo_imageneObra . '<br>';
					// echo "Tamanio_imageneObra: " .  $tamanio_imageneObra . '<br>';
					// exit;
					
					//Usar en remoto
					$directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/';

					//usar en local
					// $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/Andreina_Zavarce/';

					//Subimos el fichero al servidor
					move_uploaded_file($Ruta_Temporal_imageneObra, $directorio_3.$_FILES['imagenesObras']['name'][$i]);

					//Se INSERTAN nuevas obras
					$this->Panel_M->insertarObra($ID_Suscriptor, $Nombre_imageneObra, $tamanio_imageneObra, $tipo_imageneObra);
				}
			}

			header("Location:" . RUTA_URL . "/Panel_C/galeria");
			die();
		}
		
		// ELimina noticia
		public function eliminar_noticia($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Noticia y el nombre del archivo imagen, separados por coma, se convierte en array para separar los elementos
            
            $DatosAgrupados = explode("-", $DatosAgrupados);
            
            $ID_Noticia = $DatosAgrupados[0];
            $NombreImagen = $DatosAgrupados[1];

			$this->Panel_M->eliminarNoticia($ID_Noticia);			
			$this->Panel_M->eliminarImagenesNoticia($ID_Noticia);	
			$this->Panel_M->eliminarVideoNoticia($ID_Noticia);

			// Se elimina del directorio del servidor
			// en remoto
			unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/' . $NombreImagen); 

			// en local
			// unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/' .$NombreImagen); 

			header("Location:" . RUTA_URL . "/Panel_C/Not_Generales");
			die();
		}
		
		// ELimina efemeride
		public function eliminar_efemeride($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Efemeride y el nombre del archivo imagen, separados por coma, se convierte en array para separar los elementos
			
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Efemeride = $DatosAgrupados[0];
            $NombreImagen = $DatosAgrupados[1];

			$this->Panel_M->eliminarEfemeride($ID_Efemeride);
			$this->Panel_M->eliminarImagenesEfemerides($ID_Efemeride);			

			// Se elimina del directorio del servidor
			// en remoto
			unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/efemerides/' . $NombreImagen); 
			
			// en local
			// unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/efemerides/' .$NombreImagen); 

			header("Location:" . RUTA_URL . "/Panel_C/efemerides");
			die();
		}
		
		// ELimina agenda
		public function eliminar_agenda($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Efemeride y el nombre del archivo imagen, separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Agenda = $DatosAgrupados[0];
            $NombreImagen = $DatosAgrupados[1];

			$this->Panel_M->eliminarAgenda($ID_Agenda);			

			// Se elimina del directorio del servidor
			// en remoto
			unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/agenda/' . $NombreImagen); 
			
			// en local
			// unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/agenda/' .$NombreImagen); 

			header("Location:" . RUTA_URL . "/Panel_C/agenda");
			die();
		}

		//Eliminar anuncio publicitario
		public function eliminar_anuncio($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Anuncio y el nombre del archivo imagen, separados por coma, se convierte en array para separar los elementos
            
            $DatosAgrupados = explode("-", $DatosAgrupados);
            
            $ID_Anuncio = $DatosAgrupados[0];
            $NombreImagen = $DatosAgrupados[1];

			// Se elimina de la BD
			$this->Panel_M->eliminarAnuncio($ID_Anuncio);	

			// Se elimina del directorio del servidor
			// en remoto
			unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/' . $NombreImagen);

			// en local
			// unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/' .$NombreImagen); 
					
			header("Location:" . RUTA_URL . "/Panel_C/publicidad");
			die();
		}
		
		//Eliminar anuncio publicitario
		public function eliminar_coleccion($ID_Coleccion){

			$this->Panel_M->eliminarColeccion($ID_Coleccion);			

			header("Location:" . RUTA_URL . "/Panel_C/coleccion");
			die();
		}
		
		//Eliminar anuncio publicitario
		public function eliminar_obituario($ID_Obituario){

			$this->Panel_M->eliminarObituario($ID_Obituario);			

			header("Location:" . RUTA_URL . "/Panel_C/obituario");
			die();
		}
		
		//Eliminar artista
		public function eliminar_Artista($ID_Suscriptor){

			$this->Panel_M->eliminarArtista($ID_Suscriptor);			

			header("Location:" . RUTA_URL . "/Panel_C/galeria");
			die();
		}

		//Eliminar imagen secundaria de noticia
		public function eliminar_imagenSecundariaNoticia($ID_Imagen){

			$this->Panel_M->eliminarImagenSecundariaNoticia($ID_Imagen);			

			// header("Location:" . RUTA_URL . "/Panel_C/");
			// die();
		}
	}