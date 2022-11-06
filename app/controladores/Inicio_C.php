<?php
    class Inicio_C extends Controlador{
        private $NoticiasPortadas;
        private $Anuncios;
        private $Imagenes;
        private $Video;
        private $Coleccion;

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
            
            //Se CONSULTA las noticias de portada del dia en curso
            $this->NoticiasPortadas = $this->ConsultaInicio_M->consultarNoticiasPortada();
            
			//CONSULTA la cantidad de imagenes asociadas a cada noticia del dia
            $this->Imagenes = $this->ConsultaInicio_M->consultarImagenesNoticiaPortada();

			//CONSULTA si existe algun video asociadas a cada noticia del dia
            $this->Video = $this->ConsultaInicio_M->consultarVideosNoticiaPortada();

			//CONSULTA si existe algun anuncio asociado a cada noticia del dia
            $this->Anuncios = $this->ConsultaInicio_M->consultarAnuncioNoticiaPortada();
            
			//CONSULTA coleccion 180°
            $this->Coleccion = $this->ConsultaInicio_M->consultarColeccionPortada();
        }
        
        public function index(){  
            if(!empty($_GET['url']) AND $_GET['url'] == 'admin'){

                //Se construye la url real de 
                $URL = RUTA_URL . '/Panel_C/portadas';   
                // echo $URL;
                // exit;

                header('Location:'. $URL);                
                // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                die(); 
            }         
            else{

                $Datos = [
                    'datosNoticia' => $this->NoticiasPortadas, //ID_Noticia, titulo, subtitulo,    noticiaPrincipal, portada, nombre_imagenNoticia, fecha, fuente
                    'ID_NoticiaInicial' =>  $this->NoticiasPortadas[0]['ID_Noticia'],
                    'anuncios' => $this->Anuncios, //ID_Anuncio, ID_Noticia
                    'imagenes' => $this->Imagenes,  //ID_Noticia, COUNT(ID_Noticia)
                    'videos' => $this->Video, //ID_Noticia
                    'colecciones' => $this->Coleccion //ID_Noticia, ID_Coleccion, nombre_imColeccion, ImagenPrincipalColec, ID_ImagenColeccion, serie, nombreColeccion, descripcionColeccion, comentarioColeccion
                ];
                
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();

                $this->vista("header/header_inicio"); 
                $this->vista("view/inicio_V", $Datos); 
            }  
        }

        // Invocado desde A_Inicio.js
        public function NoticiaPosterior($ID_Noticia){  

            //Se CONSULTA el ID_Noticia de la noticia que presede a la noticia con el ID_Noticia recibido
            $ID_NoticiaConsultar = $this->ConsultaInicio_M->consultarID_NoticiaPosterior($ID_Noticia);
            
            if($ID_NoticiaConsultar == Array()){
                //Se CONSULTA el ID_Noticia de la primera noticia introducida en el dia
                $ID_NoticiaConsultar = $this->ConsultaInicio_M->consultarID_NoticiaPortadaPrimera();
            }

            //Se CONSULTA la informacion de la noticia solicituada
            $Noticia = $this->ConsultaInicio_M->consultarNoticiaPortada($ID_NoticiaConsultar[0]['ID_Noticia']);
            
			//CONSULTA la cantidad de imagenes asociadas a la noticia solicitada
            $CantidadImagenes = $this->ConsultaInicio_M->consultarImagenesNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);

			//CONSULTA si existe algun video de la noticia solicitada
            $Video = $this->ConsultaInicio_M->consultarVideoNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);

			//CONSULTA si existe algun anuncio asociado a la noticia solicitada
            $Anuncios = $this->ConsultaInicio_M->consultarAnuncioNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);
            
			//CONSULTA coleccion 180°
            $Coleccion = $this->ConsultaInicio_M->consultarColeccionPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);

            $Datos = [
                'noticia' => $Noticia, //ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia, fecha
                'cantidadImagenes' => $CantidadImagenes,
                'videos' => $Video, //ID_Noticia 
                'anuncios' => $Anuncios,
                'colecciones' => $Coleccion
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
 
            $this->vista("view/ajax/NoticiasRadioButom_V", $Datos );   
        }        

        // Invocado desde A_Inicio.js
        public function NoticiaAnterior($ID_Noticia){ 

            //Se CONSULTA el ID_Noticia de la noticia que antecede a la noticia con el ID_Noticia recibido
            $ID_NoticiaConsultar = $this->ConsultaInicio_M->consultarID_NoticiaAnterior($ID_Noticia);

            if($ID_NoticiaConsultar == Array()){
                //Se CONSULTA el ID_Noticia de la ultima noticia introducido en el dia
                $ID_NoticiaConsultar = $this->ConsultaInicio_M->consultarID_NoticiaPortadaUltimo();
            }

            //Se CONSULTA la informacion de la noticia solicitada
            $Noticia = $this->ConsultaInicio_M->consultarNoticiaPortada($ID_NoticiaConsultar[0]['ID_Noticia']);
            // echo "<pre>";
            // print_r($ID_NoticiaConsultar);
            // echo "</pre>";          
            // exit();

			//CONSULTA la cantidad de imagenes asociadas a la noticia solicitada
            $CantidadImagenes = $this->ConsultaInicio_M->consultarImagenesNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);
            
			//CONSULTA si existe algun video de la noticia solicitada
            $Video = $this->ConsultaInicio_M->consultarVideoNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);

			//CONSULTA si existe algun anuncio asociado a la noticia solicitada
            $Anuncios = $this->ConsultaInicio_M->consultarAnuncioNoticiaPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);
            
			//CONSULTA coleccion 180°
            $Coleccion = $this->ConsultaInicio_M->consultarColeccionPortadaEspec($ID_NoticiaConsultar[0]['ID_Noticia']);
            
            $Datos = [
                'noticia' => $Noticia, //ID_Noticia, titulo, subtitulo, portada, nombre_imagenNoticia, fecha
                'cantidadImagenes' => $CantidadImagenes,
                'videos' => $Video, //ID_Noticia 
                'anuncios' => $Anuncios,
                'colecciones' => $Coleccion
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
             
            $this->vista("view/ajax/NoticiasRadioButom_V", $Datos );   
        }        
        
        // muestra la imagen seleccionada en la miniatura de la coleccion
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito en detalle
             $DetalleImagen = $this->ConsultaInicio_M->consultarDetalleImagen($ID_ImagenMiniatura);
           
            $Datos = [
                'ImagenSeleccionada' => $DetalleImagen, //nombre_imagenNoticia
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            // $this->vista("header/header_SoloEstilos"); 
            $this->vista("view/ajax/imagenColeccion_V", $Datos ); 
        }
    }