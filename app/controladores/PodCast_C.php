<?php
    class PodCast_C extends Controlador{
        private $ConsultaPodCast_M;

        public function __construct(){
            $this->ConsultaPodCast_M = $this->modelo("PodCast_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){      
            //consulta los eventos en agenda de hoy
			$PodCast = $this->ConsultaPodCast_M->consultarArchivoPodCast();

            $Datos = [
                'podCast' => $PodCast, //ID_Podcast, nombre_audioPod, imagen_redesSociales
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_noticia"); 
            $this->vista("view/podCast_V", $Datos);   
        }

        public function podCats_Facebook($ID_Podcast){
            //consulta los eventos en agenda de hoy
			$PodCast = $this->ConsultaPodCast_M->consultarArchivoPodCastEspecifico($ID_Podcast);

            $Datos = [
                'podCast' => $PodCast, //ID_Podcast,titulo_podcast, nombre_audioPod, imagen_redesSociales, imagen_redesSociales
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_podcast", $Datos); 
            $this->vista("view/podCast_RedesSociales_V", $Datos); 

        }
    }