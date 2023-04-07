<?php
    class CuentaComerciante_C extends Controlador{
        private $ConsultaCuenta_M;
        private $ID_Suscriptor;
        private $PrecioDolar;
        private $Comprimir;        
        private $InformacionSuscriptor;

        public function __construct(){
            //Solicita datos del suscriptor a la clase Suscriptor_C 
            require(RUTA_APP . '/controladores/Suscriptor_C.php');
            $this->InformacionSuscriptor = new Suscriptor_C();

            //Sesion creada en Login_C, al instanciar Suscriptor_C lineas arriba no hace falta iniciar session en este controlador debido a que Suscriptor_C abre sesion
            $this->ID_Suscriptor = $_SESSION['ID_Suscriptor'];
            
            $this->ConsultaCuenta_M = $this->modelo('CuentaComerciante_M');

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        // 
        public function index(){          
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($this->ID_Suscriptor);
            
            //se consultan los anuncios clasificados de un suscriptor
            $Clasificados = $this->ConsultaCuenta_M->consultarAnunciosClasificados($this->ID_Suscriptor);

            $Datos = [                         
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'clasificados' => $Clasificados,
                // 'telefono' => $Suscriptor['telefonoSuscriptor']
            ];


            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista("header/header_suscriptor");
            $this->vista('suscriptores/suscrip_Inicio_V', $Datos);
        }

        //Muestra todos los productos en la vista clasificados del panel de suscriptores
        public function Productos(){
            // echo 'ID_Suscriptor= ' . $this->ID_Suscriptor . '<br>';
            // exit;

            //CONSULTA todos los productos de un suscriptor  
            $Productos = $this->ConsultaCuenta_M->consultarTodosProductosSuscriptor($this->ID_Suscriptor);
                                   
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($this->ID_Suscriptor);

            $Datos = [
                'productos' => $Productos, //ID_Producto, producto, ID_Opcion, opcion, precioBolivar, prcioDolar, cantidad, disponible, nombre_img
                'suscriptor' => $this->InformacionSuscriptor->index($this->ID_Suscriptor),
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor']
            ];

            //Si no hay productos cargados y no hay datos comerciales, se muestra el modal de sin productos
            if($Productos == Array() && $Datos['suscriptor']['pseudonimoSuscripto'] == ''){
                $Datos = 'SinDatosComerciales';

                $this->vista('header/header_suscriptor');
                $this->vista('modal/modal_sinProductos_V', $Datos);
                exit;
            }
            else if($Productos == Array()){//Si no hay productos cargados

                header('location:' . RUTA_URL . '/CuentaComerciante_C/Publicar'); 
                die();
            }
            else{
                // echo '<pre>';
                // print_r($Datos);
                // echo '</pre>';
                // exit();
    
                $this->vista('header/header_suscriptor');
                $this->vista('suscriptores/suscrip_productos_V', $Datos);
            }            
        }

        // muestra la vista donde se carga un producto
        public function Publicar(){

            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();
            
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($this->ID_Suscriptor);
    
            $Datos = [
                'dolarHoy' => $this->PrecioDolar->index(),
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor']
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

        // muestra formulario para actualizar un producto especifico
        public function actualizarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit;

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Producto = $DatosAgrupados[0];
            // $Opcion = $DatosAgrupados[1];

            //CONSULTA las especiicaciones de un producto determinado
            $Especificaciones = $this->ConsultaCuenta_M->consultarDescripcionProducto($ID_Producto);

            //CONSULTAN la imagen principal del producto
            $ImagenPrin = $this->ConsultaCuenta_M->consultarImagenPrincipal($ID_Producto);
                        
            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();
            
            //se consultan la informacion del suscriptor
            $Suscriptor = $this->InformacionSuscriptor->index($this->ID_Suscriptor);

            $Datos = [
                'especificaciones' => $Especificaciones, //ID_Producto, ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad, disponible
                'imagenPrin' => $ImagenPrin, //ID_Imagen, nombre_img
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
        
        //*****************************************************************************
        //*****************************************************************************
        // HASTA AQUI SON LOS METODOS QUE RESPONDEN AL MENU
        //*****************************************************************************
        //*****************************************************************************

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
                $ID_Producto = $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);

                //Se INSERTA la opcion y precio del producto en la BD y se retorna el ID recien insertado
                $ID_Opcion = $this->ConsultaCuenta_M->insertarOpcionesProducto($RecibeProducto);
                
                //Se INSERTA la dependenciatransitiva entre producto, opciones
                $this->ConsultaCuenta_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);

                //IMAGEN PRINCIPAL
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
                            $this->ConsultaCuenta_M->insertaImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto);
                            
                            // INSSERTA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
                            // se comprime y se inserta el archivo en el directorio de servidor 
                            $Bandera = 'imagenProducto';
                            require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
                            $this->Comprimir = new Comprimir_Imagen();

                            $this->Comprimir->index($Bandera, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto, $Temporal_imgProducto);
                            
                            $this->Productos();
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
            }
            else{
                $this->Productos();
            } 
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
                    // 'ID_Suscriptor' => $_POST["id_suscriptor"] 
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
                require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
                $this->Comprimir = new Comprimir_Imagen();

                $this->Comprimir->index($Bandera, $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar, $Temporal_imgProductoActualizar);

                //Se ACTUALIZA la fotografia principal del producto
                $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar);
            }
        
            // ********************************************************
            //Estas sentencias de actualización deben realizarce por medio de transsacciones

            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);

            $this->Productos();
        }

        //recibe el nombre comercial, telefono y formas de pago de un suscriptor que va a publicar un clasificado
        public function recibeNombreComercial(){
            //Se reciben el campo del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST'&& !empty($_POST['nombreComercial']) && !empty($_POST['telefono']) && (!empty($_POST['transferencia']) || !empty($_POST['pago_movil']) || !empty($_POST['paypal']) || !empty($_POST['zelle']) || !empty($_POST['efectivo_Bs']) || !empty($_POST['efectivo_']) || !empty($_POST['acordado'])) && !empty($_POST['municipio']) && !empty($_POST['parroquia'])){
                $ID_Comentario = !empty($DatosAgrupados[2]) ? $DatosAgrupados[2]: 'SinID_Comentario';
                $RecibNombreComercial = [
                    'ID_Suscriptor' => $_SESSION["ID_Suscriptor"], //sesin creada en Login_C
                    'nombreComercial' =>  $_POST["nombreComercial"],
                    'telefono' =>  $_POST["telefono"],
                    'tranferencia' =>  !empty($_POST["tranferencia"]) ? $_POST["tranferencia"] : 'No_Transferencia',
                    'pago_movil' =>  !empty($_POST["pago_movil"]) ? $_POST["pago_movil"] : 'No_pago_movil',
                    'paypal' =>  !empty($_POST["paypal"]) ? $_POST["paypal"] : 'No_paypal',
                    'zelle' =>  !empty($_POST["zelle"]) ? $_POST["zelle"] : 'No_zelle',
                    'efectivo_Bs' =>  !empty($_POST["efectivo_Bs"]) ? $_POST["efectivo_Bs"] : 'No_efectivo_Bs',
                    'efectivo_dol' =>  !empty($_POST["efectivo_dol"]) ? $_POST["efectivo_dol"] : 'No_efectivo_dol',
                    'acordado' =>  !empty($_POST["acordado"]) ? $_POST["acordado"] : 'No_acordado',
                    'municipio' =>  $_POST["municipio"],
                    'parroquia' =>  $_POST["parroquia"]
                ];
                
                // echo '<pre>';
                // print_r($RecibNombreComercial);
                // echo '</pre>';
                // exit;
                
                //Se insertan los datos del suscriptor em BD
                $this->InformacionSuscriptor->InsertarNombreComercial($RecibNombreComercial);
            }
            else{
                echo 'Llene todos los campos obligatorios' . '<br>';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }
            
            $this->Publicar();
        }

        //
        public function eliminarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion, ID_Producto y la sección separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];

            // *************************************************************************************
            //La siguientes cinco consultas entran en el procedimeinto para ELIMINAR un producto de una tienda, esto debe hacerse mediante transacciones
            // *************************************************************************************
            // *************************************************************************************

            //Se consulta el nombre de la imagen principal
            $ImagenesEliminar = $this->ConsultaCuenta_M->consultarImagenesEliminar($ID_Producto);
            // echo '<pre>';
            // print_r($ImagenesEliminar);
            // echo '</pre>';
            // exit;

            $this->ConsultaCuenta_M->eliminarProductoOpcion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarImagenPrincipal($ID_Producto);
            $this->ConsultaCuenta_M->eliminarProducto($ID_Producto);
            $this->ConsultaCuenta_M->eliminarOpcion($ID_Opcion);
            
            //Se eliminan los archivo de la carpeta public/images/clasificados/productos
            foreach($ImagenesEliminar as $KeyImagenes)  :
                $NombreImagenEliminar = $KeyImagenes['nombre_img'];

                //Usar en remoto
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar);
                    
                //usar en local
                // unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/noticieroyaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/' . $NombreImagenEliminar);
            endforeach;
              
            // *************************************************************************************
            // *************************************************************************************

            $this->Productos();
        }

        //Invocado desde A_Cuenta_editar_prod.js por medio de Llamar_EliminarImagenSecundaria()
        public function eliminarImagen($ID_Imagen, $ID_Producto){
            //Elimina la imagen selecciona
            $this->ConsultaCuenta_M->eliminarImagenProducto($ID_Imagen);

            //Consulta de cuantas imagenes secundarias tiene un producto
            $TotalImagenes = $this->ConsultaCuenta_M->consultarCantidadImagenProducto($ID_Producto);
            $Datos = ($TotalImagenes[0]['cantidad']);
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista('header/BotonImagen_Ajax_V', $Datos);
        }
        
        //Invocado desde A_Cuenta_editar.js.php por medio de la funcion Llamar_EliminarSeccion()
        public function eliminarSeccion($ID_Seccion){
            // *************************************************************************************
            //La siguientes cuatro consultas entran en el procedimeinto para ELIMINAR una seccion de una tienda, esto debe hacerse mediante transacciones
            // *************************************************************************************
            // $this->ConsultaCuenta_M->eliminarclasificadosSecciones($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSeccionesProductos($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSeccionesOpciones($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSecciones($ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->Editar();
        }
        
        //Muestra el formulario de configuración
        public function Editar(){
            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Suscriptor);

            //CONSULTA los datos del responsable de la tienda
            $DatosResposable = $this->ConsultaCuenta_M->consultarResponsableTienda($this->ID_Afiliado);
            
            //Se CONSULTAN el horario de lunes a viernes de la tienda
            $Horario_LV = $this->ConsultaCuenta_M->consultarHorarioTienda_LV($this->ID_Suscriptor);

            //Se CONSULTAN el horario del dia sábado de la tienda
            $Horario_Sab = $this->ConsultaCuenta_M->consultarHorarioTienda_Sab($this->ID_Suscriptor);

            //Se CONSULTAN el horario del dia domingo de la tienda
            $Horario_Dom = $this->ConsultaCuenta_M->consultarHorarioTienda_Dom($this->ID_Suscriptor);
            
            //Se CONSULTAN el horario del dia de excepcion de la tienda
            $Horario_Esp = $this->ConsultaCuenta_M->consultarHorarioTienda_Esp($this->ID_Suscriptor);

            //CONSULTA los datos de cuentas bancarias de la tienda
            $DatosBancos = $this->ConsultaCuenta_M->consultarBancosTienda($this->ID_Suscriptor);

            //CONSULTA los datos de cuentas pagmovil de la tienda
            $DatosPagoMovil = $this->ConsultaCuenta_M->consultarCuentasPagomovil($this->ID_Suscriptor);

            //CONSULTA los datos de cuentas Reserve de la tienda
            $DatosReserve = $this->ConsultaCuenta_M->consultarCuentasReserve($this->ID_Suscriptor);

            //CONSULTA los datos de cuentas Paypal de la tienda
            $DatosPaypal = $this->ConsultaCuenta_M->consultarCuentasPaypal($this->ID_Suscriptor);

            //CONSULTA los datos de cuentas Zelle de la tienda
            $DatosZelle = $this->ConsultaCuenta_M->consultarCuentasZelle($this->ID_Suscriptor);

            //CONSULTA otros medios de pago
            $OtrosPagos = $this->ConsultaCuenta_M->consultarOtrosMediosPago($this->ID_Suscriptor);

            //CONSULTA las categorias en la que la tienda esta registrada
            $Categoria = $this->ConsultaCuenta_M->consultarCategoriaTienda($this->ID_Suscriptor);

            //CONSULTA las secciones de la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Suscriptor);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Suscriptor);

            //Se CONSULTAN el link de acceso directo de una tienda en particular
            $Link_Tien = $this->ConsultaCuenta_M->consultarLinkTienda($this->ID_Suscriptor);
            
            //Se verifica si existe el link de acceso directo y se crea en caso de no existir
            if(empty($Link_Tien)): 
                //Se crea el link de aceso';  
                $LinkAcceso = RUTA_URL .'/' . $DatosTienda[0]['nombre_Tien'];

                //Se guarda el link de acceso y la url real en la configuración de la tienda
                //INSERT del link de acceso directo de una tienda en particular
                $this->ConsultaCuenta_M->insertarLinkTienda($this->ID_Suscriptor, $LinkAcceso);

                //Se CONSULTA el link de acceso directo creado para insertar en el array $Datos
                $Link_Tien = $this->ConsultaCuenta_M->consultarLinkTienda($this->ID_Suscriptor);
            endif;

            $Datos = [
                'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien, parroquia_Tien, direccion_Tien, slogan_Tien, fotografia_Tien, desactivar_Tien
                'datosResposable' => $DatosResposable,
                'horario_LV' => $Horario_LV,
                'horario_Sab' => $Horario_Sab,
                'horario_Dom' => $Horario_Dom,
                'horario_Esp' => $Horario_Esp,
                'datosBancos' => $DatosBancos,
                'datosPagomovil' => $DatosPagoMovil,
                'datosReserve' => $DatosReserve, //usuarioReserve, telefonoReserve
                'datosPaypal' => $DatosPaypal, //correo_paypal
                'datosZelle' => $DatosZelle,
                'categoria' => $Categoria, // categoria
                'secciones' => $Secciones,
                'slogan' => $Slogan,
                'link_Tien' => $Link_Tien, //link_acceso, url 
                'otrosPagos' => $OtrosPagos
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            //Se crea una sesión con el contenido de una seccion de la tienda, para verificar que el usuario ya tiene creada al menos una cuando vaya a cargar un producto
            if(!empty($Datos['secciones'])){
                foreach($Datos['secciones'] as $Key){
                    $Seccion = $Key['seccion'];
                }
                $_SESSION['Seccion'] = $Seccion;
            }

            $this->vista('header/header_AfiCom', $Datos); 
            $this->vista('view/cuenta_comerciante/cuenta_editar_V', $Datos);
        }
    }