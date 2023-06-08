<?php
    class Publicidad_C extends Controlador{
        private $ConsultaAgenda_M;

        public function __construct(){
            $this->ConsultaAgenda_M = $this->modelo("Publicidad_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta los eventos en agenda de hoy
			$Agenda = $this->ConsultaAgenda_M->consultarPublicidad();

            $Datos = [
                'publicidad' => $Agenda, 
            ];
            
			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

            $this->vista("header/header_noticia"); 
            $this->vista("view/publicidad_V", $Datos);   
        }
    }