<?php
    class Efemeride_C extends Controlador{

        public function __construct(){
            $this->ConsultaEfemeride_M = $this->modelo("Efemeride_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta la efemeride de hoy
			$Efemeride = $this->ConsultaEfemeride_M->consultarEfemeride();

            $Datos = [
                'efemerideHoy' => $Efemeride, //
            ];

            $this->vista("header/header_noticia"); 
            $this->vista("view/efemeride_V", $Datos);   
        }
    }