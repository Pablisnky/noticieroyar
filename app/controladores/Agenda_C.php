<?php
    class Agenda_C extends Controlador{

        public function __construct(){
            $this->ConsultaAgenda_M = $this->modelo("Agenda_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta la efemeride de hoy
			$Agenda = $this->ConsultaAgenda_M->consultarAgenda();

            $Datos = [
                'agenda' => $Agenda, //ID_Agenda, nombre_imagenAgenda
            ];

            $this->vista("header/header_noticia"); 
            $this->vista("view/agenda_V", $Datos);   
        }
    }