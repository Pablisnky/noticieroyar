<?php
    class Museo_C extends Controlador{
        public $ConsultaMuseo_M;

        public function __construct(){
            $this->ConsultaMuseo_M = $this->modelo("Museo_M");

            ocultarErrores();
        }
        
        // Muestra la presentacion de exposicion de cada sala 
        public function index(){            
            // CONSULTA detalles generales de cada exposicion
            $Exposiciones = $this->ConsultaMuseo_M->consultarExposiciones();
            
            // CONSULTA numero de obras por cada exposicion
            $NroObras = $this->ConsultaMuseo_M->consultarNroObras();
            
            // CONSULTA los dias que faltan para culminar la exposicion
            $DiasExposicion = $this->ConsultaMuseo_M->consultarDiasExposicion();

            $Datos = [
                'exposiciones' => $Exposiciones,
                'nroObras' => $NroObras,
                'diasExposicion' => $DiasExposicion
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista('header/header_museo');
            $this->vista('view/museo_V', $Datos);            
        }
        
        // muestra la imagen seleccionada en la miniatura de fotografias del museo
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito ver a pantalla completa
            //  $DetalleImagen = $this->ConsultaMuseo_M->consultaImagenFullScreem($ID_ImagenMiniatura);
           
            $Datos = [
                'id_imagenMiniatura' => $ID_ImagenMiniatura,
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $this->vista("view/ajax/A_ImagenMuseoSeleccionada_V", $Datos ); 
        }

        // Muestra las obras de una sala especiica
        public function salaExposicion($ID_Sala){
                   
            $ObrasSala = $this->ConsultaMuseo_M->consultarObrasSalas($ID_Sala);
            
            $Datos = [
                'obrasSala' => $ObrasSala,
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista('header/header_museo');
            $this->vista('view/salaExposicion_V', $Datos);
        }

        public function PWA(){
            $this->vista("header/header_Modal");
            $this->vista("view/pwa_V");
        }
        
        public function nuestroADN(){
            //Se CONSULTA los miembros del equipo
            $Founder = $this->ConsultaMenu_M->ConsultaEquipoADN();
            
            $Datos = [
                'founder' => $Founder
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_noticia");
            $this->vista("view/nuestroADN_V", $Datos);
        }
        
        public function descargaApp(){
            $this->vista('header/header');
            $this->vista('view/descargaApp_V');
        }

        public function categorias(){ 
            header('Location: ../Categoria_C');
            die();
        }
    }
?>