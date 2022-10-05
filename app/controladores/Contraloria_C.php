<?php
    class Contraloria_C extends Controlador{

        public function __construct(){
            // $this->ConsultaInicio_M = $this->modelo("Noticias_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){                
            $this->vista("header/header_inicio"); 
            $this->vista("view/contraloria_V");   
        }
    }