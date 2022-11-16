<?php 
    // declare(strict_types = 1);

    class CuentaSuscriptor_C extends Controlador{
        
        public function __construct(){  
            session_start();

            $this->ConsultaLogin_M = $this->modelo("CuentaSuscriptor_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        public function index(){

            $this->vista("header/header_suscriptor");
            $this->vista("view/CuentaSuscriptor_V", $Datos);
        }
    }