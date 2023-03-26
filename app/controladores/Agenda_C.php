<?php
    class Agenda_C extends Controlador{
        private $ConsultaAgenda_M;

        public function __construct(){
            $this->ConsultaAgenda_M = $this->modelo("Agenda_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta los eventos en agenda de hoy
			$Agenda = $this->ConsultaAgenda_M->consultarAgenda();

            $Datos = [
                'agenda' => $Agenda, //ID_Agenda, nombre_imagenAgenda
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_agenda", $Datos); 
            $this->vista("view/agenda_V", $Datos);   
        }

        public function redes_sociales($ID_Agenda){
            //consulta los eventos en agenda de hoy
			$Agenda = $this->ConsultaAgenda_M->consultarArchivoAgendaEspecifico($ID_Agenda);

            $Datos = [
                'agenda' => $Agenda, // ID_Agenda, nombre_imagenAgenda
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_agenda", $Datos); 
            $this->vista("view/agenda_RedesSociales_V", $Datos); 
            
			// header("Location:" . RUTA_URL . "/Agenda_C");

        }
    }