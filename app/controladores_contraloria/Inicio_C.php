<?php
    session_start();
    
    class Inicio_C extends Controlador{
        
        public function __construct(){           
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");
        }

        public function index(){            
            //Se CONSULTA la cantidad de denuncias realizadas el día de hoy
            $Denuncias = $this->ConsultaInicio_M->consultarDenunciaDiaria();

            echo '<pre>';
            print_r($Denuncias);
            echo '</pre>';
            exit;

            foreach($Denuncias as $arr) :
                $Num_Deuncias = $arr['Total'];
            endforeach;
            
            $this->vista("header/header_inicio");
            $this->vista("view/inicio_V", $Num_Deuncias);
            $this->vista("footer/footer_V");
        }
        
        //Metodo cargado desde header_V - inicio_V
        public function denuncias(){
            $this->vista("header/header_inicio");
            $this->vista("view/denuncias_V");
        }
    }