<?php
    class Clasificados_C extends Controlador{
        private $ConsultaClasificados_M;
        private $PrecioDolar;
        private $InformacionSuscriptor;
        // private $ID_Suscriptor;
        private $Comprimir;

        public function __construct(){
            session_start();

            $this->ConsultaClasificados_M = $this->modelo("Clasificados_M");

            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require_once(RUTA_APP . '/controladores/Suscriptor_C.php');
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
            $Vendedor = $this->InformacionSuscriptor->index($Producto['ID_Suscriptor']);
            
            //CONSULTA formas de pago
            $FormasPago = $this->InformacionSuscriptor->consultarFormasPago($Producto['ID_Suscriptor']);
           
            $Datos=[ 
                'Producto' => $Producto,
                'Imagenes' => $Imagenes,
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

        //Da la cantidad de anuncios clasificados que tiene un suscriptor especifico
        public function clasificadoSuscriptor($ID_Suscriptor){
            
            //se consultan los anuncios clasificados de un suscriptor
            $ClasificadosSuscriptor = $this->ConsultaClasificados_M->consultarAnunciosClasificados($ID_Suscriptor);
            
            // echo "<pre>";
            // print_r($ClasificadosSuscriptor);
            // echo "</pre>";
            // exit();

            return $ClasificadosSuscriptor;
        }
        
        //Muestra todos los productos en la vista clasificados del panel de suscriptores
        public function Productos($ID_Suscriptor){
            // echo 'ID_Suscriptor= ' . $ID_Suscriptor . '<br>';
            // exit;

            //CONSULTA todos los productos de un suscriptor  
            $Productos = $this->ConsultaClasificados_M->consultarTodosProductosSuscriptor($ID_Suscriptor);

            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($ID_Suscriptor);

            $Datos = [
                'productos' => $Productos, //ID_Producto, producto, ID_Opcion, opcion, precioBolivar, prcioDolar, cantidad, disponible, nombre_img
                'suscriptor' => $this->InformacionSuscriptor->index($ID_Suscriptor),
                'ID_Suscriptor' => $Suscriptor['ID_Suscriptor'],
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor']
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            //Si no hay productos cargados y no hay datos comerciales, se muestra el modal de sin productos
            if($Productos == Array() && $Datos['suscriptor']['pseudonimoSuscripto'] == ''){
                $Datos = [
                   'SinDatosComerciales'  => 'SinDatosComerciales',
                   'ID_Suscriptor' => $ID_Suscriptor
                ];

                $this->vista('header/header_suscriptor');
                $this->vista('modal/modal_sinProductos_V', $Datos);
                exit;
            }
            else if($Productos == Array()){//Si no hay productos cargados

                header('location:' . RUTA_URL . '/Clasificados_C/Publicar'); 
                die();
            }
            else{    
                $this->vista('header/header_suscriptor');
                $this->vista('suscriptores/suscrip_productos_V', $Datos);
            }            
        }
        
        // muestra la vista donde se carga un producto
        public function Publicar($ID_Suscriptor){

            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();
            
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($ID_Suscriptor);
    
            $Datos = [
                'dolarHoy' => $this->PrecioDolar->index(),
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor'],
                'ID_Suscriptor' => $ID_Suscriptor
            ];
                
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit();

            $Publicar = 1906;  
            $_SESSION['Publicar'] = $Publicar; 
            //Se crea esta sesion para impedir que se recargue la información enviada por el formulario mandandolo varias veces a la base de datos

            $this->vista('header/header_suscriptor');
            $this->vista('suscriptores/suscrip_publicar_V', $Datos);
        }
        
        //recibe el formulario para cargar un nuevo producto
        public function recibeProductoPublicar(){
            $Publicar = $_SESSION['Publicar'];  
            if($Publicar == 1906){// Anteriormente en el metodo "Publicar" se generó la variable $_SESSION["Publicar"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['Publicar']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
                //SECCION DATOS DEL PRODUCTO
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['producto']) && !empty($_POST['descripcion']) && !empty($_POST['precioBs']) && (!empty($_POST['precioDolar']) || $_POST['precioDolar'] == 0)){
                    $RecibeProducto = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'Producto' => $_POST['producto'],
                        'Descripcion' => $_POST['descripcion'],
                        // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',$_POST, "descripcion", ), //evita los saltos de lineas realizados por el usuario al separar parrafos
                        'PrecioBs' => $_POST["precioBs"],
                        'PrecioDolar' => $_POST["precioDolar"],
                        'Cantidad' => empty($_POST['cantidad']) ? 0 : $_POST['cantidad'],
                        'ID_Suscriptor' => $_POST["id_suscriptor"] 
                    ];
                    // echo '<pre>';
                    // print_r($RecibeProducto);   
                    // echo '</pre>';
                    // exit;
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    // exit();
                }

                //********************************************************
                //Las siguientes consultas se deben realizar por medio de Transacciones BD

                //Se INSERTA el producto en la BD y se retorna el ID recien insertado
                $ID_Producto = $this->ConsultaClasificados_M->insertarProducto($RecibeProducto);

                //Se INSERTA la opcion y precio del producto en la BD y se retorna el ID recien insertado
                $ID_Opcion = $this->ConsultaClasificados_M->insertarOpcionesProducto($RecibeProducto);
                
                //Se INSERTA la dependenciatransitiva entre producto, opciones
                $this->ConsultaClasificados_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);

                //IMAGEN PRINCIPAL PRODUCTO
                //********************************************************
                //Si se selecionó alguna imagen entra
                if($_FILES['imagenProducto']["name"] != ''){
                    $nombre_imgProducto = $_FILES['imagenProducto']['name'];
                    $tipo_imgProducto = $_FILES['imagenProducto']['type'];
                    $tamanio_imgProducto = $_FILES['imagenProducto']['size'];
                    $Temporal_imgProducto = $_FILES['imagenProducto']['tmp_name'];

                    // echo 'Nombre de la imagen = ' . $nombre_imgProducto . '<br>';
                    // echo 'Tipo de archivo = ' .$tipo_imgProducto .  '<br>';
                    // echo 'Tamaño = ' . $tamanio_imgProducto . '<br>';
                    //se muestra el directorio temporal donde se guarda el archivo
                    // echo $_FILES['imagen']['tmp_name'];
                    // exit();
                    
                    //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                    $nombre_imgProducto = preg_replace('([^A-Za-z0-9.])', '', $nombre_imgProducto);

                    // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                    $nombre_imgProducto = mt_rand() . '_' . $nombre_imgProducto;

                    //Si existe imagenProducto y tiene un tamaño correcto (maximo 2Mb)
                    if($nombre_imgProducto == !NULL){
                        //indicamos los formatos que permitimos subir a nuestro servidor
                        if(($tipo_imgProducto == 'image/jpeg')
                            || ($tipo_imgProducto == 'image/jpg') || ($tipo_imgProducto == 'image/png')){
                            
                            //Se crea el directorio donde iran las imagenes de la tienda
                            // Usar en remoto
                            $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/productos';

                            // Usar en local
                            // $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/productos';
                            
                            if(!file_exists($CarpetaProductos)){
                                mkdir($CarpetaProductos, 0777, true);
                            }       

                            //Se INSERTA la imagen principal en BD
                            $this->ConsultaClasificados_M->insertaImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto);
                            
                            // INSSERTA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
                            // se comprime y se inserta el archivo en el directorio de servidor 
                            $Bandera = 'imagenProducto';
                            require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
                            $this->Comprimir = new Comprimir_Imagen();

                            $this->Comprimir->index($Bandera, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto, $Temporal_imgProducto);
                            
                            $this->Productos($RecibeProducto["ID_Suscriptor"]);
                        }
                        else{
                            //si no cumple con el formato
                            echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                            echo '<a href="javascript: history.go(-1)">Regresar</a>';
                            exit();
                        }
                    }
                    else{//si se pasa del tamaño permitido
                        echo 'La imagen principal es demasiado grande ';
                        echo '<a href="javascript: history.go(-1)">Regresar</a>';
                        exit();
                    }
                }
                else{//si no se selecciono ninguna imagen principal
                    echo 'Es necesario mostrar una imagen del producto ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
                
                //INSERTAR IMAGENES SECUNDARIAS PRODUCTO
                if($_FILES['imagenSecundariiaProducto']['name'][0] != ''){
                    $Cantidad = count($_FILES['imagenSecundariiaProducto']['name']);
                    for($i = 0; $i < $Cantidad; $i++){
                        //nombre original del fichero en la máquina cliente.
                        $Nombre_imagenSecundaria = $_FILES['imagenSecundariiaProducto']['name'][$i];
                        $Ruta_Temporal_imagenSecundaria = $_FILES['imagenSecundariiaProducto']['tmp_name'][$i];
                        $tipo_imagenSecundaria = $_FILES['imagenSecundariiaProducto']['type'][$i];
                        $tamanio_imagenSecundaria = $_FILES['imagenSecundariiaProducto']['size'][$i];
						// echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
						// echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
						// echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
						// echo '<br>';
						// exit;
						
						//Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
						$Nombre_imagenSecundaria = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenSecundaria);

						// Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
						$Nombre_imagenSecundaria = mt_rand() . '_' . $Nombre_imagenSecundaria;

						// INSSERTA IMAGEN SECUNDARIA DE PRODUCTO EN SERVIDOR
						// se comprime y se inserta el archivo en el directorio de servidor 
						$Bandera = 'imagenSecundariiaProducto';
						$this->Comprimir->index($Bandera, $Nombre_imagenSecundaria, $tipo_imagenSecundaria,$tamanio_imagenSecundaria, $Ruta_Temporal_imagenSecundaria);	
						
                        //Se INSERTAN las fotografias secundarias del producto en BD
						$this->ConsultaClasificados_M->insertaImagenSecundariaProducto($ID_Producto, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
                    }
                }
            }
            else{ 
                $this->Productos($RecibeProducto["ID_Suscriptor"]);
            } 
        }
        
        // muestra formulario para actualizar un producto especifico
        public function actualizarProducto($ID_Producto){
            
            //CONSULTA las especiicaciones de un producto determinado
            $Especificaciones = $this->ConsultaClasificados_M->consultarDescripcionProducto($ID_Producto);

            //CONSULTAN la imagen principal del producto
            $ImagenPrin = $this->ConsultaClasificados_M->consultarImagenPrincipal($ID_Producto);
            
            //CONSULTAN las imagenes secundarias del producto
            $ImagenSec = $this->ConsultaClasificados_M->consultarImagenSecundaria($ID_Producto);
                        
            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();
            
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($_SESSION['ID_Suscriptor']);

            $Datos = [
                'ID_Suscriptor' => $_SESSION['ID_Suscriptor'],
                'especificaciones' => $Especificaciones, //ID_Producto, ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad, disponible
                'imagenPrin' => $ImagenPrin, //ID_Imagen, nombre_img
                'imagenSec' => $ImagenSec,
                'dolarHoy' => $this->PrecioDolar->index(),
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor']
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_suscriptor'); 
            $this->vista('suscriptores/suscrip_editar_prod_V', $Datos);
        }     

        //Invocado desde cuenta_editar_prod_V.php actualiza la información de un producto
        public function recibeAtualizarProducto(){
            //Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST'&& !empty($_POST['producto']) && !empty($_POST['descripcion']) && !empty($_POST['precioBolivar']) && (!empty($_POST['precioDolar']) || $_POST['precioDolar'] == 0)){
            // {&& !empty($_POST['fecha_dotacion']) && !empty($_POST['incremento']) && !empty($_POST['fecha_reposicion'])

                //Recibe datos del producto a actualizar
                $RecibeProducto = [
                    'ID_Producto' => $_POST['id_producto'],
                    'ID_Opcion' => $_POST['id_opcion'],
                    'Producto' => $_POST['producto'],
                    'Descripcion' => $_POST['descripcion'],
                    // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',$_POST, "descripcion", ), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'PrecioBs' => $_POST["precioBolivar"],
                    'PrecioDolar' => $_POST["precioDolar"],
                    'Cantidad' => empty($_POST['uni_existencia']) ? 0 : $_POST['uni_existencia'],
                    'ID_Suscriptor' => $_POST["id_suscriptor"] 
                ];
                // echo '<pre>';
                // print_r($RecibeProducto);
                // echo '</pre>';
                // exit;
            }
            else{
                echo 'Llene todos los campos obligatorios' . '<br>';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }

            require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
            $this->Comprimir = new Comprimir_Imagen();
            //IMAGEN PRINCIPAL
            // ********************************************************
            // Si se selecionó alguna nueva imagen
            if($_FILES['imagenPrinci_Editar']["name"] != ''){
                $nombre_imgProductoActualizar = $_FILES['imagenPrinci_Editar']['name'];
                $tipo_imgProductoActualizar = $_FILES['imagenPrinci_Editar']['type'];
                $tamanio_imgProductoActualizar = $_FILES['imagenPrinci_Editar']['size'];
                $Temporal_imgProductoActualizar = $_FILES['imagenPrinci_Editar']['tmp_name'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " . $tipo .  "<br>";
                // echo "Tamaño = " . $tamanio . "<br>";
                // //se muestra el directorio temporal donde se guarda el archivo
                // echo $_FILES['imagen']['tmp_name'];
                // exit;
                    
                //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                $nombre_imgProductoActualizar = preg_replace('([^A-Za-z0-9.])', '', $nombre_imgProductoActualizar);

                // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                $nombre_imgProductoActualizar = mt_rand() . '_' . $nombre_imgProductoActualizar;

                // ACTUALIZA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
                // se comprime y se inserta el archivo en el directorio de servidor 
                $Bandera = 'imagenProducto';

                $this->Comprimir->index($Bandera, $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar, $Temporal_imgProductoActualizar);

                //Se ACTUALIZA la fotografia principal del producto
                $this->ConsultaClasificados_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar);
            }
            
            //ACTUALIZAR IMAGENES SECUNDARIAS PRODUCTO
            if($_FILES['imagenSecundariiaProd']['name'][0] != ''){
                $Cantidad = count($_FILES['imagenSecundariiaProd']['name']);
                for($i = 0; $i < $Cantidad; $i++){
                    //nombre original del fichero en la máquina cliente.
                    $Nombre_imagenSecundaria = $_FILES['imagenSecundariiaProd']['name'][$i];
                    $Ruta_Temporal_imagenSecundaria = $_FILES['imagenSecundariiaProd']['tmp_name'][$i];
                    $tipo_imagenSecundaria = $_FILES['imagenSecundariiaProd']['type'][$i];
                    $tamanio_imagenSecundaria = $_FILES['imagenSecundariiaProd']['size'][$i];
                    // echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
                    // echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
                    // echo '<br>';
                    // exit;
                    
                    //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                    $Nombre_imagenSecundaria = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenSecundaria);

                    // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                    $Nombre_imagenSecundaria = mt_rand() . '_' . $Nombre_imagenSecundaria;

                    // ACTUALIZA IMAGEN SECUNDARIA DE PRODUCTO EN SERVIDOR
                    // se comprime y se inserta el archivo en el directorio de servidor 
                    $Bandera = 'imagenSecundariiaProd';
                    $this->Comprimir->index($Bandera, $Nombre_imagenSecundaria, $tipo_imagenSecundaria,$tamanio_imagenSecundaria, $Ruta_Temporal_imagenSecundaria);	
                    
                    //Se INSERTAN las fotografias secundarias del producto en BD
                    $this->ConsultaClasificados_M->insertaImagenSecundariaProducto($RecibeProducto['ID_Producto'], $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
                }
            }
        
            // ********************************************************
            //Estas sentencias de actualización deben realizarce por medio de transsacciones

            $this->ConsultaClasificados_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaClasificados_M->actualizarProducto($RecibeProducto);

            $this->Productos($RecibeProducto['ID_Suscriptor']);
        }
   
        public function eliminarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion, ID_Producto y la sección separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode('-', $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];

            // *************************************************************************************
            //La siguientes cinco consultas entran en el procedimeinto para ELIMINAR un producto de una tienda, esto debe hacerse mediante transacciones
            // *************************************************************************************
            // *************************************************************************************

            //Se consulta el nombre de las imagenes del producto
            $ImagenesEliminar = $this->ConsultaClasificados_M->consultarImagenesEliminar($ID_Producto);
            // echo '<pre>';
            // print_r($ImagenesEliminar);
            // echo '</pre>';
            // exit;
            
            //Se eliminan los archivo del servidor, ubicados en la carpeta public/images/clasificados/productos
            foreach($ImagenesEliminar as $KeyImagenes)  :
                $NombreImagenEliminar = $KeyImagenes['nombre_img'];

                //Usar en remoto
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar);
                    
                //usar en local
                // unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/noticieroyaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar);
            endforeach;
            
            $this->ConsultaClasificados_M->eliminarProductoOpcion($ID_Producto);
            $this->ConsultaClasificados_M->eliminarImagenPrincipal($ID_Producto);
            $this->ConsultaClasificados_M->eliminarProducto($ID_Producto);
            $this->ConsultaClasificados_M->eliminarOpcion($ID_Opcion);
              
            // *************************************************************************************
            // *************************************************************************************

            $this->Productos();
        }
        
		//Eliminar imagen secundaria de producto
		public function eliminar_imagenSecundariaProducto($ID_Imagen){
            
            //Se consulta el nombre de la imagen del producto
            $NombreImagenEliminar = $this->ConsultaClasificados_M->consultarImageneEspecificaEliminar($ID_Imagen);
            // echo '<pre>';
            // print_r($NombreImagenEliminar¨);
            // echo '</pre>';
            // exit;		

            //Usar en remoto
            unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar['nombre_img']);
                
            //usar en local
            // unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/noticieroyaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar['nombre_img']);
            
			$this->ConsultaClasificados_M->eliminarImagenSecundariaNoticia($ID_Imagen);	

			// header("Location:" . RUTA_URL . "/Panel_C/");
			// die();
		}
    }