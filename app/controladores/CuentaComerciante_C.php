<?php
    class CuentaComerciante_C extends Controlador{
        private $ConsultaCuenta_M;
        private $ID_Suscriptor;
        private $PrecioDolar;
        private $Comprimir;
        // public $Horario;
        // private $ID_Suscriptor;

        public function __construct(){
            session_start();

            //Sesion creada en Login_C
            $this->ID_Suscriptor = $_SESSION['ID_Suscriptor'];
            
            $this->ConsultaCuenta_M = $this->modelo('CuentaComerciante_M');

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        // invocado desde el metodo recibeRegistroEditado() en esta misma clase
        public function index(){          
           
            $Datos = [                            
                'nombre' => $_SESSION["nombreSuscriptor"],
                'apellido' => $_SESSION["apellidoSuscriptor"]
            ];

            $this->vista("header/header_SoloEstilos");
            $this->vista('suscriptores/suscrip_Inicio_V', $Datos);
        }

        public function consultarComerciante($Correo){
            $Comerciante = $this->ConsultaCuenta_M->consultarResponsableTienda($Correo);
            
            return $Comerciante;
            // echo '<pre>';
            // print_r($Comerciante);
            // echo '</pre>';
            // exit();
        }

        public function Despachador(){
            $this->vista('view/cuenta_comerciante/cuenta_despachador_V');
        }

        //Invocado desde login_C/ValidarSesion - CuentaComerciante_C/eliminarProducto - CuentaComerciante_C/recibeAtualizarProducto - CuentaComerciante_C/recibeProductoPublicar - header_AfiCom.php, muestra todos los productos publicados o los de una sección en especifico
        public function Productos(){
            // echo 'ID_Suscriptor= ' . $this->ID_Suscriptor . '<br>';
            // exit;

            //CONSULTA todos los productos de un suscriptor  
            $Productos = $this->ConsultaCuenta_M->consultarTodosProductosSuscriptor($this->ID_Suscriptor);
            // echo '<pre>';
            // print_r($Productos);
            // echo '</pre>';
            // exit();

            //Si no hay productos cargados, se muestra el modal de sin productos
            if($Productos == Array()){
                require(RUTA_APP . "/vistas/modal/modal_sinProductos_V.php");
                exit;
            }

            $Datos = [
                'productos' => $Productos, //ID_Producto, producto, ID_Opcion, opcion, precioBolivar, prcioDolar, cantidad, disponible, nombre_img
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiCom');//Evaluar como mandar solo la seccion del array $Datos
            $this->vista('suscriptores/suscrip_productos_V', $Datos);
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

        // Carga la vista donde se carga un producto
        public function Publicar(){

            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();

            //Solicita la fecha actual
            // require(RUTA_APP . '/controladores/complementos/Fechas.php');
            // $this->Fecha = new Fechas();
    
            $Datos = [
                'dolarHoy' => $this->PrecioDolar->Dolar,
                // 'fechaDotacion' => $this->Fecha->FechaDotacion, 
                // 'fechaReposicion' => $this->Fecha->fechaReposicion
            ];
                
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit();

            $Publicar = 1906;  
            $_SESSION['Publicar'] = $Publicar; 
            //Se crea esta sesion para impedir que se recargue la información enviada por el formulario mandandolo varias veces a la base de datos

            $this->vista('header/header_AfiCom');
            $this->vista('suscriptores/suscrip_publicar_V', $Datos);
        }

        // muestra foermulario para actualizar un producto especifico
        public function actualizarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit;

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Producto = $DatosAgrupados[0];
            // $Opcion = $DatosAgrupados[1];

            //CONSULTA las especiicaciones de un producto determinado
            $Especificaciones = $this->ConsultaCuenta_M->consultarDescripcionProducto($ID_Producto);
            // echo '<pre>';
            // print_r($Especificaciones);
            // echo '</pre>';
            // exit();
            //CONSULTAN la imagen principal del producto
            $ImagenPrin = $this->ConsultaCuenta_M->consultarImagenPrincipal($ID_Producto);
            
            //Solicita el precio del dolar al controlador 
            require(RUTA_APP . '/controladores/Divisas_C.php');
            $this->PrecioDolar = new Divisas_C();

            $Datos = [
                'especificaciones' => $Especificaciones, //ID_Producto, ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad, disponible
                'imagenPrin' => $ImagenPrin, //ID_Imagen, nombre_img
                'dolarHoy' => $this->PrecioDolar->index()
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

        public function ConsultarOpciones($OpcionProd){
            //CONSULTA las opciones de productos que existen en la BD segun la categoria seleccionada
            $Consulta = $this->ConsultaCuenta_M->consultarOpcionesProductos($OpcionProd);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $this->vista('header/Select_Ajax_V', $Datos);
        }

        //Llamado desde A_Cuenta_editar.js
        public function Categorias(){
            //CONSULTA las categorias que exiten en la BD
            $Categorias = $this->ConsultaCuenta_M->consultarCatgorias();

            //CONSULTA las categorias en las que una tienda se ha postulado
            $CategoriasTienda = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Suscriptor );

            $Datos = [
                'categorias' => $Categorias,
                'categoriasTienda' => $CategoriasTienda
            ];

            $this->vista('header/Categorias_Ajax_V', $Datos);
        }

        //Invocado desde A_Cuenta_editar_prod.js entrega las secciones activas de una tienda
        public function Secciones($ID_Producto){
            //CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Suscriptor);
            // $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // print_r($Seccion);
            // echo '</pre>';
            // exit();

            //CONSULTA el ID_Sección al que pertenece un producto de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionActiva($ID_Producto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // print_r($ID_Seccion);
            // echo '</pre>';
            // exit();

            //La consulta devuelve el ID_Seccion en una array, se convierte en una variable
            $ID_Seccion = $ID_Seccion[0]['ID_Seccion'];

            //CONSULTA la seccion correspondiente al ID_Seccion
            $Consulta = $this->ConsultaCuenta_M->consultarSeccion($ID_Seccion);
            $SeccionActiva = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'seccion' => $Seccion,
                'seccionActiva' => $SeccionActiva
            ];

            $this->vista('header/Secciones_Ajax_V', $Datos);
        }

        //Metodo invocado desde A_Cuenta_publicar.js
        public function SeccionesDisponibles(){
            // CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Suscriptor);

            $Datos = [
                'seccion' => $Seccion,
            ];

            $this->vista('header/SeccionesDisponibles_Ajax_V', $Datos);
        }

        //Recibe el formulario de configuracion de tienda invocado en cuenta_editar_V.php
        public function recibeRegistroEditado(){
            //Se reciben todos los campos del formulario desde cuenta_editar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombre_Afcom']) && !empty($_POST['apellido_Afcom']) && !empty($_POST['cedula_Afcom']) && !empty($_POST['telefono_Afcom']) && !empty($_POST['correo_Afcom']) && !empty($_POST['nombre_com']) && !empty($_POST['direccion_com'])
            ){
                $RecibeDatos = [
                    //RECIBE DATOS PERSONA RESPONSABLE
                    'Nombre_Afcom' => filter_input(INPUT_POST, 'nombre_Afcom', FILTER_SANITIZE_STRING),
                    'Apellido_Afcom'=> filter_input(INPUT_POST, 'apellido_Afcom', FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, 'cedula_Afcom', FILTER_SANITIZE_STRING),
                    'Telefono_Afcom'=> filter_input(INPUT_POST, 'telefono_Afcom', FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, 'correo_Afcom', FILTER_SANITIZE_STRING),

                    //RECIBE DATOS DE LA TIENDA
                    'Nombre_com' => filter_input(INPUT_POST, 'nombre_com', FILTER_SANITIZE_STRING),
                    'Estado_com' => filter_input(INPUT_POST, 'estado_com', FILTER_SANITIZE_STRING),
                    'Municipio_com' => filter_input(INPUT_POST, 'municipio_com', FILTER_SANITIZE_STRING),
                    'Parroquia_com' => filter_input(INPUT_POST, 'parroquia_com', FILTER_SANITIZE_STRING),
                    'Direccion_com' => filter_input(INPUT_POST, 'direccion_com', FILTER_SANITIZE_STRING),
                    'Slogan_com' => filter_input(INPUT_POST, 'slogan_com', FILTER_SANITIZE_STRING),
                    'Desactivar_com' => empty($_POST['desactivar_com']) ? 0 : 1
                ];

                // echo '<pre>';
                // print_r($RecibeDatos);
                // echo '</pre>';
                // exit;
                // $RecibeDatos = [
                //         'Nombre' => ucwords($_POST['nombre']),
                //         'Cedula' => is_numeric($_POST['cedula']) ? $_POST['cedula']: false,
                //         'Telefono' => is_numeric($_POST['telefono']) ? $_POST['telefono']: false,
                //         'Correo' => mb_strtolower($_POST['correo']),
                //         'Clave' => $_POST['clave'],
                //         'RepiteClave' => $_POST['confirmarClave'],
                // ];

                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos['Telefono_Afcom'] == false){
                //     exit('El telefono debe ser solo números');
                // }
                // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos['Cedula_Afcom'] == false){
                //     exit('La cedula debe ser solo números');
                
                //Se ACTUALIZAN los datos de la tienda, el registro de la tienda fue creado cuando el afiliado creo la tienda
                $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
            }
            else{
                echo 'Llene todos los campos del formulario de registro';
                echo '<br>';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //RECIBE IMAGEN TIENDA
            // ********************************************************
            //Recibe la imagen de la tienda solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagen_Tienda']['name']) != ''){
                //Al nombre de la imagen se le añade un prefijo para evitar que sobreescriba otra imagen ya existente en el directorio dondes se guardan las imagenes
                $nombre_imgTienda = $this->ID_Suscriptor . $_FILES['imagen_Tienda']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                $tipo_imgTienda = $_FILES['imagen_Tienda']['type'];
                $tamaño_imgTienda = $_FILES['imagen_Tienda']['size'];

                // echo 'Nombre de la imagen = ' . $nombre_imgTienda . '<br>';
                // echo 'Tipo de archivo = ' .$tipo_imgTienda .  '<br>';
                // echo 'Tamaño = ' . $tamaño_imgTienda . '<br>';
                // echo 'Tamaño maximo permitido = 7.000.000' . '<br>';// en bytes
                // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';

                //Si existe imagen_Tienda y tiene un tamaño correcto
                //Si existe imagenPrinci_Editar y tiene un tamaño correcto (2Mb)
                if(($nombre_imgTienda == !NULL) AND ($tamaño_imgTienda <= 2000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if(($_FILES['imagen_Tienda']['type'] == 'image/jpeg')
                        || ($_FILES['imagen_Tienda']['type'] == 'image/jpg') || ($_FILES['imagen_Tienda']['type'] == 'image/png')){
                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Se crea el directorio donde iran las imagenes de la tienda
                        // Usar en remoto,   $_SESSION['ID_Suscriptor'] fue creada en Logi_C/ValidarSesion
                        $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['ID_Suscriptor'];

                        // Usar en local
                        // // $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/tiendas/' . $_SESSION['ID_Suscriptor'];

                        if(!file_exists($CarpetaImagenes)){
                            mkdir($CarpetaImagenes, 0777, true);
                        }
                        
                        // Se inserta la imagen en el directorio correspondiente
                        //Usar en remoto
                        $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['ID_Suscriptor'] . '/';

                        //usar en local
                        // // $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/';
                        
                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];

                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagen_Tienda']['tmp_name'], $directorio_1.$nombre_imgTienda);

                        //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                        if(($_FILES['imagen_Tienda']['name']) != ''){
                            //Se ACTUALIZA la fotografia de la tienda
                            $this->ConsultaCuenta_M->actualizarFotografiaTienda($this->ID_Suscriptor, $nombre_imgTienda);
                        }
                    }
                }
                else{
                    //si no cumple con el formato
                    echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                    echo '<br>';
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
                }

                //si existe imagen_Tienda pero se pasa del tamaño permitido
                // if($nombre_imgTienda == !NULL){
                //     echo "La imagen es demasiado grande ";
                //     echo "<br>";
                //     echo "<a href='javascript:history.back()'>Regresar</a>";
                //     exit();
                // }
            }
            else{
                //Se crea el directorio donde iran las imagenes de la tienda
                $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['ID_Suscriptor'];

                if(!file_exists($CarpetaImagenes)){
                    mkdir($CarpetaImagenes, 0777, true);
                }
            }

            //RECIBE CATEGORIAS
            // ********************************************************
            //Recibe las categorias seleccionadas
            if(!empty($_POST['categoria'])){
                foreach($_POST['categoria'] as $Categoria){
                    $Categoria = $_POST['categoria'];
                }
            }
            else{
                echo 'Ingrese al menos una categoría';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo 'Categorias recibidas';
            // echo '<pre>';
            // print_r($Categoria);
            // echo '</pre>';
            // exit();

            //RECIBE SECCIONES
            // ********************************************************
            //Recibe las secciones por nombre (son las nuevas creadas)
            if(!empty($_POST['seccion'])){
                foreach($_POST['seccion'] as $Seccion){
                    $Seccion = $_POST['seccion'];
                }
                //El array trae elemenos duplicados, se eliminan los duplicado
                $SeccionesRecibidas = array_unique($Seccion);
            }
            else{
                echo 'Ingrese al menos una sección';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo 'Secciones recibidas';
            // echo '<pre>';
            // print_r($SeccionesRecibidas);
            // echo '</pre>';

            //Se CONSULTA las secciones existenete en BD
            $SecccionesExistentes = $this->ConsultaCuenta_M->consultarSecciones_2($this->ID_Suscriptor);
            // echo 'Secciones existentes';
            // echo '<pre>';
            // print_r($SecccionesExistentes);
            // echo '</pre>';
            
            $Secciones = array_diff($SeccionesRecibidas, $SecccionesExistentes);
            // echo 'Secciones a insertar';
            // echo '<pre>';
            // print_r($Secciones);
            // echo '</pre>';
            // exit();
            
            //RECIBE HORARIO
            //Seccion datos horarios de atencion al cliente, se almacenará en la tabla horarios
            if(!empty($_POST['lunes_M']) || !empty($_POST['martes_M']) || !empty($_POST['miercoles_M']) || !empty($_POST['jueves_M']) || !empty($_POST['viernes_M']) || !empty($_POST['sabado_M']) &&! empty($_POST['domingo_M']) || !empty($_POST['lunes_T']) || !empty($_POST['martes_T']) || !empty($_POST['miercoles_T']) || !empty($_POST['jueves_T']) || !empty($_POST['viernes_T']) || !empty($_POST['sabado_T']) || !empty($_POST['domingo_T'])){
                $RecibeHorario_LV = [
                    'Inicio_M' => $_POST['inicioManana'],
                    'Culmina_M' => $_POST['culminaManana'],
                    
                    'Lunes_M' => isset($_POST['lunes_M']) == 'Lunes' ? $_POST['lunes_M'] : 0,
                    'Martes_M' => isset($_POST['martes_M']) == 'Martes' ? $_POST['martes_M'] : 0,
                    'Miercoles_M' => isset($_POST['miercoles_M']) == 'Miercoles' ? $_POST['miercoles_M']:0,
                    'Jueves_M' => isset($_POST['jueves_M']) == 'Jueves' ? $_POST['jueves_M'] : 0,
                    'Viernes_M' => isset($_POST['viernes_M']) == 'Viernes' ? $_POST['viernes_M'] : 0,

                    'Inicia_T' => $_POST['iniciaTarde'],
                    'Culmina_T' => $_POST['culminaTarde'],
                    'Lunes_T' => isset($_POST['lunes_T']) == 'Lunes' ? $_POST['lunes_T'] : 0,
                    'Martes_T' => isset($_POST['martes_T']) == 'Martes' ? $_POST['martes_T'] : 0,
                    'Miercoles_T' => isset($_POST['miercoles_T']) == 'Miercoles' ? $_POST['miercoles_T']:0,
                    'Jueves_T' => isset($_POST['jueves_T']) == 'Jueves' ? $_POST['jueves_T'] : 0,
                    'Viernes_T' => isset($_POST['viernes_T']) == 'Viernes' ? $_POST['viernes_T'] : 0
                ];
                $RecibeHorario_Sab = [
                    'Inicio_M_Sab' => isset($_POST['inicioManana_Sab']) != '' ? $_POST['inicioManana_Sab'] : 0,
                    'Culmina_M_Sab' => isset($_POST['culminaManana_Sab']) != '' ? $_POST['culminaManana_Sab'] : 0,
                    'Sabado_M' => isset($_POST['sabado_M']) == 'Sabado' ? $_POST['sabado_M'] : 0,

                    'Inicia_T_Sab' => isset($_POST['inicioTarde_Sab']) == 'Sabado' ? $_POST['inicioTarde_Sab'] : 0,
                    'Culmina_T_Sab' => isset($_POST['culminaTarde_Sab']) == 'Sabado' ? $_POST['culminaTarde_Sab'] : 0,
                    'Sabado_T' => isset($_POST['sabado_T']) == 'Sabado' ? $_POST['sabado_T'] : 0,
                ];
                $RecibeHorario_Dom = [
                    'Inicio_M_Dom' => isset($_POST['inicioManana_Dom']) == 'Domingo' ? $_POST['inicioManana_Dom'] : 0,
                    'Culmina_M_Dom' => isset($_POST['culminaManana_Dom']) == 'Domingo' ? $_POST['culminaManana_Dom'] : 0,
                    'Domingo_M' => isset($_POST['domingo_M']) == 'Domingo' ? $_POST['domingo_M'] : 0,
                    'Inicia_T_Dom' => isset($_POST['inicioTarde_Dom']) == 'Domingo' ? $_POST['inicioTarde_Dom'] : 0,
                    'Culmina_T_Dom' => isset($_POST['culminaTarde_Dom']) == 'Domingo' ? $_POST['culminaTarde_Dom'] : 0,
                    'Domingo_T' => isset($_POST['domingo_T']) == 'Domingo' ? $_POST['domingo_T'] : 0,
                ];
                $RecibeHorario_Esp = [
                    'Inicio_M_Esp' => isset($_POST['inicioManana_Esp']) != '' ? $_POST['inicioManana_Esp'] : 0,
                    'Culmina_M_Esp' => isset($_POST['culminaManana_Esp']) != '' ? $_POST['culminaManana_Esp'] : 0,
                    'DiaEspecial_M' => isset($_POST['horario_Espec_M']) != '' ? $_POST['horario_Espec_M'] : 0,
                    'Inicia_T_Esp' => isset($_POST['inicioTarde_Esp']) != '' ? $_POST['inicioTarde_Esp'] : 0,
                    'Culmina_T_Esp' => isset($_POST['culminaTarde_Esp']) != '' ? $_POST['culminaTarde_Esp'] : 0,
                    'DiaEspecial_T' => isset($_POST['horario_Espec_T']) != '' ? $_POST['horario_Espec_T'] : 0,
                ];

                // echo '<pre>';
                // print_r($RecibeHorario_LV);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Sab);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Dom);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Esp);
                // echo '</pre>';
                // exit;
                
                //Se ELIMINAN el horario de la tienda de lunes a viernes
                $this->ConsultaCuenta_M->eliminarHorarioTienda_LV($this->ID_Suscriptor);
                //Se INSERTA el horario de la tienda de lunes a viernes
                $this->ConsultaCuenta_M->insertarHorarioTienda_LV($this->ID_Suscriptor, $RecibeHorario_LV);
                
                //Se ELIMINAN el horario de la tienda del dia sabado
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Sab($this->ID_Suscriptor);
                //Se INSERTA el horario de la tienda del dia sabado
                $this->ConsultaCuenta_M->insertarHorarioTienda_Sab($this->ID_Suscriptor, $RecibeHorario_Sab);
                
                //Se ELIMINAN el horario de la tienda del dia domingo
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Dom($this->ID_Suscriptor);
                //Se INSERTA el horario de la tienda del dia domingo
                $this->ConsultaCuenta_M->insertarHorarioTienda_Dom($this->ID_Suscriptor, $RecibeHorario_Dom);
                
                //Se ELIMINAN el horario de la tienda del dia especial
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Esp($this->ID_Suscriptor);
                //Se INSERTA el horario de la tienda del dia especial
                $this->ConsultaCuenta_M->insertarHorarioTienda_Esp($this->ID_Suscriptor, $RecibeHorario_Esp);

            }
            else{
                echo 'Ingrese el horario de despacho';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }

            //RECIBE INFORMACION DE PAGOS
            // ********************************************************            
            // echo 'Banco transferencia: ' . $_POST['banco'][0] . '<br>';
            // echo 'Banco PagoMovil: ' . $_POST['bancoPagoMovil'][0] . '<br>';
            // echo '<pre>';
            // print_r($_POST['banco']);
            // echo '</pre>';
            // echo '<pre>';
            // print_r($_POST['bancoPagoMovil']);
            // echo '</pre>';

            //RECIBE TRANSFERENCIAS
            if(($_POST['banco'][0] == '') && ($_POST['bancoPagoMovil'][0] == '') && $_POST['bolivar'] == '' && $_POST['dolar'] == '' && $_POST['acordado'] == ''){
                echo 'Ingrese datos de pagos';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            else{
                //Se ELIMINAN todas las cuentas bancarias
                $this->ConsultaCuenta_M->eliminarCuentaBancaria($this->ID_Suscriptor);

                if($_POST['banco'][0] != ''){
                    foreach(array_keys($_POST['banco']) as $key){
                        if(!empty($_POST['banco'][$key]) && !empty($_POST['titular'][$key]) && !empty($_POST['numeroCuenta'][$key]) && !empty($_POST['rif'][$key])
                        ){
                            $Banco = $_POST['banco'][$key];
                            $Titular = $_POST['titular'][$key];
                            $NumeroCuenta = $_POST['numeroCuenta'][$key];
                            $Rif = $_POST['rif'][$key];
                            
                            //Se INSERTA la cuenta bancaria
                            $this->ConsultaCuenta_M->insertarCuentaBancaria($this->ID_Suscriptor, $Banco, $Titular, $NumeroCuenta, $Rif);
                        }
                        else{
                            echo 'Ingrese datos bancarios completos';
                            echo '<br>';
                            echo "<a href='javascript:history.back()'>Regresar</a>";
                            exit();
                        }
                    }
                }
            }
                
            // ******************************************************** 
            //RECIBE PAGOMOVIL 
            // Se ELIMINAN todas las cuentas de pagomovil
            $this->ConsultaCuenta_M->eliminarPagoMovil($this->ID_Suscriptor);

            // echo $_POST['cedulaPagoMovil'][0] . '<br>';
            // echo $_POST['bancoPagoMovil'][0] . '<br>';
            // echo $_POST['telefonoPagoMovil'][0] . '<br>';
            // exit;

            if($_POST['cedulaPagoMovil'][0] != '' || $_POST['bancoPagoMovil'][0] != '' || $_POST['telefonoPagoMovil'][0] != ""){                                         
                foreach(array_keys($_POST['telefonoPagoMovil']) as $key){
                    if(!empty($_POST['cedulaPagoMovil'][$key]) && !empty($_POST['telefonoPagoMovil'][$key]) && !empty($_POST['bancoPagoMovil'][$key])){
                        $CedulapagoMovil = $_POST['cedulaPagoMovil'][$key];
                        $TelefonopagoMovil = $_POST['telefonoPagoMovil'][$key];
                        $BancopagoMovil = $_POST['bancoPagoMovil'][$key];

                        //Se INSERTA la cuenta de CuentapagoMovil
                        $this->ConsultaCuenta_M->insertarPagoMovil($this->ID_Suscriptor, $CedulapagoMovil, $BancopagoMovil, $TelefonopagoMovil);
                    }
                    else{
                        echo 'Ingrese datos pagoMovil';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                }
            }
                
            // ******************************************************** 
            //RECIBE RESERVE 
            // Se ELIMINAN todas las cuentas de Reserve
            $this->ConsultaCuenta_M->eliminarReserve($this->ID_Suscriptor);

            // echo $_POST['usuario_reserve'][0] . '<br>';
            // echo $_POST['telefono_reserve'][0] . '<br>';
            // exit;

            if($_POST['usuario_reserve'][0] != ''|| $_POST['telefono_reserve'][0] != ""){
                foreach(array_keys($_POST['telefono_reserve']) as $key)    :
                    if(!empty($_POST['usuario_reserve'][$key]) && !empty($_POST['telefono_reserve'][$key])){
                        $UsuarioReserve = $_POST['usuario_reserve'][$key];
                        $TelefonoReserve = $_POST['telefono_reserve'][$key];

                        //Se INSERTA la cuenta de Reserve
                        $this->ConsultaCuenta_M->insertarReserve($this->ID_Suscriptor, $UsuarioReserve, $TelefonoReserve);
                    }
                    else{
                        echo 'Ingrese datos de cuenta Reserve';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                endforeach;
            }

             // ******************************************************** 
            //RECIBE PAYPAL 
            // Se ELIMINAN todas las cuentas de Reserve
            $this->ConsultaCuenta_M->eliminarPaypal($this->ID_Suscriptor);

            // echo $_POST['correro_paypal'][0] . '<br>';
            // exit;

            if($_POST['correro_paypal'][0] != ''){
                foreach(array_keys($_POST['correro_paypal']) as $key)    :
                    if(!empty($_POST['correro_paypal'][$key])){
                        $CorreoPaypal = $_POST['correro_paypal'][$key];

                        //Se INSERTA la cuenta de Paypal
                        $this->ConsultaCuenta_M->insertarPaypal($this->ID_Suscriptor, $CorreoPaypal);
                    }
                    else{
                        echo 'Ingrese datos de cuenta Paypal';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                endforeach;
            }

            // ******************************************************** 
           //RECIBE ZELLE 
           // Se ELIMINAN todas las cuentas de Reserve
           $this->ConsultaCuenta_M->eliminarZelle($this->ID_Suscriptor);

           // echo $_POST['correro_paypal'][0] . '<br>';
           // exit;

           if($_POST['correro_zelle'][0] != ''){
               foreach(array_keys($_POST['correro_zelle']) as $key)    :
                   if(!empty($_POST['correro_zelle'][$key])){
                       $CorreoZelle = $_POST['correro_zelle'][$key];

                       //Se INSERTA la cuenta de Zelle
                       $this->ConsultaCuenta_M->insertarZelle($this->ID_Suscriptor, $CorreoZelle);
                   }
                   else{
                       echo 'Ingrese datos de cuenta Zelle';
                       echo '<br>';
                       echo "<a href='javascript:history.back()'>Regresar</a>";
                       exit();
                   }
               endforeach;
           }
            
            //RECIBE OTROS MEDIOS DE PAGO
            // ********************************************************
            $PagoBolivar = empty($_POST['bolivar']) ? 0 : 1;
            $PagoDolar = empty($_POST['dolar']) ? 0 : 1; 
            $PagoAcordado = empty($_POST['acordado']) ? 0 : 1;
            // echo $PagoBolivar . '<br>';
            // echo $PagoDolar . '<br>';
            // echo $PagoAcordado . '<br>';

            //Se ELIMINAN todas los medios de pago alternativos que existan
            $this->ConsultaCuenta_M->eliminarOtrosPagos($this->ID_Suscriptor);
            
            //Se INSERTA los medios de pago alternativos
            $this->ConsultaCuenta_M->insertarOtrosPagos($this->ID_Suscriptor, $PagoBolivar, $PagoDolar, $PagoAcordado);

            // echo 'Todos los campos estan llenos';
            // exit();

            //RECIBE LINK DE ACCESO
            //Se quitan los espacios en blanco en el nombre de la tienda en caso de existir
            $LinkTienda = str_replace(' ', '', $RecibeDatos['Nombre_com']);
            
            //Se eliminan los acentos del nombre de la tienda
            function eliminar_tildes($LinkTienda){            
                //Ahora reemplazamos las letras
                $LinkTienda = str_replace(
                    array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                    array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                    $LinkTienda);            
                $LinkTienda = str_replace(
                    array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                    array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                    $LinkTienda);
                $LinkTienda = str_replace(
                    array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                    array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                    $LinkTienda);            
                $LinkTienda = str_replace(
                    array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                    array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                    $LinkTienda );
                $LinkTienda = str_replace(
                    array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                    array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                    $LinkTienda);
                $LinkTienda = str_replace(
                    array('ñ', 'Ñ', 'ç', 'Ç'),
                    array('n', 'N', 'c', 'C'),
                    $LinkTienda);
            
                return $LinkTienda;
            }

            function ConvierteMinuscula($LinkTienda){
                $LinkTienda = strtolower($LinkTienda);
                
                return $LinkTienda;
            }

            //Se llama la función que reemplaza acentos y letra ñ
            $LinkTienda = eliminar_tildes($LinkTienda);
            
            //Se llama la función que convierte aminusculas
            $LinkTienda = ConvierteMinuscula($LinkTienda);

            //Se crea el link de acceso;  
            $LinkAcceso = RUTA_URL .'/' . $LinkTienda;
            // echo $LinkAcceso;
            // exit;

            //Se actualiza el link de acceso directo de una tienda en particular
            $this->ConsultaCuenta_M->actualizarLinkTienda($this->ID_Suscriptor, $LinkAcceso);

            // **********************************************************************************
            //Todo este procedimiento debe ser por medio de TRANSACCIONES
            // **********************************************************************************
            //Se ELIMINAN todas las categorias que tiene la tienda
            $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Suscriptor);
            
            //Se consulta el ID_Categoria de las categorias seleccionadas
            $ID_Categ = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);

            //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Suscriptor);
            
            //Se INSERTAN las secciones de la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Suscriptor, $Secciones); 
            
            //Se CONSULTA el ID_Seccion de las secciones que tiene la tienda
            $ID_Seccion = $this->ConsultaCuenta_M->consultarTodosID_Seccion($this->ID_Suscriptor);
            
            //Se INSERTAN la dependencia transitiva entre las secciones y la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarDT_TieSec($this->ID_Suscriptor, $ID_Seccion); 

            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado, el registro de la tienda fue creado cuando el afiliado creo la tienda
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);
           
            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC);

            // //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            // $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Suscriptor, $ID_Categ);

        	header('location:' . RUTA_URL. '/CuentaComerciante_C/Editar');
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
                    exit();
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
                    // //se muestra el directorio temporal donde se guarda el archivo
                    // echo $_FILES['imagen']['tmp_name'];
                    // exit();

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

                            //Se INSERTA la imagen principal
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
                    //Se crea el directorio donde iran las imagenes de la tienda

                    // Usar en remoto
                    $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/productos';

                    // Usar en local
                    // $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/productos';
                    
                    if(!file_exists($CarpetaProductos)){
                        mkdir($CarpetaProductos, 0777, true);
                    }
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

        //Invocado desde suscrip_productos_V.php
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
        
        //Invocado desde cuenta_editar_V.php - A_Cuenta_editar.js
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            //Se ACTUALIZA una seccion 
            $this->ConsultaCuenta_M->ActualizarSeccion($Seccion, $ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->Editar();
        }

        //Invocado en cuenta_editar_V.php autoriza si la tienda se suspende o se publica en el catalogo de tiendas
        // public function publicarTienda(){            
        //     $Consulta = $this->ConsultaCuenta_M->consultaPermisoPublicar($this->ID_Suscriptor);
        //     // echo '<pre>';
        //     // print_r($Consulta);
        //     // echo '</pre>';
        //     if($Consulta[0]['publicar'] == 0){
        //         echo 'Es necesario configurar la totalidad de la tienda';  
        //     }
        // }

        // Invocado desde E_Cuenta_Producto.js
        public function EstablecerImageSeccion($ID_Seccion){

            $Token = false; // Identifica que se manda desde el controlador CuentaComerciante_C
            
            $Datos = [
                'token' => $Token,
                'id_seccion' => $ID_Seccion
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_Modal'); 
            $this->vista('modal/modal_establecerImageSeccion_V', $Datos);
        }

        //Invocado desde .php actualiza la imagen de un producto
        public function recibeImagenSeccion(){
            $nombre_imgSeccion = $_FILES['img_Seccion']['name'] != '' ? $_FILES['img_Seccion']['name'] : 'imagen.png';
            $tipo_imgSeccion = $_FILES['img_Seccion']['type'] != '' ? $_FILES['img_Seccion']['type'] : 'image/png';
            $tamanio_imgSeccion = $_FILES['img_Seccion']['size'] != '' ?  $_FILES['img_Seccion']['size'] : '20,0 KB';
            $ID_Seccion = $_POST['id_seccion'];

            // echo 'Nombre de la imagen = ' . $nombre_imgSeccion . '<br>';
            // echo 'Tipo de archivo = ' .$tipo_imgSeccion .  '<br>';
            // echo 'Tamaño = ' . $tamanio_imgSeccion . '<br>';
            // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
            // echo 'ID_Seccion = ' . $ID_Seccion;
            // exit();

            //Si existe img_Seccion y tiene un tamaño correcto (maximo 2Mb)
            if(($nombre_imgSeccion == !NULL) AND ($tamanio_imgSeccion <= 2000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if(($tipo_imgSeccion == 'image/jpeg')
                    || ($tipo_imgSeccion == 'image/jpg') || ($tipo_imgSeccion == 'image/png')){

                    //Se crea el directorio donde iran las imagenes de la tienda
                    // Usar en remoto                    
                    $CarpetaSecciones = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['ID_Suscriptor'] . '/secciones';
                    
                    // Usar en local
                    // // $CarpetaSecciones = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/tiendas/' . $_SESSION['ID_Suscriptor'] . '/secciones';
                    
                    if(!file_exists($CarpetaSecciones)){
                        mkdir($CarpetaSecciones, 0777, true);
                    }

                    //Usar en remoto
                    $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['ID_Suscriptor'] . '/secciones/';

                    //usar en local
                    // // $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/tiendas/'. $_SESSION['ID_Suscriptor'] . '/secciones/';
                    
                    //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['img_Seccion']['tmp_name'], $directorio_6.$nombre_imgSeccion);

                    //Se INSERTA la imagen de la seccion
                    $this->ConsultaCuenta_M->actualizaImagenSeccion($ID_Seccion, $nombre_imgSeccion, $tipo_imgSeccion, $tamanio_imgSeccion);
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

             //Para actualizar fotografia de seccion solo si se ha presionado el boton de buscar fotografia
            //  if(($_FILES['imagenPrinci_Editar']['name']) != ""){
            //     //Se ACTUALIZA la fotografia principal del producto
            //     $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProducto);
                
                //Se ACTUALIZA la dependenciatransitiva entre secciones e imagenes
                // $this->ConsultaCuenta_M->actualizarDT_SecImg($RecibeProducto['ID_Seccion'], $RecibeProducto['ID_Imagen']);
            // }
            
            echo '<script>window.close();</script>';
        }
    }