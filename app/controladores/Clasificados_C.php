<?php
    class Clasificados_C extends Controlador{
        private $ConsultaClasificados_M;
        private $PrecioDolar;
        private $InformacionSuscriptor;

        public function __construct(){
            // session_start();

            $this->ConsultaClasificados_M = $this->modelo("Clasificados_M");

            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require_once(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->InformacionSuscriptor = new Suscriptor_C();
            
            //Solicita el precio del dolar a la clase Divisas_C 
            include_once(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        // Muestra la vista con todos los clasificados, los muestra de manera aleatoria
        public function index(){  
            //Consulta todos los productos publicados en clasificados            
            $Productos = $this->ConsultaClasificados_M->consultarProductos(); 
            
            $Datos=[
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'productos' => $Productos, //ID_Producto, ID_Suscriptor, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
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
                        
            //CONSULTA la imagenen principal del producto seleccionado
            $Imagenes = $this->ConsultaClasificados_M->consultarImagenesProducto($ID_Producto);
            
            //CONSULTA las imagenenes secundarias del producto seleccionado
            $ImagenesSec = $this->ConsultaClasificados_M->consultarImagenesSecundariasProducto($ID_Producto);
            
            //CONSULTA informacion del vendedor
            $Vendedor = $this->InformacionSuscriptor->index($Producto['ID_Suscriptor']);
            
            //CONSULTA formas de pago
            $FormasPago = $this->InformacionSuscriptor->consultarFormasPago($Producto['ID_Suscriptor']);
           
            $Datos=[ 
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'Producto' => $Producto,
                'Imagenes' => $Imagenes,
                'ImagenesSec' => $ImagenesSec,
                'nombreSuscriptor' => $Vendedor['nombreSuscriptor'],
                'apellidoSuscriptor' => $Vendedor['apellidoSuscriptor'],
                'municipioSuscriptor' => $Vendedor['municipioSuscriptor'],
                'parroquiaSuscriptor' => $Vendedor['parroquiaSuscriptor'],
                'telefonoSuscriptor' => $Vendedor['telefonoSuscriptor'], 
                'pseudonimoSuscripto' => $Vendedor['pseudonimoSuscripto'], 
                'formasPago' => $FormasPago,
                'Bandera' => 'Desde_Clasificados'
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado", $Datos);
            $this->vista("view/descr_Producto_V", $Datos);
        } 
        
        // muestra la imagen seleccionada en la miniatura de un producto
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito en detalle
             $DetalleImagen = $this->ConsultaClasificados_M->consultarDetalleImagen($ID_ImagenMiniatura);
           
            $Datos = [
                'ImagenSeleccionada' => $DetalleImagen, //
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $this->vista("header/header_SinMembrete"); 
            $this->vista("view/ajax/ImagenSeleccionadaProducto_V", $Datos ); 
        }
    }