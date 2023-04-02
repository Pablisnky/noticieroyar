<?php
    class Clasificados_C extends Controlador{
        private $ConsultaClasificados_M;
        private $PrecioDolar;
        private $InformacionSuscriptor;

        public function __construct(){
            $this->ConsultaClasificados_M = $this->modelo("Clasificados_M");

            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->InformacionSuscriptor = new Suscriptor_C();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        // Muestra la vista con todos los clasificados, los muestra de manera aleatoria
        public function index(){  
            //COnsulta todos los productos publicados en clasificados            
            $Productos = $this->ConsultaClasificados_M->consultarProductos(); 

            //Solicita el precio del dolar a la clase Divisas_C 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();
            
            // $DolarHoy = $this->PrecioDolar->index();
            // echo gettype($DolarHoy);
            // print_r($DolarHoy);

            $Datos=[
                'productos' => $Productos, //ID_Producto, ID_Suscriptor, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
                'dolarHoy' =>  $this->PrecioDolar->index(),
                'Suscriptor' => $this->InformacionSuscriptor->suscriptores()
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_noticia"); 
            $this->vista("view/clasificados_V", $Datos); 
        }  
        
        //Invocado desde E_Clasificados.js por medio de mostrarDetalles()
        public function productoAmpliado($ID_Producto){
                      
            //CONSULTA la informacion del producto seleccionado
            $Producto = $this->ConsultaClasificados_M->consultarCaracterisicaProductoEsp($ID_Producto);
                        
            //CONSULTA las imagenes del producto seleccionado
            $Imagenes = $this->ConsultaClasificados_M->consultarImagenesProducto($ID_Producto);
            
            //CONSULTA informacion del vendedor
            $Vendedor =$this->InformacionSuscriptor->index($Producto['ID_Suscriptor']);
           
            $Datos=[ 
                'Producto' => $Producto,
                'Imagenes' => $Imagenes,
                'nombreSuscriptor' => $Vendedor['nombreSuscriptor'],
                'apellidoSuscriptor' => $Vendedor['apellidoSuscriptor'],
                'municipioSuscriptor' => $Vendedor['municipioSuscriptor'],
                'parroquiaSuscriptor' => $Vendedor['parroquiaSuscriptor'],
                'telefonoSuscriptor' => $Vendedor['telefonoSuscriptor'], 
                'pseudonimoSuscripto' => $Vendedor['pseudonimoSuscripto'], 
                'Bandera' => 'Desde_Clasificados'
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado", $Datos);
            $this->vista("view/descr_Producto_V", $Datos);
        } 
    }