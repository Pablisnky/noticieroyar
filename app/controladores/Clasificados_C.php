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
        public function productoAmpliado($DatosAgrupados){
            // echo $DatosAgrupados;
            
            //$DatosAgrupados contiene una cadena con el ID_Tienda y el producto separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode("|", $DatosAgrupados);
            // echo "<pre>";
            // print_r($DatosAgrupados);
            // echo "</pre>";
            // exit();
            
            $ID_EtiquetaAgregar = $DatosAgrupados[0];
            $Producto = substr($DatosAgrupados[1], 1);
            $Opcion = substr($DatosAgrupados[2], 1);
            $PrecioBolivar = substr($DatosAgrupados[3], 1);
            $Fotografia = substr($DatosAgrupados[4], 1);
            $ID_Producto = substr($DatosAgrupados[5], 1);
            $PrecioDolar = substr($DatosAgrupados[6], 1);
            $Existencia = substr($DatosAgrupados[7], 1);
            $ID_Suscriptor = substr($DatosAgrupados[8], 1);
            $Nuevo = substr($DatosAgrupados[9], 1);
            
            //CONSULTA las imagenes del producto seleccionado
            $Imagenes = $this->ConsultaClasificados_M->consultarImagenesProducto($ID_Producto);

            $Datos=[ 
                'ID_Suscriptor' => $ID_Suscriptor,
                'Suscriptor' => $this->InformacionSuscriptor->index($ID_Suscriptor),
                'Producto' => $Producto,
                'Opcion' => $Opcion,
                'PrecioBolivar' => $PrecioBolivar,
                'PrecioDolar' => $PrecioDolar,
                'Existencia' => $Existencia,
                'Fotografia_1' => $Fotografia,
                'ID_Producto' => $ID_Producto, 
                'ID_EtiquetaAgregar' => $ID_EtiquetaAgregar, 
                'Imagenes' => $Imagenes,
                'Nuevo' => $Nuevo
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado", $Datos);
            $this->vista("view/descr_Producto_V", $Datos);
        } 
    }