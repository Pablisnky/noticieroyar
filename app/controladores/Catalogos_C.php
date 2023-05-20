<?php
    class Catalogos_C extends Controlador{
        private $ConsultaCatalagos_M;
        private $PrecioDolar;
        private $Instancia_Suscriptor_C;

        public function __construct(){
            $this->ConsultaCatalagos_M = $this->modelo("Catalogos_M");
            
            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require_once(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->Instancia_Suscriptor_C = new Suscriptor_C();

            //Solicita el precio del dolar a la clase Divisas_C 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index($DatosAgrupados){ 
            //$DatosAgrupados contiene una cadena con el ID_Suscriptor y el pseudonimo del suscriptoor, separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Suscriptor = $DatosAgrupados[0];
            $PseudonimoSuscripto = $DatosAgrupados[1];

            //Consulta todos los productos publicados en clasificados de un suscriptor especifico          
            $Productos = $this->ConsultaCatalagos_M->consultarProductos($ID_Suscriptor); 

            //Consulta las secciones de un catalogo especifico        
            $Secciones = $this->ConsultaCatalagos_M->consultarSecciones($ID_Suscriptor); 

            $Datos=[
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'ID_Suscriptor' => $ID_Suscriptor,
                'productos' => $Productos,
                'pseudonimoSuscripto' => $PseudonimoSuscripto,
                'Suscriptor' => $this->Instancia_Suscriptor_C->index($ID_Suscriptor),
                'secciones' => $Secciones
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
            
            //CONSULTA todas las imagenenes del producto seleccionado
            $ImagenesSec = $this->ConsultaCatalagos_M->consultarTodasImagenesProducto($ID_Producto);

            //Solicita datos del suscriptor a la clase Suscriptor_C 
            // require(RUTA_APP . '/controladores/Suscriptor_C.php');
            // $this->Instancia_Suscriptor_C = new Suscriptor_C();

            //CONSULTA informacion del vendedor
            $Vendedor =$this->Instancia_Suscriptor_C->index($Producto['ID_Suscriptor']);
            
            //CONSULTA formas de pago
            $FormasPago = $this->Instancia_Suscriptor_C->consultarFormasPago($Producto['ID_Suscriptor']);
           
            $Datos=[ 
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'Producto' => $Producto,
                'Imagenes' => $Imagenes,
                'ImagenesSec' => $ImagenesSec,
                'nombreSuscriptor' => $Vendedor[0]['nombreSuscriptor'],
                'apellidoSuscriptor' => $Vendedor[0]['apellidoSuscriptor'],
                'municipioSuscriptor' => $Vendedor[0]['municipioSuscriptor'],
                'parroquiaSuscriptor' => $Vendedor[0]['parroquiaSuscriptor'],
                'telefonoSuscriptor' => $Vendedor[0]['telefonoSuscriptor'], 
                'pseudonimoSuscripto' => $Vendedor[0]['pseudonimoSuscripto'], 
                'formasPago' => $FormasPago,
                'Bandera' => 'Desde_Catalogo'
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_ProductoAmpliado", $Datos);
            $this->vista("view/descr_Producto_V", $Datos);
        } 

        // muestra la seccion solicitada en el catalogo, este metodo es una respuesta Ajax
        public function Secciones($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Suscriptor y el pseudonimo del suscriptoor, separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Suscriptor = $DatosAgrupados[0];
            $ID_Seccion = $DatosAgrupados[1];

            // echo $ID_Suscriptor . '<br>'; 
            // echo $ID_Seccion . '<br>'; 
            // exit;
            
            //Consulta las secciones de un catalogo especifico        
            $Secciones = $this->ConsultaCatalagos_M->consultarSecciones($ID_Suscriptor); 
           
            if(is_numeric($ID_Seccion)){          
                //Consulta los productos  de una seccion especifica          
                $ProductosSeccion = $this->ConsultaCatalagos_M->consultarProductosSeccion($ID_Suscriptor, $ID_Seccion); 
            }
            else{         
                //Consulta los productos  de todo el catalogo          
                $ProductosSeccion = $this->ConsultaCatalagos_M->consultarProductosTodos($ID_Suscriptor); 
            }
           
            $Datos=[ 
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'Suscriptor' => $this->Instancia_Suscriptor_C->index($ID_Suscriptor),
                'productos' => $ProductosSeccion,
                'secciones' => $Secciones
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_Catalogo", $Datos); 
            $this->vista("view/seccion_V", $Datos); 
        } 
    }