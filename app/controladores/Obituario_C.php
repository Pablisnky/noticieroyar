<?php
    class Obituario_C extends Controlador{

        public function __construct(){
            $this->ConsultaObituario_M = $this->modelo("Obituario_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta la Obituario de hoy
			$Obituario = $this->ConsultaObituario_M->consultarObituario();

            $Datos = [
                'obituario' => $Obituario, //
            ];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

            $this->vista("header/header_noticia"); 
            $this->vista("view/obituario_V", $Datos);   
        }
    }