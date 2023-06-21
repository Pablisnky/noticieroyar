<?php
    class RecibePedido_C extends Controlador{
        private $ConsultaRecibePedido_M;

        public function __construct(){
            session_start();  
            
            $this->ConsultaRecibePedido_M = $this->modelo("RecibePedido_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Invocado en carrito_V.php
        public function index(){    
           //  if($_SESSION['Carrito'] == 1806){Anteriormente en Carrito_C se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                // unset($_SESSION['Carrito']);//se borra la sesión verifica.        
            
                // if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombreUsuario']) && !empty($_POST['apellidoUsuario']) && !empty($_POST['cedulaUsuario']) && !empty($_POST['telefonoUsuario']) && !empty($_POST['direccionUsuario']) && !empty($_POST['pedido'])){
                    
                    $RecibeDatosUsuario = [
                        // DATOS DEL USUARIO                        
                        'ID_Usuario' => empty($_POST['ID_Usuario']) ? 0 : $_POST['ID_Usuario'],
                        'Nombre' => filter_input(INPUT_POST, 'nombreUsuario', FILTER_UNSAFE_RAW),
                        'Apellido' => filter_input(INPUT_POST, 'apellidoUsuario', FILTER_UNSAFE_RAW),
                        'Cedula' => filter_input(INPUT_POST, 'cedulaUsuario', FILTER_UNSAFE_RAW),
                        'Telefono' => filter_input(INPUT_POST,'telefonoUsuario',FILTER_UNSAFE_RAW),  
                        'Correo' => $_POST['correoUsuario'],
                        'Estado' => filter_input(INPUT_POST, 'estado', FILTER_UNSAFE_RAW), 
                        'Ciudad' => filter_input(INPUT_POST, 'ciudad', FILTER_UNSAFE_RAW), 
                        'Direccion' => filter_input(INPUT_POST, 'direccionUsuario', FILTER_UNSAFE_RAW), 
                        'Suscribir' => $_POST['suscrito'],
                        'MontoTotal' => filter_input(INPUT_POST, 'montoTotal', FILTER_UNSAFE_RAW),                        
                        'MontoTienda' => filter_input(INPUT_POST, 'montoTienda', FILTER_UNSAFE_RAW)     
                    ];
                    // echo '<pre>';
                    // print_r($RecibeDatosUsuario);
                    // echo '</pre>';
                    // exit();

                    //Se solicita la hora de la compra
                    date_default_timezone_set('America/Caracas');
                    $Hora = date('H:i');
                    
                    $RecibeDatosPedido = [
                        // DATOS DEL PEDIDO
                        // 'ID_Tienda' => filter_input(INPUT_POST, 'id_tienda', FILTER_SANITIZE_NUMBER_INT),
                        'FormaPago' => filter_input(INPUT_POST, 'formaPago', FILTER_UNSAFE_RAW),
                        'Despacho' => filter_input(INPUT_POST, 'entrega', FILTER_UNSAFE_RAW),      
                        'MontoEntrega' => filter_input(INPUT_POST, 'despacho', FILTER_UNSAFE_RAW),  
                        'CodigoTransferencia' => filter_input(INPUT_POST, 'codigoTransferencia', FILTER_UNSAFE_RAW),
                        'Hora' => $Hora
                    ];              
                    
                    // echo '<pre>';
                    // print_r($RecibeDatosPedido);
                    // echo '</pre>';
                    // exit();
                
                    // $RecibeDatos = [
                    //         'Nombre' => ucwords($_POST['nombre']),  
                    //         'Apellido' => mb_strtolower($_POST['apellido']),                       
                    //         'Cedula' => is_numeric($_POST['cedula']) ? $_POST['cedula']: false,
                    //         'Telefono' => is_numeric($_POST['telefono']) ? $_POST['telefono']: false,
                    //         'Direccion' => $_POST['direccion'],
                    //         'Pedido' => $_POST['pedido'],
                    // ];
                    
                    // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                    // if($RecibeDatos['Telefono'] == false){      
                    //     echo 'El telefono debe ser solo números' . '<br>';
                    //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    // }
                    // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                    // if($RecibeDatos['Cedula'] == false){      
                    //     echo 'La cedula debe ser solo números' . '<br>';
                    //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    // }
                    
                    //Se genera un número Ale_NroOrden que sera el numero de orden del pedido
                    $Ale_NroOrden = mt_rand(1000000,999999999);
                    
                    //El pedido como es un string en formato json se recibe sin filtrar o sanear desde vitrina.js PedidoEnCarrito() para que el metodo jsodecode lo pueda reconocer y convertir en un array.
                    $RecibeDirecto = $_POST['pedido'];

                    $Resultado = json_decode($RecibeDirecto, true); 

                    // echo '<pre>';
                    // print_r($Resultado);
                    // echo '</pre>';
                    // exit();

                    //Se reciben los detalles del pedido
                    if(is_array($Resultado) || is_object($Resultado)){
                        foreach($Resultado as $Key => $Value)   :
                            $Seccion = 'N_P';
                            $Producto = $Value['Producto'];
                            $Cantidad = $Value['Cantidad'];
                            $Opcion = $Value['Opcion'];
                            $Precio = $Value['Precio'];
                            $Total = $Value['Total'];
                            $ID_Opcion = $Value['ID_Opcion'];
                            
                            //Se INSERTAN los detalles del pedido en la BD
                            $this->ConsultaRecibePedido_M->insertarDetallePedido($RecibeDatosUsuario['ID_Usuario'], $Ale_NroOrden, $Seccion, $Producto, $Cantidad, $Opcion, $Precio, $Total);
                            
                            // Se ACTUALIZA el inventario de los productos pedidos
                            //Se consulta la cantidad de existencia del producto
                            $Existencia = $this->ConsultaRecibePedido_M->consultarExistencia($ID_Opcion);
                        
                            foreach($Existencia as $Key) :
                                $Key['cantidad'];
                            endforeach;

                            //Se resta lo que el usuario pidio y el resultado se introduce en BD
                            $Inventario = $Key['cantidad'] - $Cantidad;
                            
                            $this->ConsultaRecibePedido_M->UpdateInventario($ID_Opcion, $Inventario);
                        endforeach;
                    }
                    else{
                        echo 'Error en la entrega de los detalles del pedido';
                        echo '<br>';
                    }
                // }
                // else{
                //     echo 'Llene todos los campos del formulario de registro' . '<br>';
                //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                //     exit();
                // }
                
                //MONTO POR DELIVERY
                // *****************************************
                //Si hay despacho se calcula el monto del envio (Por ahora es fijo en 3000 Bs)
                if($RecibeDatosPedido['Despacho'] == 'Domicilio_Si'){
                    $Delivery = $RecibeDatosPedido['MontoEntrega'];
                }
                else{
                    $Delivery = '0';
                }

                // Sino se recibe el codigo de transferencia se da un valor por defecto
                // *****************************************
                if(empty($RecibeDatosPedido['CodigoTransferencia'])){
                    // $CodigoTransferencia = $RecibeDatosPedido['formaPago'];
                    $CodigoTransferencia = 'No aplica';
                } 
                else{
                    $CodigoTransferencia = $RecibeDatosPedido['CodigoTransferencia'];
                }
                    
                //Se INSERTAN los datos del comprador en la BD si el usuario acepta
                if($RecibeDatosUsuario['Suscribir'] == 'Suscribir'){
                    //Se consulta si el usuario ya existe en la BD
                    $UsuarioPedido = $this->ConsultaRecibePedido_M->consultarUsuario($RecibeDatosUsuario['Cedula']);
                    if($UsuarioPedido == Array()){
                        $Suscrito = 1;
                        $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatosUsuario, $Suscrito);
                    }
                }
                else{
                    //Se insertan pero no se recuerdan porque e usuario no aceptó guardar datos
                    $Suscrito = 0;
                    $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatosUsuario, $Suscrito);
                }

                //Se INSERTAN los datos generales del pedido en la BD
                $this->ConsultaRecibePedido_M->insertarPedido($RecibeDatosUsuario, $CodigoTransferencia, $RecibeDatosPedido, $Ale_NroOrden, $Delivery, $Hora);
                
                //Se recibe y se inserta el capture de transferencia 
                if($_FILES['imagenTransferencia']['name'] == ''){
                    // $CodigoTransferencia = $RecibeDatosPedido['formaPago'];
                    $archivonombre = 'imagen_2.png';
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Ale_NroOrden, $archivonombre);
                }
                else{
                    $archivonombre = $_FILES['imagenTransferencia']['name'];
                    $Ruta_Temporal = $_FILES['imagenTransferencia']['tmp_name'];

                    //Usar en remoto
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Ale_NroOrden, $archivonombre);
                }
                
                //RECIBE CAPTURE PAGOMOVIL
                if($_FILES['imagenPagoMovil']['name'] != '' && $RecibeDatosPedido['FormaPago'] == 'PagoMovil'){
                    $archivonombre = $_FILES['imagenPagoMovil']['name'];
                    $Ruta_Temporal = $_FILES['imagenPagoMovil']['tmp_name'];

                    //Usar en remoto
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Ale_NroOrden, $archivonombre);
                }
                // else{
                //     echo 'No se recibio capture de PagoMovil';
                //     exit;
                // }

                //RECIBE CAPTURE RESERVE
                if($_FILES['imagenPagoReserve']['name'] != '' && $RecibeDatosPedido['FormaPago'] == 'Reserve'){
                    $archivonombre = $_FILES['imagenPagoReserve']['name'];
                    $Ruta_Temporal = $_FILES['imagenPagoReserve']['tmp_name'];

                    //Usar en remoto
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Ale_NroOrden, $archivonombre);
                }
                // else{
                //     echo 'No se recibio capture de pago en Reserve';
                //     exit;
                // }

                //RECIBE CAPTURE PAYPAL
                if($_FILES['imagenPagoPaypal']['name'] != '' && $RecibeDatosPedido['FormaPago'] == 'Paypal'){
                    $archivonombre = $_FILES['imagenPagoPaypal']['name'];
                    $Ruta_Temporal = $_FILES['imagenPagoPaypal']['tmp_name'];

                    //Usar en remoto
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Ale_NroOrden, $archivonombre);
                }
                // else{
                //     echo 'No se recibio capture de pago en Paypal';
                //     exit;
                // }

                // ****************************************
                //DATOS ENVIADOS POR CORREOS
                //Se CONSULTA el pedido recien ingresado a la BD
                $Pedido = $this->ConsultaRecibePedido_M->consultarPedido($Ale_NroOrden);
                
                //Se CONSULTA el usuario que realizó el pedido
                $Usuario = $this->ConsultaRecibePedido_M->consultarUsuario($RecibeDatosUsuario['Cedula']);
                
                //Se CONSULTA el correo y el nombre de la tienda
                $Tienda = $this->ConsultaRecibePedido_M->consultarCorreo($RecibeDatosPedido['ID_Tienda']);

                // Se genera el código de despacho que será solicitado por el despachador
                $Ale_CodigoDespacho = mt_rand(0001,9999);

                $DatosCorreo = [
                    'informacion_pedido' => $Pedido,
                    'informacion_usuario' => $Usuario,
                    'informacion_tienda' => $Tienda,
                    'Codigo_despacho' => $Ale_CodigoDespacho
                ];

                // echo '<pre>';
                // print_r($DatosCorreo);
                // echo '</pre>';
                // exit;

                $Datos = [
                    'Codigo_despacho' => $Ale_CodigoDespacho
                ];

                // CORREOS
                // **************************************** 

                //Carga la vista "recibo de compra" dirigida al usuario ubicada en app/clases/controlador.php
                $this->correo('reciboCompra_mail', $DatosCorreo); 

                //Carga la vista de correo "orden de compra" dirigida al cliente y al marketplace
                $this->correo('ordenCompra_mail', $DatosCorreo); 

                $this->vista('header/header');
                $this->vista('view/RecibePedido_V', $Datos);
            // }
            // else{
            //     header('location:' . RUTA_URL . '/Inicio_C/NoVerificaLink');
            // } 
        }
    }