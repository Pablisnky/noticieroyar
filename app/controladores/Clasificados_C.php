<?php
    class Clasificados_C extends Controlador{
        private $ConsultaClasificados_M;
        public $Dolar;

        public function __construct(){
            $this->ConsultaClasificados_M = $this->modelo("Clasificados_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){  
            //COnsulta todos los productos publicados en clasificados            
            $Productos = $this->ConsultaClasificados_M->consultarProductos(); 
            
            //Solicita el precio del dolar a la clase Divisas_C 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->Dolar = new Divisas_C();

            // echo '<pre>';
            // print_r($this->PrecioDolar);
            // echo '</pre>';

            $DolarHoy = $this->Dolar->Dolar;

            $Datos=[
                'productos' => $Productos, //ID_Producto, ID_Suscriptor, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
                'dolarHoy' => $DolarHoy
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_noticia"); 
            $this->vista("view/clasificados_V", $Datos); 
        }  

    }