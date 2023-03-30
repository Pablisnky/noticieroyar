<?php
    class Catalogos_C extends Controlador{
        private $ConsultaCatalagos_M;
        private $PrecioDolar;

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
                'productos' => $Productos, //ID_Producto, ID_Suscriptor, producto, nombre_img, opcion, precioBolivar, precioDolar, cantidad, disponible
                'pseudonimoSuscripto' => $PseudonimoSuscripto,
                'dolarHoy' =>  $this->PrecioDolar->index()
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado"); 
            $this->vista("view/catalogos_V", $Datos); 
        }  
        
        //Invocado desde E_Vitrinas.js por medio de mostrarDetalles()
        // public function productoAmpliado($DatosAgrupados){
        //     // echo $DatosAgrupados;
        //     //$DatosAgrupados contiene una cadena con el ID_Tienda y el producto separados por coma, se convierte en array para separar los elementos
        //     $DatosAgrupados = explode("|", $DatosAgrupados);
        //     // echo "<pre>";
        //     // print_r($DatosAgrupados);
        //     // echo "</pre>";
        //     // exit();
            
        //     $ID_EtiquetaAgregar = $DatosAgrupados[0];
        //     $Producto = substr($DatosAgrupados[1], 1);
        //     $Opcion = substr($DatosAgrupados[2], 1);
        //     $PrecioBolivar = substr($DatosAgrupados[3], 1);
        //     $Fotografia = substr($DatosAgrupados[4], 1);
        //     $ID_Producto = substr($DatosAgrupados[5], 1);
        //     $PrecioDolar = substr($DatosAgrupados[6], 1);
        //     $Existencia = substr($DatosAgrupados[7], 1);
        //     $ID_Suscriptor = substr($DatosAgrupados[8], 1);
            
        //     //CONSULTA las caracteristicas del producto seleccionado
        //     $Caracteristicas = $this->ConsultaClasificados_M->consultarCaracterisicaProductoEsp($ID_Producto);

        //     //CONSULTA las imagenes del producto seleccionado
        //     $Imagenes = $this->ConsultaClasificados_M->consultarImagenesProducto($ID_Producto);

        //     $Datos=[ 
        //         'ID_Suscriptor' => $ID_Suscriptor,
        //         'Producto' => $Producto,
        //         'Opcion' => $Opcion,
        //         'PrecioBolivar' => $PrecioBolivar,
        //         'PrecioDolar' => $PrecioDolar,
        //         'Existencia' => $Existencia,
        //         'Fotografia_1' => $Fotografia,
        //         'ID_Producto' => $ID_Producto, 
        //         'ID_EtiquetaAgregar' => $ID_EtiquetaAgregar, 
        //         'Imagenes' => $Imagenes
        //     ];      

        //     // echo "<pre>";
        //     // print_r($Datos);
        //     // echo "</pre>";
        //     // exit();
            
        //     $this->vista("header/header_SoloEstilos", $Datos);
        //     $this->vista("view/descr_Producto_V", $Datos);
        // } 
    }