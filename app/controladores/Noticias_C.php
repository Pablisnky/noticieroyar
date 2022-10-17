<?php
    class Noticias_C extends Controlador{

        public function __construct(){
            $this->ConsultaNoticia_M = $this->modelo("Noticias_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){                            
            $this->vista("header/header_noticia"); 
            $this->vista("view/Noticias_V");   
        }

        public function NoticiaPrincipal($ID_Noticia){  

            $this->vista("header/header_noticia"); 
            $this->vista("view/Noticia_V");   
        }
        
        // muestra las noticias generales
        public function NoticiasGenerales(){  
            //Se CONSULTA las seccion
            $Secciones = $this->ConsultaNoticia_M->consultarSecciones();

            //Se CONSULTA las noticia generales por cada seccion
            $NoticiasGenerales = $this->ConsultaNoticia_M->consultarNoticiasGenerales();

            $Datos = [
                'secciones' => $Secciones, //seccion
                'noticiasGenerales' => $NoticiasGenerales //ID_Noticia, titulo, subtitulo, seccion, portada, nombre_imagenNoticia, fecha
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_noticia"); 
            $this->vista("view/noticias_V", $Datos );   
        }

        // muestra la noticia completamente
        public function detalleNoticia($ID_Noticia){
            
            //Se CONSULTA la noticia que se solicito en detalle
            $DetalleNoticia = $this->ConsultaNoticia_M->consultarNoticiaDetalle($ID_Noticia);

            //Se consulta las imagenes de la noticia
            $ImagenesNoticia = $this->ConsultaNoticia_M->consultarImagenesNoticia($ID_Noticia);

			//CONSULTA si existe algun anuncio sociado a la noticia seleccionada
            $Publicidad = $this->ConsultaNoticia_M->consultarAnuncioNoticiaPortada($ID_Noticia);
            
            $Datos = [
                'detalleNoticia' => $DetalleNoticia, //ID_Noticia, titulo, subtitulo, nombre_imagenNoticia, contenido, fecha
                'imagenesNoticia' => $ImagenesNoticia, //ID_Noticia, ID_Imagen, nombre_imagenNoticia, ImagenPrincipal
                'publicidad' => $Publicidad 
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $this->vista("header/header_SoloEstilos"); 
            $this->vista("view/detalleNoticias_V", $Datos ); 
        }

        
        // muestra la imagn seleccionada en la miniatura
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
            
            $this->vista("header/header_SoloEstilos"); 
            $this->vista("view/ajax/ImagenSeleccionada_V", $Datos ); 

        }
    }