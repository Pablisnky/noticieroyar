<?php
    class Buscador_C extends Controlador{
        private $ConsultaBuscador_M;
        private $InformacionSuscriptor;
        
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");

            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require_once(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->InformacionSuscriptor = new Suscriptor_C();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index($Buscar){
            //CONSULTA en la BD que suscriptor vende un producto especificos
            $ProductosBuscados = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);

            $Datos = [
                'productos' => $ProductosBuscados,                
                'Suscriptor' => $this->InformacionSuscriptor->suscriptores()
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("view/ajax/resultadoBuscador_V", $Datos);
        } 
    }
?>