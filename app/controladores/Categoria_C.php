<?php
    class Categoria_C extends Controlador{
        public $ConsultaCategoria_M;

        public function __construct(){
            session_start();
            
            $this->ConsultaCategoria_M = $this->modelo("Categoria_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Se CONSULTAN todos los estados en los cuales existen tiendas disponibles para mostrar a usuarios
            // $EstadosTiendas = $this->ConsultaCategoria_M->consultarEstadosTiendas();

            //Se CONSULTAN todas las  tiendas
            // $CiudadesTiendas = $this->ConsultaCategoria_M->consultarCiudadesTiendas();
            
            //Se CONSULTA la cantidad de tiendas que estan afiliadas por categorias
            $CantidadTiendas = $this->ConsultaCategoria_M->consultarCantidadTiendas();

            $Datos = [
                'cantidadTiendasCategoria' => $CantidadTiendas //cantidad, categoria
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_noticia"); 
            $this->vista("view/categoria_V",$Datos); 
        }
    }
?>