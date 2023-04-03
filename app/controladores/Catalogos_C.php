<?php
    class Catalogos_C extends Controlador{
        private $ConsultaCatalagos_M;
        private $PrecioDolar;
        private $InformacionSuscriptor;

        public function __construct(){
            $this->ConsultaCatalagos_M = $this->modelo("Catalogos_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index($DatosAgrupados){ 
            //$DatosAgrupados contiene una cadena con el ID_Suscriptor y el pseudonimo del suscriptoor, separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Suscriptor = $DatosAgrupados[0];
            $PseudonimoSuscripto = $DatosAgrupados[1];

            //COnsulta todos los productos publicados en clasificados            
            $Productos = $this->ConsultaCatalagos_M->consultarProductos($ID_Suscriptor); 

            //Solicita el precio del dolar a la clase Divisas_C 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();

            // $DolarHoy = $this->PrecioDolar->index();
            // echo gettype($DolarHoy);
            // print_r($DolarHoy);

            $Datos=[
                'ID_Suscriptor' => $ID_Suscriptor,
                'productos' => $Productos, //ID_Producto, ID_Suscriptor, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
                'pseudonimoSuscripto' => $PseudonimoSuscripto,
                'dolarHoy' =>  $this->PrecioDolar->index()
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_Catalogo", $Datos); 
            $this->vista("view/catalogos_V", $Datos); 
        }  

         //Invocado desde E_Clasificados.js por medio de mostrarDetalles()
         public function productoAmpliado($ID_Producto){
                      
            //CONSULTA la informacion del producto seleccionado
            $Producto = $this->ConsultaCatalagos_M->consultarCaracterisicaProductoEsp($ID_Producto);
                        
            //CONSULTA las imagenes del producto seleccionado
            $Imagenes = $this->ConsultaCatalagos_M->consultarImagenesProducto($ID_Producto);
            
            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->InformacionSuscriptor = new Suscriptor_C();

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
                'Bandera' => 'Desde_Catalogo'
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado", $Datos);
            $this->vista("view/descr_Producto_V", $Datos);
        } 
    }