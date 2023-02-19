<?php
    class Contacto_C extends Controlador{
        private $ConsultaContacto_M;

        public function __construct(){
            $this->ConsultaContacto_M = $this->modelo("Contacto_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){        

            $this->vista("header/header_noticia"); 
            $this->vista("view/contacto_V");   
        }
    }