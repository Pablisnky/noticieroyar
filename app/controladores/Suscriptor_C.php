<?php
    class Suscriptor_C extends Controlador{
        private $ConsultaSuscriptor_M;

        public function __construct(){
            session_start();
            
            $this->ConsultaSuscriptor_M = $this->modelo("Suscriptor_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
    
        //CONSULTA los datos de un suscriptor especifico
        public function index($ID_Suscriptor){          

            $Suscriptor = $this->ConsultaSuscriptor_M->consultarSuscriptor($ID_Suscriptor);

            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            // exit();

            return $Suscriptor;
        } 
        
        public function dashboard(){          

            $this->vista("header/header_SoloEstilos");
            $this->vista("suscriptores/suscrip_inicio_V");
        } 
        
        public function suscriptores(){          

            //CONSULTA los datos de un suscriptor especifico
            $Suscriptor = $this->ConsultaSuscriptor_M->consultarTodosSuscriptor();

            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            // exit();

            return $Suscriptor;
        } 

        public function InsertarNombreComercial($RecibNombreComercial){
            
            $this->ConsultaSuscriptor_M->insertarNombreComercial($RecibNombreComercial);

        }
    }