<?php
    class Inicio_C extends Controlador{
        private $NoticiasPortadas;

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
            
            //Se CONSULTA las noticias de portada del dia en curso
            $this->NoticiasPortadas = $this->ConsultaInicio_M->consultarNoticiasPortada();
            
            // echo "<pre>";
            // print_r($this->NoticiasPortadas);
            // echo "</pre>";          
            // exit();
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
                    'datosNoticia' => $this->NoticiasPortadas, //ID_Noticia, titulo, subtitulo,, noticiaPrincipal, portada, nombre_imagenNoticia    
                    'ID_NoticiaInicial' =>  $this->NoticiasPortadas[0]['ID_Noticia'],
                    'anunciosNoticiasPortadas' => $this->AnunciosNoticiasPortadas, //
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
        public function NoticiaPortadaSeleccionada($ID_Noticia){  

            //Se CONSULTA la noticia seleccionada en el radio botom
            $Not_Princ_Seleccionada = $this->ConsultaInicio_M->consultarNot_Princ_Seleccionada($ID_Noticia);
            
            $Datos = [
                'datosNoticia' => $this->NoticiasPortadas,//ID_Noticia, titulo, subtitulo, imagenNoticia, portada      
                'not_Princ_Seleccionada' =>  $Not_Princ_Seleccionada,
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
 
            $this->vista("view/ajax/NoticiasRadioButom_V", $Datos );   
        }        
    }