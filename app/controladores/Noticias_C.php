<?php
    class Noticias_C extends Controlador{
        private $ConsultaNoticia_M;

        public function __construct(){
            session_start();

            $this->ConsultaNoticia_M = $this->modelo("Noticias_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        // public function index(){                            
        //     $this->vista("header/header_noticia"); 
        //     $this->vista("view/Noticias_V");   
        // }

        // public function NoticiaPrincipal($ID_Noticia){  

        //     $this->vista("header/header_noticia"); 
        //     $this->vista("view/Noticia_V");   
        // }
        
        // muestra las noticias generales
        public function NoticiasGenerales(){  
            //Se CONSULTA las seccion
            $Secciones = $this->ConsultaNoticia_M->consultarSecciones();
       
            // echo "<pre>";
            // print_r($Secciones);
            // echo "</pre>";   
            // exit;

            $NoticiasSeccion = [];
            $CantidadSeccion = [];

            foreach($Secciones as $Row) :
                $ID_Seccion = $Row['ID_Seccion'];
                // echo $Seccion;
                // echo '<br>';
                
                //Se consulta las noticias y se agrupan por seccion
                $NoticiasGenerales = $this->ConsultaNoticia_M->consultarNoticiasGenerales($ID_Seccion);
                
                // Muestra la cantidad de noticias por cada sección
                $CantidadNoticiasSeccion = $this->ConsultaNoticia_M->consultarCantidadNoticiasSeccion($ID_Seccion);

                array_push($NoticiasSeccion, $NoticiasGenerales);
                array_push($CantidadSeccion, $CantidadNoticiasSeccion);
            endforeach;
            
			//CONSULTA la cantidad de imagenes asociadas a cada noticia publiciada
            $Imagenes = $this->ConsultaNoticia_M->consultarImagenesNoticiaGenerales();
            
			//CONSULTA el video asociado a cada noticia publiciada
            $Videos = $this->ConsultaNoticia_M->consultarVideoNoticiaGenerales();

			//CONSULTA la cantidad de comentarios en cada noticia del dia
            $CantidadComentario = $this->ConsultaNoticia_M->consultarCantidadComentarioNoticiaGenerales();

			//CONSULTA si existe algun anuncio asociado a cada noticia publicada
            $Anuncios = $this->ConsultaNoticia_M->consultarAnuncioNoticiaGenerales();

			//CONSULTA coleccion 180°
            $Coleccion = $this->ConsultaNoticia_M->consultarColeccionNoticiaGenerales();
            
            //CONSULTA imagenes coleccion 180°
            $ImagnesColeccion = $this->ConsultaNoticia_M->consultarImagenesColeccionNoticiaGenerales();

            $Datos = [
                'secciones' => $Secciones, //ID_Seccion, seccion
                'noticiasSeccion' => $NoticiasSeccion, //ID_Noticia, titulo, subtitulo, seccion, portada, nombre_imagenNoticia, fecha, fuente
                'cantidadSeccion' => $CantidadSeccion,
                'imagenes' => $Imagenes,
                'videos' => $Videos,
                'anuncios' => $Anuncios,
                'colecciones' => $Coleccion,
                'imagenesColeccion' => $ImagnesColeccion,
                'cantidadCmentarios' => $CantidadComentario //ID_Noticia, cantidadComentario
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_noticia"); 
            $this->vista("view/noticias_V", $Datos );   
        }

        // muestra la noticia completamente
        public function detalleNoticia($DatosAgrupados){
            //$DatosAgrupados contiene una cadena separados por coma, se convierte en array para separar los elementos

            // echo $DatosAgrupados . '<br>';
            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Noticia = $DatosAgrupados[0];
            $Bandera = $DatosAgrupados[1];
            // echo $ID_Noticia . '<br>';
            // echo $Bandera . '<br>';
            // exit();
            
            //Se CONSULTA los detalle de la noticia que se solicito
            $DetalleNoticia = $this->ConsultaNoticia_M->consultarNoticiaDetalle($ID_Noticia);
            // echo "<pre>";
            // print_r($DetalleNoticia);
            // echo "</pre>";          
            // // exit();

            //Se consulta las imagenes de la noticia
            $ImagenesNoticia = $this->ConsultaNoticia_M->consultarImagenesNoticia($ID_Noticia);

            //Se consulta el video de la noticia
            $VideoNoticia = $this->ConsultaNoticia_M->consultarVideoNoticia($ID_Noticia);

			//CONSULTA si existe algun anuncio sociado a la noticia seleccionada
            $Publicidad = $this->ConsultaNoticia_M->consultarAnuncioNoticiaPortada($ID_Noticia);
            
			//CONSULTA los suscriptres que han realizado comentarios y el comentario
            $Comentario = $this->ConsultaNoticia_M->consultarComentario($ID_Noticia);
            
			//CONSULTA los suscriptres que han dado respuesta a comentarios y la respuesta
            $Respuesta = $this->ConsultaNoticia_M->consultarRespuesta($ID_Noticia);

			//CONSULTA la cantidad de comentarios de la noticia
            $CantidadComentario = $this->ConsultaNoticia_M->consultarCantidadComentario($ID_Noticia);

            //Se INSERTA la visita a la noticia
            $this->ConsultaNoticia_M->insertarVisita($ID_Noticia);
            
            // SESION creada en Login_C.php
            $ID_Suscriptor = !empty($_SESSION['ID_Suscriptor']) ? $_SESSION['ID_Suscriptor'] : 'No existe';
            $Nombre = !empty($_SESSION["nombreSuscriptor"]) ? $_SESSION["nombreSuscriptor"] : 'No existe';
            $Apellido = !empty($_SESSION["apellidoSuscriptor"]) ? $_SESSION["apellidoSuscriptor"] : 'No existe';

            $Datos = [
                'detalleNoticia' => $DetalleNoticia, //ID_Noticia, titulo, subtitulo, nombre_imagenNoticia, contenido, fecha, fuente
                'imagenesNoticia' => $ImagenesNoticia, //ID_Noticia, ID_Imagen, nombre_imagenNoticia, ImagenPrincipal
                'publicidad' => $Publicidad,
                'video' => $VideoNoticia, //ID_Noticia, nombreVideo
                'id_suscriptor' => $ID_Suscriptor,
                'comentarios' =>  $Comentario, //ID_Comentario, ID_Suscriptor, comentario, fechaComentario, horaComentario, nombreSuscriptor, apellidoSuscriptor
                'respuestas' => $Respuesta,
                'cantidadComentario' => $CantidadComentario,//ID_Noticia, COUNT(ID_Comentario) AS cantidadComentario
                'bandera' => $Bandera,//ConAnuncio
                'nombre' => $Nombre,// sesion creadas en Login_C
                'apellido' => $Apellido// sesion creadas en Login_C
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
                        
            $this->vista("header/header_OpenGraph", $Datos); 
            $this->vista("view/detalleNoticias_V", $Datos); 
        }
        
        // muestra la imagen seleccionada en la miniatura de una noticia
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito en detalle
             $DetalleImagen = $this->ConsultaNoticia_M->consultarDetalleImagen($ID_ImagenMiniatura);
           
            $Datos = [
                'ImagenSeleccionada' => $DetalleImagen, //nombre_imagenNoticia
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $this->vista("header/header_SinMembrete"); 
            $this->vista("view/ajax/ImagenSeleccionada_V", $Datos ); 
        }

        public function recibeComentario($ID_Noticia, $Comentario){	

			// echo $ID_Noticia . '<br>';
			// echo $_SESSION["ID_Suscriptor"] . '<br>';
			// echo $Comentario . '<br>';
			// exit;
          
            //Se INSERTA el comentario de la noticia y se retorna su ID
            $ID_Comentario = $this->ConsultaNoticia_M->insertarComentario($ID_Noticia, $_SESSION["ID_Suscriptor"], $Comentario);

            $ConsultarComentario = $this->ConsultaNoticia_M->consultarComentarioSuscriptor($ID_Comentario);            
            
            $Datos = [
                'comentario' => $Comentario, //
                'datosComentario' => $ConsultarComentario //ID_Comentario, nombreSuscriptor, apellidoSuscriptor, fechaComentario, horaComentario 
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            //Se consulta el correo a donde llegara la notificación de nueva denuncia
            $CorreoAdmin = $this->ConsultaNoticia_M->ConsultaCorreoAdministrador();           
            // echo $CorreoAdmin['correoAdmin'];
            // exit();

            //Se envia al correo la notificación de nuevo comentario en una denuncia
            $email_subject = 'Nuevo comentario de usuario'; 
            $email_to = $CorreoAdmin['correoAdmin']; 
            $headers = 'From: NoticieroYaracuy<administrador@noticieroyaracuy.com>';
            $email_message = $Comentario . '; ID_Noticia' . $ID_Noticia;
            
            mail($email_to, $email_subject, $email_message, $headers); 

            $this->vista("header/header_SinMembrete"); 
            $this->vista("view/ajax/nuevoComentario_V", $Datos); 
        }

        //Se inserta una respuesta a un comentario
        public function recibeRespuesta($ID_Comentario, $Respuesta, $ID_Noticia){

            //Se INSERTA la respuesta al comentario de la noticia y se retorna su ID
            $ID_Respuesta = $this->ConsultaNoticia_M->insertarRespuesta($ID_Noticia, $ID_Comentario, $_SESSION["ID_Suscriptor"], $Respuesta);
            
            // $ConsultarRespuesta = $this->ConsultaNoticia_M->consultarRespuestaSuscriptor($ID_Respuesta); 
            
            // $Datos = [
            //     'respuesta' => $Respuesta, //
            //     'datosRespuesta' => $ConsultarRespuesta //ID_Respuesta, nombreSuscriptor, apellidoSuscriptor, fecha_Respuesta, hora_Respuesta 
            // ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
        }

        //Verifica que el usuario haya hecho login para poder comentar una noticia; invocado dsde A_DetalleNoticia.js
        public function VerificaLogin($ID_Noticia, $Bandera, $ID_Comentario){
            // echo $ID_Noticia . '<br>';
            // echo $Bandera . '<br>';
            // echo $_SESSION['ID_Suscriptor']. '<br>';
			// exit;

            //Sesion creada en Login_Cy sino existe se muestra el formulario para logearse
            if(!isset($_SESSION['ID_Suscriptor']) AND $Bandera == 'comentar'){ 
                header('Location:'. RUTA_URL . '/Login_C/index/' . $ID_Noticia . ',SinLogin');                
                // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                die(); 
            }        
            else if(!isset($_SESSION['ID_Suscriptor']) AND $Bandera == 'responder'){
                header('Location:'. RUTA_URL . '/Login_C/index/' . $ID_Noticia . ',responder' . $ID_Comentario);                
                // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                die(); 
            } 
        }

        //Se consulta el comentario al que se va a dar una respuesta
        public function responderComentario($ID_Comentario){
            $ComentarioResponder = $this->ConsultaNoticia_M->consultarComentarioResponder($ID_Comentario);            
            
            $Datos = [
                'datosComentario' => $ComentarioResponder //ID_Comentario, comentario
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_SinMembrete");
            $this->vista("modal/modal_ResponderComentario",$Datos);
        }
         
        // ELimina comentario
		public function eliminar_comentario($ID_Comentario){
			
			$this->ConsultaNoticia_M->eliminarComentario($ID_Comentario);		

			header("Location:" . RUTA_URL . "/Noticia_C/detalleNoticia");
			die();
		}

        //muestra todas las noticias segun la sección, se hace mediante de paginación de 25 noticias por pagina
        public function archivo($ID_Seccion, $pagina = 1){          
            # Cuántos productos mostrar por página 
            $NoticiasPorPagina = 25;

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
            
            // Muestra la cantidad de noticias por cada sección y poder saber cuántas páginas se van a mostrar
            $CantidadNoticiasSeccion = $this->ConsultaNoticia_M->consultarCantidadNoticiasSeccion($ID_Seccion);

            //Para obtener las páginas se divide el conteo entre los productos por página, y se redondea hacia arriba
            $paginas = ceil($CantidadNoticiasSeccion[0]['cantidad'] / $NoticiasPorPagina);

            //Se consultan las noticias que se mostraran segun la pagina seleccionada en paginación
            $TodasNoticiasGenerales = $this->ConsultaNoticia_M->consultarTodasNoticiasGenerales($ID_Seccion, $Limit, $Desde);

            $Datos = [
                'todasNoticiasGenerales' => $TodasNoticiasGenerales, //ID_Noticia, titulo, subtitulo, ID_Seccion, seccion, portada, nombre_imagenNoticia, fechaPublicacion, fuente
                'pagina' => $pagina,
                'paginas' => $paginas,
                'cantidadNoticiasSeccion' => $CantidadNoticiasSeccion
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_SinMembrete"); 
            $this->vista("view/archivo_V", $Datos); 
        }
    }